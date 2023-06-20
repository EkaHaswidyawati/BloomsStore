@extends('layouts.dashboardSeller')
@section('content')
    <div class="pt-32 flex flex-col justify-center ml-[20%]">
        <div class="w-[35%]">
            <form class="" action="/editCatatan" method="post">
                @csrf
                <input value="{{Auth::user()->id}}" type="hidden" name="id">
                <input value="{{$catatan->id}}" type="hidden" name="catatan_id">
                <div class="mb-2">
                    <p>Barang</p>
                    <select required class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" name="barang_id">
                        <option selected value="{{$catatan->barang_id}}">{{$catatan->barang['nama']}}</option>
                        @foreach ($barang as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <p class="text-sm mb-1">Stok Terjual</p>
                    <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" min="1" type="number" value="{{$catatan->stok_terjual}}" name="terjual">
                    @error('terjual')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p class="text-sm mb-1">Penghasilan</p>
                    <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" min="0" type="number" value="{{$catatan->penghasilan}}" name="penghasilan">
                    @error('penghasilan')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p>Tanggal</p>
                    <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Tanggal Catatan" type="date" value="{{$catatan->tanggal}}" name="tanggal">
                    @error('tanggal')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4]" type="submit">Simpan</button>
                <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4]" href="/dashboardPenjual/pencatatan">Batal</a>
            </form>
        </div>
    </div>
@endsection