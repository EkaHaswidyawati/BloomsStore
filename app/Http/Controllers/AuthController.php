<?php

namespace App\Http\Controllers;

use App\Models\DetailPartner;
use App\Models\DetailPenjual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
date_default_timezone_set("Asia/Jakarta");
class AuthController extends Controller
{
    public function login($type)
    {
        return view('auth.login',
        [
            'type'=>$type,
            'title'=>'login'
        ]);
    }

    public function register($type)
    {
        return view('auth.register',
            [
                'type'=>$type,
                'title'=>'register'
            ]);
        
    }

    public function prosesRegister(Request $req){
        // dd($req);
        // Validasi form
        $validated = $req->validate([
            'email' => 'required|unique:users',
            'username' => 'required|unique:users|min:4',
            'nomor_telepon' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
        // Menambah akun ke DB dan redirect
        if ($validated) {
            // tambah data ke database
            $user = new User();
            $user->nama_lengkap=$req->nama;
            $user->email=$req->email;
            $user->username=$req->username;
            $user->password= Hash::make($req->password);
            $user->nomor_telepon=$req->nomor_telepon;
            $user->alamat=$req->alamat;
            $user->tanggal_lahir=$req->tanggal_lahir;
            $user->jenis_kelamin=$req->jenis_kelamin;
            $user->role=$req->type;
            $user->save();
            if ($req->type =='penjual') {
                return redirect('/detailPenjual/'.$user->id)->with(['username'=>$req->username,'password'=>$req->password]);
            }else if ($req->type =='partner') {
                return redirect('/detailPartner/'.$user->id)->with(['username'=>$req->username,'password'=>$req->password]);;
            }else if ($req->type =='pembeli') {
                $credentials = $req->validate([
                    'username' => ['required'],
                    'password' => ['required'],
                ]);
                Auth::attempt($credentials);
                return redirect('/home');
            }elseif ($req->type =='admin') {
                $credentials = $req->validate([
                    'username' => ['required'],
                    'password' => ['required'],
                ]);
                Auth::attempt($credentials);
                return redirect('/dashboardAdmin');
            }
        }else{
            return redirect('/register');
        }
    }

    public function proseslogin(Request $req)
    {
        $credentials = $req->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if($credentials){
            if(Auth::attempt($credentials)){
                if($req->type == 'pembeli' && Auth::user()->role == 'pembeli') {
                    return redirect('/home');
                }else if($req->type == 'penjual' && Auth::user()->role == 'penjual') {
                    return redirect('/dashboardPenjual');
                }else if($req->type == 'partner' && Auth::user()->role == 'partner') {
                    return redirect('/dashboardPartner');
                }else if(Auth::user()->role == 'admin') {
                    return redirect('/dashboardAdmin');
                }else{
                    Auth::logout();
                    return back()->with('message','Akun anda bukan '.$req->type);
                }
            }
            else {
                return back()->with('message','Username atau password anda salah');
            }
        }
    }

    public function prosesPenjual(Request $req)
    {
        $validated = $req->validate([
            'nama_toko' => 'required|unique:detail_penjual',
        ]);

        $penjual = User::where('id',$req->id)->first();

        if ($validated) {
            $penjual = new DetailPenjual();
            $penjual->user_id=$req->id;
            $penjual->nama_toko=$req->nama_toko;
            $penjual->alamat_toko=$req->alamat_toko;
            $penjual->deskripsi_toko=$req->deskripsi_toko;
            $penjual->save();
            Auth::attempt(['username' => $req->username, 'password' => $req->password]);
            return redirect('/dashboardPenjual');
        }
    }

    public function prosesPartner(Request $req)
    {
        $validated = $req->validate([
            'nama_toko' => 'required|unique:detail_partner',
        ]);

        if ($validated) {
            $partner = new DetailPartner();
            $partner->user_id=$req->id;
            $partner->nama_toko=$req->nama_toko;
            $partner->alamat_toko=$req->alamat_toko;
            $partner->deskripsi_suplai=$req->deskripsi_suplai;
            $partner->save();
            Auth::attempt(['username' => $req->username, 'password' => $req->password]);
            return redirect('/dashboardPartner');
        }
    }

    public function prosesLogout()
    {
        Auth::logout();
        return redirect()->route('landing1');
    }

    public function detailPenjual($id)
    {
        return view('auth.detail-penjual',
            [
                'id'=>$id,
                'title'=>'Detail Penjual'
            ]);
    }
    
    public function detailPartner($id)
    {
        return view('auth.detail-partner',
            [
                'id'=>$id,
                'title'=>'Detail Partner'
            ]);
    }

    public function lupaPassword($type)
    {
        return view('auth.forgotPassword',
        [
            'title'=>'Lupa Password',
            'type'=>$type
        ]);
    }

    public function prosesLupaPassword(Request $req)
    {
        $validated = $req->validate([
            'username' => 'required|exists:users',
            'email' => 'required|exists:users',
            'new_password' => 'required',
        ]);
        if ($validated) {
            User::where('username', $req->username)
                ->where('email', $req->email)
                ->update(['password' => Hash::make($req->new_password)]);
                return back()->with('message','Password berhasil direset,');
        }
        else {
            return back();
        }
    }
}
