@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex justify-center">
        <div>
            <div class="w-[900px] h-[340px] mb-4 overflow-y-scroll flex flex-col items-center shadow-md border">
                <table class="table-fixed w-[900px] border text-sm">
                    <div class="flex text-sm">
                        <div class="bg-[#E68686] text-center text-sm w-10 p-2">No</div>
                        <div class="bg-[#E68686] text-center text-sm w-[746px] p-2">Alamat</div>
                        <div class="bg-[#E68686] text-center text-sm w-24 p-2">Opsi</div>
                    </div>
                    {{-- <thead>
                        <tr class="">
                            <th class="bg-slate-300 p-2">No</th>
                            <th class="bg-slate-200 p-2">Alamat</th>
                            <th class="bg-slate-200 p-2">Opsi</th>
                        </tr>
                    </thead> --}}
                    <tbody class="text-center">
                        @foreach ($alamat as $no => $hasil)
                        <tr class="border-b-2 h-10">
                            <td class="w-10 bg-slate-200">{{$no+1}}</td>
                            <td class="w-[746px] overflow-hidden whitespace-nowrap text-ellipsis">{{$hasil->alamat}}</td>
                            <td class="bg-slate-200 w-24">
                                <form class="flex" action="{{url('/alamat/hapus/'.$hasil->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus alamat ini?')">
                                    @csrf
                                    <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/alamat/edit/'.$hasil->id)}}">Edit</a>
                                    <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="">
                <a class="bg-[#E68686] p-2 mr-2 text-white rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/alamat/tambah">Tambah</a>
            </div>
        </div>
    </div>
@endsection