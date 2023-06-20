@extends('layouts.dashboardSeller')
@section('content')
    <div class="pt-32 flex flex-col justify-center ml-[20%]">
        <div class="w-[35%]">
            <form class="" action="/editRekening" method="post">
                @csrf
                <input value="{{Auth::user()->id}}" type="hidden" name="id">
                <input value="{{$rekening->id}}" type="hidden" name="rekening_id">
                <div class="mb-2">
                    <p class="mb-1">Nama</p>
                    <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Nama Rekening" value="{{$rekening->nama}}" name="nama">
                    @error('nama')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p class="mb-1">Jenis Bank</p>
                    <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Jenis Bank" value="{{$rekening->jenis_bank}}" name="jenis_bank">
                    @error('jenis_bank')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p class="mb-1">Nomor Rekening</p>
                    <input class="p-2 drop-shadow-md w-52 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Nomor Rekening" value="{{$rekening->no_rekening}}" name="no_rekening">
                    @error('no_rekening')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" type="submit">Simpan</button>
                <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardPenjual/penarikan">Batal</a>
            </form>
        </div>
    </div>
@endsection