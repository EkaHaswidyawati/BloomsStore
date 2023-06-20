@extends('layouts.dashboardSeller')
@section('content')
<div class="pl-72 pt-32 mb-4">
    <a class="bg-[#E68686] p-2 mr-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/penarikan/tambah">Tambah</a>
</div>
<div id="tabel" class="pl-72 flex flex-col justify-center">
    <div class="flex">
        <div class="bg-[#E68686] text-center text-sm p-2 w-10">No</div>
        <div class="bg-[#E68686] text-center text-sm p-2 w-72">Nama</div>
        <div class="bg-[#E68686] text-center text-sm p-2 w-48">Jenis Bank</div>
        <div class="bg-[#E68686] text-center text-sm p-2 w-56">No. Rekening</div>
        <div class="bg-[#E68686] text-center text-sm p-2 w-24">Opsi</div>
    </div>
    <table class="table-fixed border text-sm overflow-y-scroll block w-[860px] h-[60vh]">
        {{-- <thead class="">
            <tr class="">
                <th class="bg-[#F2C4C4] p-2">No</th>
                <th class="bg-[#F2C4C4] p-2">Nama</th>
                <th class="bg-[#F2C4C4] p-2">Jenis Bank</th>
                <th class="bg-[#F2C4C4] p-2">No. Rekening</th>
                <th class="bg-[#F2C4C4] p-2">Opsi</th>
            </tr>
        </thead> --}}
        <tbody class="text-center">
            @foreach ($rekening as $no => $hasil)
                <tr class="border-b-2">
                    <td class="bg-[#F2C4C4] w-10">{{$no+1}}</td>
                    <td class="w-72">{{$hasil->nama}}</td>
                    <td class="w-48">{{$hasil->jenis_bank}}</td>
                    <td class="w-56">{{$hasil->no_rekening}}</td>
                    <td class="bg-[#F2C4C4] w-24">
                        <form class="flex" action="{{'/hapusRekening/'.$hasil->id}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus rekening ini?')">
                            @csrf
                            <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/penarikan/edit/'.$hasil->id)}}">Edit</a>
                            <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection