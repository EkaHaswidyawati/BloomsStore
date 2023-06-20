@extends('layouts.dashboardSeller')
@section('content')
<div class="pl-72 pt-36">
    <form class="flex flex-row" action="{{url('/editBarang/'.$barang->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="toko_id">
        <div class="mr-16">
            <div class="mb-2">
                <p>Nama</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->nama}}" type="text" name="nama">
                @error('nama')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-2">
                <p>Harga</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-[#F2C4C4] rounded-md outline-[#B2A4FF]" value="{{$barang->harga}}" type="text" name="harga">
                @error('harga')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-2">
                <p>Berat</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->berat}}" type="number" name="berat">
                @error('berat')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-2">
                <p>Kategori</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->kategori}}" type="text" name="kategori">
                @error('kategori')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-2">
                <p>Stok</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->stok}}" type="number" name="stok">
                @error('stok')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <button class="bg-[#E68686] p-2 mt-2 mr-4 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" type="submit">Simpan</button>
            <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardPenjual/barang">Batal</a>
        </div>
        <div class="mr-9">
            <div>
                <p>Gambar</p>
                <input class="p-2 text-sm drop-shadow-md" value="{{$barang->gambar}}" type="file" name="gambar">
            </div>
            <div>
                <img class="h-80" src="{{asset('barang/'.$barang->gambar)}}" alt="Gambar Produk">
            </div>
        </div>
        <div>
            <p>Deskripsi Produk</p>
            <textarea class="p-2 w-80 drop-shadow-md text-sm border border-[#F2C4C4] rounded-md outline-[#F2C4C4]" name="deskripsi">{{$barang->detail_produk}}</textarea>
            @error('deskripsi')
                <div class="mt-2 text-sm text-red-600">{{$message}}</div>
            @enderror
        </div>
    </form>
</div>
@endsection