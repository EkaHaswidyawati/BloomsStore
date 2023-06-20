@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-32">
        <div class="mb-4">
            <a class="bg-[#E68686] p-2 mr-2 text-white rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardPenjual/barang">Kembali</a>
        </div>
        <div class="flex flex-row">
            <div class="bg-[#E68686] text-center text-sm font-semibold py-1 w-[42px]">No</div>
            <div class="bg-[#F2C4C4] text-center text-sm font-semibold py-1 w-36">Gambar</div>
            <div class="bg-[#E68686] text-center text-sm font-semibold py-1 w-44">Nama</div>
            <div class="bg-[#F2C4C4] text-center text-sm font-semibold py-1 w-28">Harga</div>
            <div class="bg-[#E68686] text-center text-sm font-semibold py-1 w-14">Berat</div>
            <div class="bg-[#F2C4C4] text-center text-sm font-semibold py-1 w-32">Kategori</div>
            <div class="bg-[#E68686] text-center text-sm font-semibold py-1 w-14">Stok</div>
            <div class="bg-[#F2C4C4] text-center text-sm font-semibold py-1 w-[222px]">Deskripsi</div>
            <div class="bg-[#E68686] text-center text-sm font-semibold py-1 w-24">Opsi</div>
        </div>
        <div class="w-[1050px] h-[400px] overflow-y-scroll flex flex-col items-center shadow-md border">
            <table class="table-fixed border w-[1031px] text-sm p-4">
                {{-- <thead class="border sticky">
                    <tr>
                        <th class="bg-slate-200 w-10">No</th>
                        <th class="bg-slate-100 w-36">Gambar</th>
                        <th class="bg-slate-200 w-44">Nama</th>
                        <th class="bg-slate-100 w-28">Harga</th>
                        <th class="bg-slate-200 w-14">Berat</th>
                        <th class="bg-slate-100 w-32">Kategori</th>
                        <th class="bg-slate-200 w-14">Stok</th>
                        <th class="bg-slate-100">Deskripsi</th>
                        <th class="bg-slate-200 w-24">Opsi</th>
                    </tr>
                </thead> --}}
                <tbody class="text-center">
                    @foreach ($barang as $no => $hasil)  
                        <tr class="bg-slate-50">
                            <td class="bg-[#F2C4C4] w-10">{{$no+1}}</td>
                            <td class="bg-[#E68686] w-36">
                                <img class="h-10 inline-block m-auto" src="{{asset('barang/'.$hasil->gambar)}}" alt="{{$hasil->gambar}}">
                            </td>
                            <td class="bg-[#F2C4C4] w-44">{{$hasil->nama}}</td>
                            <td class="bg-[#E68686] w-28">{{'Rp. '.$hasil->harga}}</td>
                            <td class="bg-[#F2C4C4] w-14">{{$hasil->berat}}</td>
                            <td class="bg-[#E68686] w-32">{{$hasil->kategori}}</td>
                            <td class="bg-[#F2C4C4] w-14">{{$hasil->stok}}</td>
                            <td class="bg-[#E68686] overflow-hidden whitespace-nowrap">{{$hasil->detail_produk}}</td>
                            <td class="bg-[#F2C4C4] w-24">
                                <form action="{{url('/pulihkanBarang/'.$hasil->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin memulihkan barang ini?')">
                                    @csrf
                                    <button class="text-[12px] bg-red-500 text-white p-1 rounded-sm">Pulihkan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection