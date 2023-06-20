@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-32 mb-4">
        <a class="bg-[#E68686] p-2 mr-2 text-white rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" href="/dashboardPenjual/pencatatan/tambah">Tambah</a>
        <button class="bg-[#E68686] p-2 mr-2 text-white rounded-md hover:bg-[#F2C4C4] duration-200 drop-shadow-lg" onclick="showChart()">Grafik</button>
    </div>
    <div id="tabel" class="pl-72 flex flex-col justify-center">
        <div class="flex">
            <div class="bg-[#E68686] text-center text-sm p-2 w-10">No</div>
            <div class="bg-[#E68686] text-center text-sm p-2 w-36">Gambar</div>
            <div class="bg-[#E68686] text-center text-sm p-2 w-44">Nama Barang</div>
            <div class="bg-[#E68686] text-center text-sm p-2 w-16">Terjual</div>
            <div class="bg-[#E68686] text-center text-sm p-2 w-28">Penghasilan</div>
            <div class="bg-[#E68686] text-center text-sm p-2 w-28">Tanggal</div>
            <div class="bg-[#E68686] text-center text-sm p-2 w-24">Opsi</div>
        </div>
        <table class="table-fixed border text-sm overflow-y-scroll block w-[765px] h-[60vh]">
            {{-- <thead>
                <tr class="fixed">
                    <th class="bg-slate-200 p-2">No</th>
                    <th class="bg-slate-200 w-20 p-2">Gambar</th>
                    <th class="bg-slate-200 p-2">Nama Barang</th>
                    <th class="bg-slate-200 p-2">Terjual</th>
                    <th class="bg-slate-200 p-2">Penghasilan</th>
                    <th class="bg-slate-200 p-2">Tanggal</th>
                    <th class="bg-slate-200 p-2">Opsi</th>
                </tr>
            </thead> --}}
            <tbody class="text-center">
                @foreach ($catatan as $no => $hasil)
                    <tr class="border-b-2">
                        <td class="bg-[#F2C4C4] w-10">{{$no+1}}</td>
                        <td class="w-36"><img class="h-10 inline-block m-auto" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                        <td class="w-44">{{substr($hasil->barang['nama'],0,15)}}</td>
                        <td class="w-16">{{$hasil->stok_terjual}}</td>
                        <td class="w-28">Rp. {{$hasil->penghasilan}}</td>
                        <td class="w-28">{{$hasil->tanggal}}</td>
                        <td class="bg-s[#F2C4C4] w-24">
                            <form class="flex" action="{{'/hapusCatatan/'.$hasil->id}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus catatan ini?')">
                                @csrf
                                <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/pencatatan/edit/'.$hasil->id)}}">Edit</a>
                                <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="grafik" class="hidden ml-72 h-[70%] w-[65%] border rounded-md shadow">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        const ctx = document.getElementById('myChart');
        const data = {{Js::from($data)}};
        const label = {{Js::from($label)}};

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: label,
            datasets: [{
                label: 'Penghasilan',
                data: data,
                borderWidth: 1,
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
    <script>
        function showChart(){
            var chart = document.querySelector("#grafik")
            chart.classList.toggle('flex')
            chart.classList.toggle('hidden')
            var table = document.querySelector("#tabel")
            table.classList.toggle('flex')
            table.classList.toggle('hidden')
        }
    </script>
@endsection