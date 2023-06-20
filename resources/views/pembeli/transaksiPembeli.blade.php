@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex justify-center">
        <div>
            <div class="flex">
                <div class="bg-[#E68686] text-center text-sm w-10 p-2">No</div>
                <div class="bg-[#E68686] text-center text-sm w-28 p-2">Gambar</div>
                <div class="bg-[#E68686] text-center text-sm w-32 p-2">Nama Barang</div>
                {{-- <div class="bg-[#E68686] text-center text-sm w-32 p-2">Nama Toko</div> --}}
                {{-- <div class="bg-[#E68686] text-center text-sm w-32 p-2">Alamat</div> --}}
                <div class="bg-[#E68686] text-center text-sm w-20 p-2">Harga</div>
                <div class="bg-[#E68686] text-center text-sm w-24 p-2">Jumlah</div>
                <div class="bg-[#E68686] text-center text-sm w-28 p-2">Total Harga</div>
                <div class="bg-[#E68686] text-center text-sm w-28 p-2">Pembayaran</div>
                <div class="bg-[#E68686] text-center text-sm w-44 p-2">Status Transaksi</div>
                <div class="bg-[#E68686] text-center text-sm w-44 p-2">Opsi</div>
            </div>
            <table class="table-fixed border text-sm overflow-y-scroll block h-[60vh]">
                {{-- <thead>
                    <tr class="fixed bg-[#E68686]">
                        <th class="p-2">No</th>
                        <th class="w-20 p-2">Gambar</th>
                        <th class=" p-2">Nama Barang</th>
                        <th class=" p-2">Nama Toko</th>
                        <th class=" p-2">Alamat</th>
                        <th class=" p-2">Harga</th>
                        <th class=" p-2">Jumlah</th>
                        <th class=" p-2">Total Harga</th>
                        <th class=" p-2">Metode Pembayaran</th>
                        <th class=" p-2">Status Transaksi</th>
                        <th class=" p-2">Opsi</th>
                    </tr>
                </thead> --}}
                <tbody class="text-center">
                    @foreach ($transaksi as $no => $hasil)
                        <tr class="border-b-2">
                            <td class="w-10 bg-slate-200">{{$no+1}}</td>
                            <td class="w-28"><img class="h-10 m-auto" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                            <td class="w-32">{{substr($hasil->barang['nama'],0,15)}}</td>
                            {{-- <td class="w-32">{{$hasil->penjual['nama_toko']}}</td> --}}
                            {{-- <td class="w-32">{{substr($hasil->alamat,0,10)}}...</td> --}}
                            <td class="w-20">Rp. {{$hasil->barang['harga']}}</td>
                            <td class="w-24">{{$hasil->jumlah}}</td>
                            <td class="w-28">Rp. {{$hasil->total_harga}}</td>
                            <td class="w-28">{{$hasil->metode_pembayaran}}</td>
                            <td class="w-44">{{$hasil->status_transaksi}}</td>
                            <td class="bg-slate-200 w-44">
                                <form class="flex" action="{{'/transaksi/batalkan/'.$hasil->id}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin membatalkan transaksi ini?')">
                                    @csrf
                                    <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/transaksi/detail/'.$hasil->id)}}">Detail</a>
                                    <a onclick="return confirm('Apakah barang sudah kamu terima?')" class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/transaksi/selesai/'.$hasil->id)}}">Selesai</a>
                                    <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Batalkan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection