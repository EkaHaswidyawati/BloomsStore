@extends('layouts.buyer')
@section('content')
<div class="pt-28 flex">
    <form class="flex flex-row items-center" action="{{url('/bayar/'.$transaksi->id)}}" method="post" onsubmit="return confirm('Note: Pastikan nominal transfer sudah benar')" enctype="multipart/form-data">
        @csrf
            <input type="hidden" value="{{$transaksi->id}}" name="id">
            <div class="bg-slate-600 w-[300px] h-[300px] rounded-lg m-4 drop-shadow-lg">
                <img class="object-cover h-[300px] w-[300px] rounded-lg" src="{{asset('barang/'.$transaksi->barang['gambar'])}}" alt="">
            </div>
            <div class="flex p-4 border shadow-md rounded-md">
                <div class="mr-16">
                    <p class="font-semibold mb-2">Detail Pesanan</p>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama Pembeli</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->pembeli['nama_lengkap']}}" disabled name="nama_pembeli">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Alamat</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->alamat}}" disabled name="alamat">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Ongkos Kirim</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="Rp. {{$transaksi->harga}}" disabled name="harga">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Jumlah</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->jumlah}}" disabled name="jumlah">
                    </div>
                    <div class="mb-4">
                        <p class="text-sm mb-1">Total Harga</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="Rp. {{$transaksi->total_harga}}" disabled name="total_harga">
                    </div>
                    <div>
                        <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/riwayat">Kembali</a>
                    </div>
                </div>
                <div class="mr-16">
                    <p class="font-semibold mb-2">Detail Barang</p>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama Toko</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="Rp. {{$transaksi->harga}}" disabled name="harga">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama Barang</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->barang['nama']}}" disabled name="jumlah">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Kategori</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->barang['kategori']}}" disabled name="kategori">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Berat Barang</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->barang['berat']}} Kg" disabled name="berat">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Harga</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="Rp. {{$transaksi->total_harga}}" disabled name="total_harga">
                    </div>
                </div>
                <div class="mr-16">
                    <p class="font-semibold mb-2">Pembayaran</p>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Metode Pembayaran</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->metode_pembayaran}}" disabled name="metode_pembayaran">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="A/n {{$rekening->nama}}" disabled name="nama_rekening">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">No. Rekening</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$rekening->no_rekening}}" disabled name="no_rekening">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Total Bayar</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="Rp. {{$total_transfer}}" disabled name="total">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Status Transaksi</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" value="{{$transaksi->status_transaksi}}" disabled name="status">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection