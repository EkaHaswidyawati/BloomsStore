@extends('layouts.dashboardAdmin')
@section('content')
    <div class="pl-72 pt-32">
        <div class="mb-4">
            <a class="bg-[#E68686] p-2 mr-2 text-white rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardAdmin/pembayaran/tambah">Tambah</a>
        </div>
        <div class="flex flex-row">
            <div class="bg-[#E68686] text-center text-sm py-2 w-10">No</div>
            <div class="bg-[#E68686] text-center text-sm py-2 w-72">Nama</div>
            <div class="bg-[#E68686] text-center text-sm py-2 w-48">Jenis Bank</div>
            <div class="bg-[#E68686] text-center text-sm py-2 w-56">No. Rekening</div>
            <div class="bg-[#E68686] text-center text-sm py-2 w-24">Opsi</div>
        </div>
        <table class="table-fixed border text-sm overflow-y-scroll block w-[860px] h-[60vh]">
            <tbody class="text-center">
                @foreach ($pembayaran as $no => $hasil)
                    <tr class="bg-slate-50 border-b-2">
                        <td class="bg-[#F2C4C4] w-10">{{$no+1}}</td>
                        <td class="w-72">{{$hasil->nama}}</td>
                        <td class="w-48">{{$hasil->jenis_bank}}</td>
                        <td class="w-56">{{$hasil->no_rekening}}</td>
                        <td class="bg-[#F2C4C4] w-24">
                            <form class="flex" action="{{url('/hapusPembayaran/'.$hasil->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus pembayaran ini?')">
                                @csrf
                                <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardAdmin/pembayaran/edit/'.$hasil->id)}}">Edit</a>
                                <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection