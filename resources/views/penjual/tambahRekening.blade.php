@extends('layouts.dashboardSeller')
@section('content')
    <div class="pt-32 flex flex-col justify-center ml-[20%]">
        <div class="w-[35%]">
            <form class="" action="/tambahRekening" method="post">
                @csrf
                <input value="{{Auth::user()->id}}" type="hidden" name="id">
                <div class="mb-2">
                    <p class="mb-1">Nama</p>
                    <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Nama Rekening" name="nama">
                    @error('nama')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p class="mb-1">Jenis Bank</p>
                    <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Jenis Bank" name="jenis_bank">
                    @error('jenis_bank')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p class="mb-1">Nomor Rekening</p>
                    <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Nomor Rekening" name="no_rekening">
                    @error('no_rekening')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4]" type="submit">Tambah</button>
                <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4]" href="/dashboardPenjual/penarikan">Batal</a>
            </form>
        </div>
    </div>
@endsection