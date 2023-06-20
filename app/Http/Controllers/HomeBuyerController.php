<?php

namespace App\Http\Controllers;

use App\Models\AlamatPembeli;
use App\Models\Barang;
use App\Models\BiayaPengiriman;
use App\Models\DataTransaksi;
use App\Models\DetailPenjual;
use App\Models\MetodePembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
date_default_timezone_set("Asia/Jakarta");
class HomeBuyerController extends Controller
{
    public function home()
    {
        return view('pembeli.home',
        [
            'title' => 'Beranda',
            'data' => DB::table('barang')
                    ->select('*','barang.id AS barang_id','detail_penjual.id AS toko_id')
                    ->join('detail_penjual','detail_penjual.id','=','barang.penjual_id')->get()
        ]);
    }

    public function profile()
    {
        return view('pembeli.profilePembeli',
        [
            'title' => 'Profile',
        ]);
    }

    public function editProfile()
    {
        return view('pembeli.editProfilePembeli',
        [
            'title' => 'Edit Profile',
        ]);
    }

    public function prosesEditProfile(Request $req)
    {
        $validated = $req->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'min:4', 'unique:users,username,'.Auth::user()->id],
            'nomor_telepon' => ['required', 'unique:users,nomor_telepon,'.Auth::user()->id],
            'nama' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
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
            return redirect('/profilePembeli');
        }
        else {
            return back();
        }
    }

    public function resetPassword()
    {
        return view('pembeli.resetPassword',
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

    public function alamat()
    {
        return view('pembeli.alamatPembeli',
        [
            'title' => 'Alamat',
            'alamat' => AlamatPembeli::where('pembeli_id',Auth::user()->id)->get()
        ]);
    }

    public function tambahAlamat()
    {
        return view('pembeli.tambahAlamat',
    [
        'title' => 'Tambah Alamat'
    ]);
    }

    public function prosesTambahAlamat(Request $req)
    {
        $validated = $req->validate([
            'alamat' => 'required'
        ]);

        if ($validated) {
            $alamat = new AlamatPembeli();
            $alamat->pembeli_id=Auth::user()->id;
            $alamat->alamat=$req->alamat;
            $alamat->save();
            return redirect('/alamat')->with('message','Alamat berhasil ditambahkan');
        }
    }

    public function editAlamat($id)
    {
        return view('pembeli.editAlamat',
    [
        'title' => 'Edit Alamat',
        'alamat' => AlamatPembeli::where('id',$id)->first()
    ]);
    }

    public function prosesEditAlamat(Request $req)
    {
        $validated = $req->validate([
            'alamat' => 'required'
        ]);

        if ($validated) {
            $alamat = AlamatPembeli::find($req->id);
            $alamat->pembeli_id=Auth::user()->id;
            $alamat->alamat=$req->alamat;
            $alamat->save();
            return redirect('/alamat')->with('message','Alamat berhasil diedit');
        }
    }

    public function hapusAlamat($id)
    {
        $alamat = AlamatPembeli::find($id);
        $alamat->delete();
        return back()->with('message','Alamat berhasil dihapus');
    }

    // Pembelian
    public function cariBarang(Request $req)
    {
        $validated = $req->validate([
            'search' => 'required'
        ]);

        $searched_product = $req->search;

        if ($validated) {
            $product = Barang::where('nama','LIKE','%'.$searched_product.'%')->get();
            if ($product) {
                return view('pembeli.cariBarang',
                [
                    'title' => 'Beranda',
                    'data' => $product
                ]);
            }else{
                return back()->with('message','Barang yang anda cari tidak ada');
            }
        } else{
            return back()->with('message','Ketikkan barang yang ingin anda cari');
        }
    }

    public function detailBarang($id)
    {
        $barang = Barang::where('id',$id)->first();
        // dd(BiayaPengiriman::where('penjual_id',$barang->penjual_id)->first());
        return view('pembeli.detailBarang',
        [
            'title' => 'Detail Barang',
            'data' => $barang,
            'toko' => DetailPenjual::where('id',$barang->penjual_id)->first(),
            'alamat' => AlamatPembeli::where('pembeli_id',Auth::user()->id)->get(),
            'pembayaran' => MetodePembayaran::all(),
            'ongkir' => BiayaPengiriman::where('penjual_id',$barang->penjual_id)->get()
        ]);
    }

    public function buatPesanan(Request $req)
    {
        $validated = $req->validate([
            'jumlah' => 'required',
            'alamat' => 'required',
            'ongkir' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        if ($validated) {
            $total = $req->harga*$req->jumlah+$req->ongkir;
            $transaksi = new DataTransaksi();
            $transaksi->penjual_id=$req->penjual_id;
            $transaksi->pembeli_id=$req->pembeli_id;
            $transaksi->barang_id=$req->barang_id;
            $transaksi->alamat=$req->alamat;
            $transaksi->harga=$req->harga;
            $transaksi->jumlah=$req->jumlah;
            $transaksi->ongkir=$req->ongkir;
            $transaksi->total_harga=$total;
            $transaksi->metode_pembayaran=$req->metode_pembayaran;
            $transaksi->bukti_pembayaran='null';
            $transaksi->tanggal_transaksi=date('Y-m-d H:i:s');
            $transaksi->save();
            return back()->with('message','Pesanan Berhasil Dibuat, Silahkan Cek Menu Transaksi.');
        }
        else{
            
        }
    }

    // Transaksi
    public function transaksi()
    {
        return view('pembeli.transaksiPembeli',
        [
            'title'=>'Transaksi',
            'transaksi'=>DataTransaksi::where('status_transaksi','!=','Selesai')->where('status_transaksi','!=','Gagal')->get()
        ]);
    }

    public function detailTransaksi($id)
    {
        $transaksi = DataTransaksi::find($id);
        return view('pembeli.detailTransaksi',
        [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi,
            'rekening' => MetodePembayaran::where('jenis_bank',$transaksi->metode_pembayaran)->first(),
            'total_transfer' => $transaksi->total_harga+1000
        ]);
    }

    public function batalTransaksi($id)
    {
        $transaksi = DataTransaksi::find($id);
        $transaksi->status_transaksi='Gagal';
        $transaksi->save();
        return back()->with('message','Pesanan berhasil dibatalkan');
    }
    public function selesaiTransaksi($id)
    {
        $transaksi = DataTransaksi::find($id);
        if ($transaksi->status_transaksi == 'Sedang Dikirim') {
            $transaksi->status_transaksi='Transfer Penjual';
            $transaksi->save();
            return back()->with('message','Pesanan selesai');
        }
        else {
            return back()->with('message','Anda belum menyelesaikan transaksi');
        }
    }

    public function bayarTransaksi(Request $req)
    {
        $validated = $req->validate([
            'bukti_pembayaran' => 'required',
        ]);
        if ($validated) {
            if ($req->hasFile('bukti_pembayaran')) {
                $transaksi = DataTransaksi::find($req->id);
                $req->file('bukti_pembayaran')->move('bukti pembayaran/',date('YmdHis') . "." .$req->file('bukti_pembayaran')->getClientOriginalName());
                $transaksi->bukti_pembayaran=date('YmdHis') . "." .$req->file('bukti_pembayaran')->getClientOriginalName();
                $transaksi->status_transaksi='Verifikasi Admin';
                $transaksi->save();
                return redirect('/transaksi')->with('message','Pembayaran berhasil, silahkan tunggu konfirmasi dari admin dan penjual.');
            }
        }
    }

    public function riwayat()
    {
        return view('pembeli.riwayat',
    [
        'title' => 'Transaksi',
        'transaksi' => DataTransaksi::where('status_transaksi','Selesai')->where('pembeli_id',Auth::user()->id)->get()
    ]);
    }

    public function detailRiwayat($id)
    {
        $transaksi = DataTransaksi::find($id);
        return view('pembeli.detailTransaksi',
        [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi,
            'rekening' => MetodePembayaran::where('jenis_bank',$transaksi->metode_pembayaran)->first(),
            'total_transfer' => $transaksi->total_harga+1000
        ]);
    }
}