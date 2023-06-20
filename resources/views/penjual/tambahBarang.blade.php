@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-36">
        <form class="flex flex-row" action="/tambahBarang" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mr-16">
                <div class="mb-2">
                    <p>Nama</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Nama Barang" type="text" name="nama">
                    @error('nama')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p>Harga</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Harga Barang (Rp)" type="number" name="harga">
                    @error('harga')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p>Berat</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Berat Barang (Kg)" type="number" name="berat">
                    @error('berat')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p>Kategori</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="test" type="Kategori Barang" name="kategori">
                    @error('kategori')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <p>Stok</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Jumlah Stok" type="number" name="stok">
                    @error('stok')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4]" type="submit">Tambah</button>
                <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4]" href="/dashboardPenjual/barang">Batal</a>
            </div>
            <div>
                <div>
                    <p>Gambar</p>
                    <input class="p-2 text-sm drop-shadow-md" type="file" name="gambar">
                    @error('gambar')
                        <div class="text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p>Deskripsi Produk</p>
                    <textarea class="p-2 w-80 drop-shadow-md text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Deskripsi Produk" name="deskripsi"></textarea>
                    @error('deskripsi')
                        <div class="text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@endsection