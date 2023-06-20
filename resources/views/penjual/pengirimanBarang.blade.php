@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-36 flex flex-col">
        <div class="w-[1000px] h-[60vh] shadow-lg border">
            <div class="tab flex flex-row justify-evenly">
                <button class="tablinks duration-200 hover:bg-[#E68686] w-[250px] p-4" onclick="openCity(event, 'TB')" id="defaultOpen">Transaksi Berlangsung</button>
                <button class="tablinks duration-200 hover:bg-[#E68686] w-[250px] p-4" onclick="openCity(event, 'TS')">Transaksi Selesai</button>
                <button class="tablinks duration-200 hover:bg-[#E68686] w-[250px] p-4" onclick="openCity(event, 'TG')">Transaksi Gagal</button>
                <button class="tablinks duration-200 hover:bg-[#E68686] w-[250px] p-4" onclick="openCity(event, 'BP')">Biaya Pengiriman</button>
            </div>
            <div id="TB" class="tabcontent hidden flex-col">
                <div class="flex">
                    <div class="bg-[#E68686] text-center text-sm w-10 p-2">No</div>
                    <div class="bg-[#E68686] text-center text-sm w-36 p-2">Gambar</div>
                    <div class="bg-[#E68686] text-center text-sm w-32 p-2">Nama Barang</div>
                    {{-- <div class="bg-[#F2C4C4] text-center text-sm w-32 p-2">Nama Toko</div> --}}
                    {{-- <div class="bg-[#E68686] text-center text-sm w-32 p-2">Alamat</div> --}}
                    <div class="bg-[#E68686] text-center text-sm w-20 p-2">Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-24 p-2">Jumlah</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Total Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Pembayaran</div>
                    <div class="bg-[#E68686] text-center text-sm w-44 p-2">Status Transaksi</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Opsi</div>
                </div>
                <table class="table-fixed border text-sm overflow-y-scroll block h-[45vh]">
                    <tbody class="text-center">
                        @foreach ($transaksi as $no => $hasil)
                            <tr class="border-b-2">
                                <td class="w-10 bg-[#F2C4C4]">{{$no+1}}</td>
                                <td class="w-36"><img class="h-10 m-auto" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                                <td class="w-32">{{substr($hasil->barang['nama'],0,15)}}</td>
                                {{-- <td class="w-32">{{$hasil->penjual['nama_toko']}}</td> --}}
                                {{-- <td class="w-32">{{$hasil->alamat}}</td> --}}
                                <td class="w-20">Rp. {{$hasil->barang['harga']}}</td>
                                <td class="w-24">{{$hasil->jumlah}}</td>
                                <td class="w-28">Rp. {{$hasil->total_harga}}</td>
                                <td class="w-28">{{$hasil->metode_pembayaran}}</td>
                                <td class="w-44">{{$hasil->status_transaksi}}</td>
                                <td class="bg-[#F2C4C4] w-24">
                                    <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/transaksi/detail/'.$hasil->id)}}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="TS" class="tabcontent hidden flex-col">
                <div class="flex">
                    <div class="bg-[#E68686] text-center text-sm w-10 p-2">No</div>
                    <div class="bg-[#E68686] text-center text-sm w-36 p-2">Gambar</div>
                    <div class="bg-[#E68686] text-center text-sm w-32 p-2">Nama Barang</div>
                    {{-- <div class="bg-[#B2A4FF] text-center text-sm w-32 p-2">Nama Toko</div> --}}
                    {{-- <div class="bg-[#B2A4FF] text-center text-sm w-32 p-2">Alamat</div> --}}
                    <div class="bg-[#E68686] text-center text-sm w-20 p-2">Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-24 p-2">Jumlah</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Total Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Pembayaran</div>
                    <div class="bg-[#E68686] text-center text-sm w-44 p-2">Status Transaksi</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Opsi</div>
                </div>
                <table class="table-fixed border text-sm overflow-y-scroll block h-[45vh]">
                    <tbody class="text-center">
                        @foreach ($selesai as $no => $hasil)
                            <tr class="border-b-2">
                                <td class="w-10 bg-[#F2C4C4]">{{$no+1}}</td>
                                <td class="w-36"><img class="h-10 m-auto" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                                <td class="w-32">{{substr($hasil->barang['nama'],0,15)}}</td>
                                {{-- <td class="w-32">{{$hasil->penjual['nama_toko']}}</td> --}}
                                {{-- <td class="w-32">{{$hasil->alamat}}</td> --}}
                                <td class="w-20">Rp. {{$hasil->barang['harga']}}</td>
                                <td class="w-24">{{$hasil->jumlah}}</td>
                                <td class="w-28">Rp. {{$hasil->total_harga}}</td>
                                <td class="w-28">{{$hasil->metode_pembayaran}}</td>
                                <td class="w-44">{{$hasil->status_transaksi}}</td>
                                <td class="bg-[#F2C4C4] w-24">
                                    <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/transaksi/detail/'.$hasil->id)}}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="TG" class="tabcontent hidden flex-col">
                <div class="flex">
                    <div class="bg-[#E68686] text-center text-sm w-10 p-2">No</div>
                    <div class="bg-[#E68686] text-center text-sm w-36 p-2">Gambar</div>
                    <div class="bg-[#E68686] text-center text-sm w-32 p-2">Nama Barang</div>
                    {{-- <div class="bg-[#B2A4FF] text-center text-sm w-32 p-2">Nama Toko</div> --}}
                    {{-- <div class="bg-[#B2A4FF] text-center text-sm w-32 p-2">Alamat</div> --}}
                    <div class="bg-[#E68686] text-center text-sm w-20 p-2">Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-24 p-2">Jumlah</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Total Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Pembayaran</div>
                    <div class="bg-[#E68686] text-center text-sm w-44 p-2">Status Transaksi</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Opsi</div>
                </div>
                <table class="table-fixed border text-sm overflow-y-scroll block h-[45vh]">
                    <tbody class="text-center">
                        @foreach ($gagal as $no => $hasil)
                            <tr class="border-b-2">
                                <td class="w-10 bg-[#F2C4C4]">{{$no+1}}</td>
                                <td class="w-36"><img class="h-10 m-auto" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                                <td class="w-32">{{substr($hasil->barang['nama'],0,15)}}</td>
                                {{-- <td class="w-32">{{$hasil->penjual['nama_toko']}}</td> --}}
                                {{-- <td class="w-32">{{$hasil->alamat}}</td> --}}
                                <td class="w-20">Rp. {{$hasil->barang['harga']}}</td>
                                <td class="w-24">{{$hasil->jumlah}}</td>
                                <td class="w-28">Rp. {{$hasil->total_harga}}</td>
                                <td class="w-28">{{$hasil->metode_pembayaran}}</td>
                                <td class="w-44">{{$hasil->status_transaksi}}</td>
                                <td class="bg-[#F2C4C4] w-24">
                                    <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/transaksi/detail/'.$hasil->id)}}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="BP" class="tabcontent hidden flex-col items-center">
                <div class="flex">
                    <div class="bg-[#E68686] text-center text-sm w-10 p-2">No</div>
                    <div class="bg-[#E68686] text-center text-sm w-24 p-2">Jarak</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Harga</div>
                    <div class="bg-[#E68686] text-center text-sm w-28 p-2">Opsi</div>
                </div>
                <table class="table-fixed border text-sm overflow-y-scroll block h-[45vh]">
                    <tbody class="text-center">
                        @foreach ($biaya_pengiriman as $no => $biaya)
                            <tr class="border-b-2">
                                <td class="bg-[#F2C4C4] w-10">{{$no+1}}</td>
                                <td class="w-24">{{$biaya->jarak}} Km</td>
                                <td class="w-28">Rp. {{$biaya->harga}}</td>
                                <td class="bg-[#F2C4C4] w-24">
                                    <form action="{{url('/hapusBiaya/'.$biaya->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardPenjual/pengiriman/edit/'.$biaya->id)}}">Edit</a>
                                        <button class="text-[12px] bg-red-500 text-white p-1 rounded-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <a class="bg-[#E68686] p-2 text-white rounded-md hover:bg-[#F2C4C4]" href="/dashboardPenjual/pengiriman/tambahBiaya">Tambah Biaya Pengiriman</a>
        </div>
        <script>
            function openCity(evt, btnName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.add('hidden')
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove('bg-[#E68686]')
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(btnName).classList.add('flex');
            document.getElementById(btnName).classList.remove('hidden');
            evt.currentTarget.className += " bg-[#E68686]";
            }
        </script>
        <script>
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </div>
@endsection