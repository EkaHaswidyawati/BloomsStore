@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center mt-28">
        <p class="text-[30px] font-bold">Selamat Datang Kembali!</p>
        <div class="">
            <form class="flex flex-col" action="/prosesLogin" method="post">
                @csrf
                <input type="hidden" value="{{ $type }}" name="type">
                <p class="mt-2">Username</p>
                <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm outline-none" type="text" placeholder="Username" name="username">
                @error('username')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
                <div class="flex flex-row">
                    <p class="mt-2">Password</p>
                    <a class="mt-3 ml-10 text-[12px] underline" href="/login/{{$type}}/lupaPassword">Lupa Password?</a>
                </div>
                <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm outline-none" type="password" placeholder="Password" name="password">
                @error('password')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
                <button class="bg-[#E68686] mt-4 py-2 rounded-[10px] hover:bg-[#F2C4C4] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection

@section('content-right')
    <div class="flex flex-col items-center mt-28">
        <p class="pt-10 font-bold text-lg">Daftar Jika Kamu Belum Punya Akun</p>
        <a class="bg-[#DC4949] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#F2C4C4] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70"" href="/register/{{$type}}">Daftar</a>
    </div>
@endsection