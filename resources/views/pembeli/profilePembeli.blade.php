@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex justify-center">
        <div class="">
            <p class="font-semibold mb-2">Data Diri</p>
            <div class="p-4 border shadow-md rounded-md flex flex-row mb-6">
                <form class="flex flex-col mr-14">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nama Lengkap</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->nama_lengkap}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Tanggal Lahir</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="date" disabled value="{{Auth::user()->tanggal_lahir}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Jenis Kelamin</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->jenis_kelamin}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Alamat</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->alamat}}">
                    </div>
                </form>
                <form class="flex flex-col">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Username</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->username}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Email</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->email}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nomor Telepon</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->nomor_telepon}}">
                    </div>
                </form>
            </div>
            <a class="bg-[#E68686] p-2 rounded-md hover:bg-[#F2C4C4] slate-500 duration-200 drop-shadow-md" href="/profilePembeli/edit">Edit Profil</a>
        </div>
    </div>
@endsection