@extends('layouts.dashboardPartner')
@section('content')
    <div class="pl-72 pt-32">
        <form class="flex flex-col mr-14" action="/profilePartner/prosesEdit" method="post">
            @csrf
            <p class="font-semibold mb-2">Data Diri</p>
            <div class="p-4 border shadow-md rounded-md flex flex-col w-[540px] mb-6">
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Nama Lengkap</p>
                    <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" value="{{Auth::user()->nama_lengkap}}" type="text" name="nama">
                    @error('nama')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Tanggal Lahir</p>
                    <input class="w-32 border rounded-md text-sm p-2 outline-slate-800" value="{{Auth::user()->tanggal_lahir}}" type="date" name="tanggal_lahir">
                    @error('tanggal_lahir')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Jenis Kelamin</p>
                    <select required class="w-32 border rounded-md text-sm p-2 outline-slate-800" name="jenis_kelamin">
                        <option>{{Auth::user()->jenis_kelamin}}</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Alamat</p>
                    <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" value="{{Auth::user()->alamat}}" type="text" name="alamat">
                    @error('alamat')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Username</p>
                    <input class="border rounded-md text-sm p-2 outline-slate-800" value="{{Auth::user()->username}}" type="text" name="username">
                    @error('username')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Email</p>
                    <input class="border rounded-md text-sm p-2 outline-slate-800" value="{{Auth::user()->email}}" type="email" name="email">
                    @error('email')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Nomor Telepon</p>
                    <input class="border rounded-md text-sm p-2 outline-slate-800" value="{{Auth::user()->nomor_telepon}}" type="text" name="nomor_telepon">
                    @error('nomor_telepon')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <p class="font-semibold mb-2">Data Toko</p>
            <div class="p-4 border shadow-md rounded-md flex flex-col w-[540px] mb-6">
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Nama Toko</p>
                    <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" value="{{$toko->nama_toko}}" type="text" name="nama_toko">
                    @error('nama_toko')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Alamat Toko</p>
                    <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" value="{{$toko->alamat_toko}}" type="text" name="alamat_toko">
                    @error('alamat_toko')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p class="text-sm font-semibold mt-2 mb-1">Deskripsi Suplai</p>
                    <textarea class="w-64 border rounded-md text-sm p-2 outline-slate-800" name="deskripsi_suplai">{{$toko->deskripsi_suplai}}</textarea>
                    @error('deskripsi_suplai')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="flex flex-row mb-4">
                <button class="bg-[#B2A4FF] p-2 mr-4 rounded-md hover:bg-slate-500 duration-200 drop-shadow-md" type="submit">Simpan</button>
                <a class="bg-[#B2A4FF] p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-md" href="/profilePartner">Batal</a>
            </div>
        </form>
    </div>
@endsection