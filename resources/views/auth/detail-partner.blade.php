@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center mt-28">
        <img class="w-[300px]" src="{{asset('assets/logo.png')}}" alt="logo">
        <p class="pt-10 font-bold text-lg">Sudah Punya Akun?, Login Disini!</p>
        <a class="bg-[#B2A4FF] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/login/partner">Login</a>
    </div>
@endsection
@section('content-right')
    <div class="flex flex-col items-center">
        <p class="bg-[#B2A4FF] py-2 px-10 rounded-lg">Partner</p>
        <form class="mt-2 flex flex-col items-center" action="/prosesPartner" method="post">
            @csrf
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <input type="hidden" name="username" value="{{session('username')}}">
            <input type="hidden" name="password" value="{{session('password')}}">
            <input type="hidden" value="{{$id}}" name="id">
            <div class="my-1">
                <p>Nama Toko</p>
                <input required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="Milky Way" type="text" name="nama_toko">
            </div>
            <div class="my-1">
                <p>Alamat Toko</p>
                <input required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="Jl. xxx xxx xxx" type="text" name="alamat_toko">
            </div>
            <div class="my-1">
                <p>Deskripsi Suplai</p>
                <textarea required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="" name="deskripsi_suplai"></textarea>
            </div>
            <button class="bg-[#B2A4FF] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" type="submit">Daftar</button>
        </form>
    </div>
@endsection