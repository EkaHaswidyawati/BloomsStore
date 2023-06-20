@extends('layouts.dashboardPartner')
@section('content')
    <div class="pl-72 pt-32 flex flex-row">
        <div class="mr-20">
            <p class="font-semibold mb-2">Data Diri</p>
            <div class="p-4 border shadow-md rounded-md flex flex-row w-[590px] mb-6">
                <form class="flex flex-col mr-14">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nama Lengkap</p>
                        <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{Auth::user()->nama_lengkap}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Tanggal Lahir</p>
                        <input class="w-32 border rounded-md text-sm p-2 outline-slate-800" type="date" disabled value="{{Auth::user()->tanggal_lahir}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Jenis Kelamin</p>
                        <input class="w-32 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{Auth::user()->jenis_kelamin}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Alamat</p>
                        <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{Auth::user()->alamat}}">
                    </div>
                </form>
                <form class="flex flex-col">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Username</p>
                        <input class="w-60 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{Auth::user()->username}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Email</p>
                        <input class="w-60 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{Auth::user()->email}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nomor Telepon</p>
                        <input class="w-60 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{Auth::user()->nomor_telepon}}">
                    </div>
                </form>
            </div>
            <a class="bg-[#B2A4FF] p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-md" href="/profilePartner/edit">Edit Profil</a>
        </div>
        <div>
            <p class="font-semibold mb-2">Data Toko</p>
            <div class="p-4 border shadow-md rounded-md flex flex-row w-[290px]">
                <form action="flex flex-col">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nama Toko</p>
                        <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{$toko->nama_toko}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Alamat Toko</p>
                        <input class="w-64 border rounded-md text-sm p-2 outline-slate-800" disabled value="{{$toko->alamat_toko}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Deskripsi Suplai</p>
                        <textarea class="w-64 border rounded-md text-sm p-2 outline-slate-800" disabled>{{$toko->deskripsi_suplai}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection