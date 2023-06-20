@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex flex-row">
        <div class="bg-slate-600 w-[400px] h-[400px] rounded-lg m-4 drop-shadow-lg">
            <img class="object-cover h-[400px] w-[400px] rounded-lg" src="{{asset('barang/'.$data->gambar)}}" alt="">
        </div>
        <div class="w-[35%] mr-4 bg-slate-50 py-2 px-4 rounded-lg drop-shadow-lg">
            <p class="text-2xl font-semibold">{{$data->nama}}</p>
            <p class="text-blue-500 text-3xl">Rp. {{$data->harga}}</p>
            <p>{{$toko->nama_toko}}</p>
            <p class="p-2 border-b-4 border-opacity-80 text-center hover:text-lg duration-300 border-[#F2C4C4]">Detail</p>
            <div class="mt-2 ml-2">
                <p class="text-sm opacity-80">Berat: {{$data->berat}}Kg</p>
                <p class="text-sm opacity-80">Kategori: {{$data->kategori}}</p>
                <p class="text-sm opacity-80">Stok: {{$data->stok}}</p>
            </div>
            <p class="opacity-80 mt-2">Deskripsi:</p>
            <p>{{$data->detail_produk}}</p>
        </div>
        <div class="w-[30%] h-[450px] bg-slate-50 py-2 px-4 rounded-lg drop-shadow-lg">
            <p class="text-xl text-center mb-2 font-semibold">Beli</p>
            <div class="flex mb-2 rounded-md bg-slate-200 p-1 shadow">
                <div class="w-[50px] h-[50px] rounded-lg mr-2">
                    <img class="object-cover w-[50px] h-[50px] rounded-lg" src="{{asset('barang/'.$data->gambar)}}" alt="">
                </div>
                <p class="text-lg">{{$data->nama}}</p>
            </div>
            <form action="/detailBarang/buatPesanan" method="post">
                @csrf
                <input type="hidden" value="{{$toko->user_id}}" name="penjual_id">
                <input type="hidden" value="{{Auth::user()->id}}" name="pembeli_id">
                <input type="hidden" value="{{$data->id}}" name="barang_id">
                <input type="hidden" value="{{$data->harga}}" name="harga">
                <p class="text-lg text-blue-500">Rp. {{$data->harga}}</p>
                <p>Stok Barang: {{$data->stok}}</p>
                <div class="flex justify-center items-center">
                    <p>Jumlah Yang Dibeli:</p>
                    <input class="text-center ml-4 outline-none shadow rounded-full p-2 w-24" min="1" max="{{$data->stok}}" type="number" value="1" name="jumlah">
                </div>
                <div class="mb-2 ml-4">
                    <p>Alamat</p>
                    <select required class="rounded-md py-1 px-2 w-[95%] text-[12px] shadow-md outline-none" name="alamat">
                        <option selected disabled hidden>Pilih Alamat Tujuan</option>
                        @foreach ($alamat as $item)
                        <option value="{{$item->alamat}}">{{$item->alamat}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2 ml-4">
                    <p>Ongkos Kirim</p>
                    <select required class="rounded-md py-1 px-2 w-[95%] text-[12px] shadow-md outline-none" name="ongkir">
                        <option selected disabled hidden>Pilih Ongkos Kirim</option>
                        @foreach ($ongkir as $item)
                        <option value="{{$item->harga}}">{{$item->jarak}} Km, Ongkir Rp. {{$item->harga}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2 ml-4">
                    <p>Metode Pembayaran</p>
                    <select required class="rounded-md py-1 px-2 w-[95%] text-[12px] shadow-md outline-none" name="metode_pembayaran">
                        <option selected disabled hidden>Pilih Metode Pembayaran</option>
                        @foreach ($pembayaran as $item)
                        <option value="{{$item->jenis_bank}}">{{$item->jenis_bank}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4 flex">
                    <button class="bg-[#E68686] p-2 mx-auto text-white rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" type="submit">Buat Pesanan</button>
                </div>
            </form>
        </div>
    </div>
@endsection