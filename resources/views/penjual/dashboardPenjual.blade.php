@extends('layouts.dashboardSeller')
@section('content')
<div class="pl-72 pt-32 flex flex-col">
    <div class="flex mb-4">
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Pembayaran Pembeli</p>
            <p class="text-3xl">{{count($pembayaran_pembeli)}}</p>
        </div>
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Verifikasi Admin</p>
            <p class="text-3xl">{{count($verifikasi_admin)}}</p>
        </div>
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Konfirmasi Penjual</p>
            <p class="text-3xl">{{count($konfirmasi_penjual)}}</p>
        </div>
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Sedang Dikirim</p>
            <p class="text-3xl">{{count($sedang_dikirim)}}</p>
        </div>
    </div>
    <div class="flex">
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Transfer Penjual</p>
            <p class="text-3xl">{{count($transfer_penjual)}}</p>
        </div>
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Selesai</p>
            <p class="text-3xl">{{count($selesai)}}</p>
        </div>
        <div class="hover:scale-110 duration-300 w-56 h-28 shadow-md rounded-md mr-4 p-4 text-center flex flex-col justify-center">
            <p class="mb-2">Gagal</p>
            <p class="text-3xl">{{count($gagal)}}</p>
        </div>
    </div>
</div>
@endsection