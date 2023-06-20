@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex justify-center">
        <form class="flex flex-col" action="/profilePembeli/prosesEdit" method="post">
            @csrf
            <p class="font-semibold mb-2">Data Diri</p>
            <div class="p-4 border shadow-md rounded-md flex mb-6">
                <div class="mr-16">   
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nama Lengkap</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{Auth::user()->nama_lengkap}}" type="text" name="nama">
                        @error('nama')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Tanggal Lahir</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{Auth::user()->tanggal_lahir}}" type="date" name="tanggal_lahir">
                        @error('tanggal_lahir')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Jenis Kelamin</p>
                        <select required class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" name="jenis_kelamin">
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
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{Auth::user()->alamat}}" type="text" name="alamat">
                        @error('alamat')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Username</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{Auth::user()->username}}" type="text" name="username">
                        @error('username')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Email</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{Auth::user()->email}}" type="email" name="email">
                        @error('email')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nomor Telepon</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{Auth::user()->nomor_telepon}}" type="text" name="nomor_telepon">
                        @error('nomor_telepon')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-row">
                <button class="bg-[#E68686] p-2 mr-4 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-md" type="submit">Simpan</button>
                <a class="bg-[#E68686] p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-md" href="/profilePembeli">Batal</a>
            </div>
        </form>
    </div>
@endsection