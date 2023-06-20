@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex justify-center">
        <div class="flex flex-col items-center">
            <p class="font-semibold">Masukkan password baru anda, untuk mereset password saat ini.</p>
            <div class="p-4 border shadow-md rounded-md mb-6">
                <form class="flex flex-col items-center" action="/proses/resetPasswordPembeli" method="post">
                    @csrf
                    <div class="my-2">
                        <p>Password Baru</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="password" placeholder="Password Baru" name="password">
                        @error('password')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-2">
                        <p>Ulangi Password</p>
                        <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="password" placeholder="Ulangi Password" name="new_password">
                        @error('new_password')
                            <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="mt-2 p-2 text-white bg-[#E68686] hover:bg-[#F2C4C4] duration-200 rounded-md drop-shadow-lg" type="submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection