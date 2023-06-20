@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center mt-28">
        <img class="w-[300px]" src="{{asset('assets/logo.png')}}" alt="logo">
        <p class="pt-10 font-bold text-lg">Sudah Punya Akun?, Login Disini!</p>
        <a class="bg-[#E68686] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#F2C4C4] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/login/penjual">Login</a>
    </div>
@endsection
@section('content-right')
    <div class="flex flex-col items-center">
        <p class="bg-[#E68686] py-2 px-10 rounded-lg">Penjual</p>
        <form class="mt-2 flex flex-col items-center" action="/prosesPenjual" method="post">
            @csrf
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <input type="hidden" name="username" value="{{session('username')}}">
            <input type="hidden" name="password" value="{{session('password')}}">
            <input type="hidden" value="{{$id}}" name="id">
            <div class="my-1">
                <p>Nama Toko</p>
                <input class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="Gege Florist" type="text" name="nama_toko">
                @error('nama_toko')
                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="my-1">
                <p>Alamat Toko</p>
                <input class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="Jl. xxx xxx xxx" type="text" name="alamat_toko">
                @error('alamat_toko')
                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="my-1">
                <p>Deskripsi Toko</p>
                <textarea class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="" name="deskripsi_toko"></textarea>
                @error('deskripsi_toko')
                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <button class="bg-[#E68686] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#F2C4C4] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" type="submit">Daftar</button>
        </form>
    </div>
@endsection