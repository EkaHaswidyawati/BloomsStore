@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-32 flex flex-row">
        <div class="mr-20">
            <p class="font-semibold mb-2">Data Diri</p>
            <div class="p-4 border shadow-md rounded-md flex flex-row w-[590px] mb-6">
                <form class="flex flex-col mr-14">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nama Lengkap</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->nama_lengkap}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Tanggal Lahir</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="date" disabled value="{{Auth::user()->tanggal_lahir}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Jenis Kelamin</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->jenis_kelamin}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Alamat</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->alamat}}">
                    </div>
                </form>
                <form class="flex flex-col">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Username</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->username}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Email</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->email}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nomor Telepon</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{Auth::user()->nomor_telepon}}">
                    </div>
                </form>
            </div>
            <a class="bg-[#E68686] p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-md" href="/profilePenjual/edit">Edit Profil</a>
        </div>
        <div>
            <p class="font-semibold mb-2">Data Toko</p>
            <div class="p-4 border shadow-md rounded-md flex flex-row w-[290px]">
                <form action="flex flex-col">
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Nama Toko</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{$toko->nama_toko}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Alamat Toko</p>
                        <input class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled value="{{$toko->alamat_toko}}">
                    </div>
                    <div>
                        <p class="text-sm font-semibold mt-2 mb-1">Deskripsi Toko</p>
                        <textarea class="bg-white p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" disabled>{{$toko->deskripsi_toko}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection