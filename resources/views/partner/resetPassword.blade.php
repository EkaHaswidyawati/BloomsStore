@extends('layouts.dashboardPartner')
@section('content')
    <div class="pl-72 pt-36">
        <form class="" action="/proses/resetPasswordPartner" method="post">
            @csrf
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <p class="font-semibold">Masukkan password baru anda, untuk mereset password saat ini.</p>
            <div class="my-2">
                <p>Password Baru</p>
                <input class="text-sm p-2 rounded-md border border-slate-300 outline-[#B2A4FF] drop-shadow-md" type="password" placeholder="Password Baru" name="password">
            </div>
            <div class="my-2">
                <p>Ulangi Password</p>
                <input class="text-sm p-2 rounded-md border border-slate-300 outline-[#B2A4FF] drop-shadow-md" type="password" placeholder="Ulangi Password" name="new_password">
            </div>
            <button class="p-2 text-white bg-[#B2A4FF] hover:bg-slate-400 duration-200 rounded-md drop-shadow-lg" type="submit">Reset Password</button>
        </form>
    </div>
@endsection