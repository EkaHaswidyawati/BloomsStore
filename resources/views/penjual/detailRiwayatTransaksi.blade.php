@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-64 pt-28 flex">
        <form class="flex flex-row mx-auto" action="{{url('/dashboardAdmin/transaksi/simpan')}}" method="post" onsubmit="return confirm('Note: Pastikan nominal transfer sudah benar')" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$transaksi->id}}" name="id">
            <input type="hidden" value="{{$transaksi->barang['id']}}" name="barang_id">
            <div class="flex flex-col">
                <div class="bg-slate-600 w-[200px] h-[200px] rounded-lg m-4 drop-shadow-lg">
                    <img class="object-cover h-[200px] w-[200px] rounded-lg" src="{{asset('barang/'.$transaksi->barang['gambar'])}}" alt="">
                </div>
                <div class="w-[200px] h-[200px] rounded-lg m-4 drop-shadow-lg">
                    <p>Bukti Transfer</p>
                    <img class="object-cover h-[200px] w-[200px] rounded-lg" src="{{asset('bukti pembayaran/'.$transaksi->bukti_pembayaran)}}" alt="">
                </div>
            </div>
            <div class="flex p-4 border shadow-md rounded-md">
                <div class="">
                    <p class="font-semibold mb-2">Detail Pesanan</p>
                    <div class="mr-16 p-4">
                        <div class="mb-2">
                            <p class="text-sm mb-1">Nama Pembeli</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->pembeli['nama_lengkap']}}" disabled name="nama_pembeli">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Alamat</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->alamat}}" disabled name="alamat">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Ongkir</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->ongkir}}" disabled name="ongkir">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Jumlah</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->jumlah}}" name="jumlah">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Total Harga</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->total_harga}}" disabled name="total_harga">
                        </div>
                    </div>
                    <div>
                        <a class="bg-[#B2A4FF] p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/dashboardPenjual/riwayat">Kembali</a>
                    </div>
                </div>
                <div class="">
                    <p class="font-semibold mb-2">Detail Barang</p>
                    <div class="mr-16 p-4">
                        <div class="mb-2">
                            <p class="text-sm mb-1">Nama Toko</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->penjual['nama_toko']}}" disabled name="toko">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Nama Barang</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->barang['nama']}}" disabled name="jumlah">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Kategori</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->barang['kategori']}}" disabled name="kategori">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Berat Barang</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->barang['berat']}} Kg" disabled name="berat">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Harga</p>
                            <input class="mb-2 shadow bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->total_harga}}" disabled name="total_harga">
                        </div>
                    </div>
                </div>
                <div class="">
                    <p class="font-semibold mb-2">Pembayaran</p>
                    <div class="mr-16 p-4">
                        <div class="mb-2">
                            <p class="text-sm mb-1">Metode Pembayaran</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->metode_pembayaran}}" disabled name="metode_pembayaran">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Nama</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="A/n {{$rekening->nama}}" disabled name="nama_rekening">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">No. Rekening</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$rekening->no_rekening}}" disabled name="no_rekening">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Total Bayar</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$total_transfer}}" disabled name="total">
                        </div>
                        <div class="mb-2">
                            <p class="text-sm mb-1">Status Transaksi</p>
                            <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->status_transaksi}}" disabled name="status">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection