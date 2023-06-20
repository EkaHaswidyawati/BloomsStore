@extends('layouts.dashboardAdmin')
@section('content')
    <div class="pl-72 pt-36">
        <p class="mb-4 font-semibold">Edit Metode Pembayaran</p>
        <form action="/editMetodePembayaran" method="post">
            @csrf
            <input type="hidden" value="{{$pembayaran->id}}" name="id">
            <div class="mb-2">
                <p class="mb-1">Nama</p>
                <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Nama Rekening" value="{{$pembayaran->nama}}" name="nama">
            </div>
            <div class="mb-2">
                <p class="mb-1">Jenis Bank</p>
                <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Jenis Bank" value="{{$pembayaran->jenis_bank}}" name="jenis_bank">
            </div>
            <div class="mb-2">
                <p class="mb-1">Nomor Rekening</p>
                <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Nomor Rekening" value="{{$pembayaran->no_rekening}}" name="no_rekening">
            </div>
            <div>
                <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" type="submit">Edit</button>
                <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardAdmin/pembayaran">Batal</a>
            </div>
        </form>
    </div>
@endsection