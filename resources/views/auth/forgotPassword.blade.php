@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center mt-16">
        <p class="text-md font-semibold">Masukkan Email dan Username Kamu</p>
        <p class="text-md font-semibold">Untuk Mereset Password</p>
        <form class="mt-8 flex flex-col w-[35%]" action="/login/{{$type}}/lupaPassword/reset" method="post">
            @csrf
            <input type="hidden" name="type">
            <p>Username</p>
            <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm " placeholder="Username" type="text" name="username">
            @error('username')
                <div class="mt-1 text-sm text-red-600">{{$message}}</div>
            @enderror
            <p>Email</p>
            <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm" placeholder="Email" type="email" name="email">
            @error('email')
                <div class="mt-1 text-sm text-red-600">{{$message}}</div>
            @enderror
            <p>Password Baru</p>
            <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm" placeholder="Password Baru" type="password" name="new_password">
            @error('new_password')
                <div class="mt-1 text-sm text-red-600">{{$message}}</div>
            @enderror
            <button class="bg-[#E68686] mt-4 py-2 rounded-[10px] duration-200 hover:bg-[#F2C4C4] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" type="submit">Reset Password</button>
        </form>
    </div>
@endsection
@section('content-right')
    <div class="flex flex-col items-center mt-28">
        <img class="w-[300px]" src="{{asset('assets/logo.png')}}" alt="logo">
        <p class="pt-10 font-bold text-lg">Daftar Jika Kamu Belum Punya Akun</p>
        <a class="bg-[#E68686] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#F2C4C4] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70"" href="/register/{{$type}}">Daftar</a>
    </div>
@endsection