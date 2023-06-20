@extends('layouts.buyer')
@section('content')
    <div class="flex justify-center pt-36">
        <div class="p-4 border shadow-md rounded-md">
            <p class="mb-4 font-semibold">Tambah Alamat</p>
            <form action="/alamat/tambah/proses" method="post">
                @csrf
                <div class="mb-2">
                    <p class="mb-1">Alamat</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Jl. xxx xxx" name="alamat">
                </div>
                <div>
                    <button class="bg-[#E68686] mt-2 mr-4 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" type="submit">Tambah</button>
                    <a class="bg-[#E68686] mt-2 p-2 rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/alamat">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection