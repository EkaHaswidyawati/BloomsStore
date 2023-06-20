@extends('layouts.buyer')
@section('content')
    {{-- <p class="text-xl font-semibold">Produk</p> --}}
    <div class="pt-28 flex flex-row flex-wrap justify-center">
        @foreach ($data as $barang)
        <div class="m-4 w-52 bg-white p-2 flex flex-col items-center rounded-md overflow-x-hidden whitespace-nowrap" style="box-shadow: 0px 2px 10px 0px gray">
            <div class="h-48 bg-slate-300">
                <img class="object-cover h-48" src="{{asset('/barang/'.$barang->gambar)}}" alt="">
            </div>
            <div class="flex flex-col items-center justify-between mt-2">
                <p class="font-semibold hover:text-xl duration-300">{{$barang->nama}}</p>
                <p class="hover:text-blue-400 duration-300">Delicious
                </p>
                <p class="text-blue-400 text-lg mt-2 hover:text-xl duration-300">Rp. {{$barang->harga}}</p>
                <p class="mt-2 text-sm hover:text-base duration-300">
                    Rating
                    <i class="fa-solid fa-star" style="color: #dfe236;"></i>
                    4.5
                </p>
            </div>
            <a class="py-2 w-48 bg-[#E68686] text-center mt-2 text-white hover:bg-[#F2C4C4] duration-300" href="{{'/detailbarang/'.$barang->id}}">Detail</a>
        </div>
        @endforeach
    </div>
@endsection