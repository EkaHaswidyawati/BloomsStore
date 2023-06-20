<?php

namespace App\Http\Controllers;

use App\Models\DetailPartner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
date_default_timezone_set("Asia/Jakarta");
class DashboardPartnerController extends Controller
{
    public function dashboardPartner()
    {
        return view('partner.dashboardPartner',
        [
            'title' => 'Dashboard Partner'
        ]);
    }

    public function profile()
    {
        $toko = DetailPartner::where('user_id',Auth::user()->id)->first();
        return view('partner.profilePartner',
        [
            'title' => 'Profile',
            'toko' => $toko
        ]);
    }

    public function editProfile()
    {
        $toko = DetailPartner::where('user_id',Auth::user()->id)->first();
        return view('partner.editProfilePartner',
        [
            'title' => 'Edit Profile',
            'toko' => $toko
        ]);
    }

    public function prosesEditProfile(Request $req)
    {
        $current_toko = DetailPartner::where('user_id',Auth::user()->id)->first();
        $validated = $req->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'min:4', 'unique:users,username,'.Auth::user()->id],
            'nomor_telepon' => ['required', 'unique:users,nomor_telepon,'.Auth::user()->id],
            'nama' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],

            'nama_toko' => ['required', 'unique:detail_penjuals,nama_toko,'.$current_toko->id],
            'alamat_toko' => ['required'],
            'deskripsi_suplai' => ['required'],

        ]);

        if ($validated) {
            $user = User::find(Auth::user()->id);
            $user->nama_lengkap=$req->nama;
            $user->tanggal_lahir=$req->tanggal_lahir;
            $user->jenis_kelamin=$req->jenis_kelamin;
            $user->alamat=$req->alamat;
            $user->username=$req->username;
            $user->email=$req->email;
            $user->nomor_telepon=$req->nomor_telepon;
            $user->save();
            
            DetailPartner::where('id',$current_toko->id)
                        ->update(
                            [
                                'nama_toko' => $req->nama_toko,
                                'alamat_toko' => $req->alamat_toko,
                                'deskripsi_suplai' => $req->deskripsi_suplai
                            ]);

            return redirect('/profilePartner')->with('message','Profile berhasil diedit');
        }
        else {
            return back();
        }
    }

    public function batalProfile()
    {
        return redirect('/profilePartner');
    }

    public function resetPassword()
    {
        return view('partner.resetPassword',
        [
            'title' => 'Reset Password'
        ]);
    }

    public function prosesReset(Request $req)
    {
        $validated = $req->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);
        if ($validated and $req->password == $req->new_password) {
            User::where('id', Auth::user()->id)
                ->update(['password' => Hash::make($req->new_password)]);
                return back()->with('message','Password berhasil direset');
        }
        else {
            return back();
        }
    }
}
