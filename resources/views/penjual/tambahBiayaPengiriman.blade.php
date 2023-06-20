@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-36">
        <p class="mb-4 font-semibold">Tambah Biaya Pengiriman</p>
        <form action="/tambahBiayaPengiriman" method="post">
            @csrf
            <div class="flex flex-col mb-2">
                <p class="mb-1">Jarak</p>
                <div class="flex flex-row">
                    <input class="p-2 drop-shadow-md w-28 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" min="0" type="number" placeholder="Jarak Awal" name="jarak_awal">
                    <p class="mx-4">_</p>
                    <input class="p-2 drop-shadow-md w-28 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" min="1" type="number" placeholder="Jarak Akhir" name="jarak_akhir">
                </div>
            </div>
            <div class="mb-2">
                <p class="mb-1">Harga</p>
                <input class="p-2 drop-shadow-md w-36 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" min="0" type="number" placeholder="Ongkir" name="harga">
            </div>
            <div>
                <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" type="submit">Tambah</button>
                <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardPenjual/pengiriman">Batal</a>
            </div>
        </form>
    </div>
@endsection