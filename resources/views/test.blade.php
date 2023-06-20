<div class="pt-28 flex">
    <form class="flex flex-row mx-auto" action="{{url('//'.)}}" method="post" onsubmit="return confirm('Note: Pastikan nominal transfer sudah benar')" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$transaksi->id}}" name="id">
        <div class="bg-slate-600 w-[300px] h-[300px] rounded-lg m-4 drop-shadow-lg">
            <img class="object-cover h-[300px] w-[300px] rounded-lg" src="{{asset('barang/'.$transaksi->barang['gambar'])}}" alt="">
        </div>
        <div class="w-[400px]">
            <p class="font-semibold mb-2">Detail Pesanan</p>
            <div class="mr-16 border rounded-md p-4 shadow">
                <div class="mb-2">
                    <p class="text-sm mb-1">Nama Pembeli</p>
                    <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->pembeli['nama_lengkap']}}" disabled name="nama_pembeli">
                </div>
            </div>
        </div>
        <button class="bg-[#B2A4FF] mt-2 mr-4 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" type="submit">Bayar</button>
        <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/transaksi">Kembali</a>
    </form>
</div>


{{-- TABLE TEMPLATE --}}

<div class="pt-32 flex flex-col justify-center">
    <table class="table-fixed border text-sm overflow-y-scroll block h-[400px]">
        <thead>
            <tr class="fixed">
                <th class="bg-slate-300 p-2">No</th>
                <th class="bg-slate-300 w-20 p-2">Gambar</th>
                <th class="bg-slate-200 p-2">Nama Barang</th>
                <th class="bg-slate-200 p-2">Nama Toko</th>
                <th class="bg-slate-200 p-2">Alamat</th>
                <th class="bg-slate-200 p-2">Harga</th>
                <th class="bg-slate-200 p-2">Jumlah</th>
                <th class="bg-slate-200 p-2">Total Harga</th>
                <th class="bg-slate-200 p-2">Metode Pembayaran</th>
                <th class="bg-slate-200 p-2">Status Transaksi</th>
                <th class="bg-slate-200 p-2">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($transaksi as $no => $hasil)
                <tr>
                    <td class="w-10">{{$no+1}}</td>
                    <td><img class="h-20" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                    <td>{{$hasil->barang['nama']}}</td>
                    <td>{{$hasil->penjual['nama_toko']}}</td>
                    <td>{{$hasil->alamat}}</td>
                    <td>Rp. {{$hasil->barang['harga']}}</td>
                    <td>{{$hasil->jumlah}}</td>
                    <td>Rp. {{$hasil->total_harga}}</td>
                    <td>{{$hasil->metode_pembayaran}}</td>
                    <td>{{$hasil->status_transaksi}}</td>
                    <td class="bg-slate-200">
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


{{-- FORM --}}
p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]

@error('nama')
    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
@enderror

Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo sint, voluptatum dolorem quia aperiam ut rerum repudiandae cupiditate mollitia, sequi velit ea tenetur provident voluptate itaque cumque explicabo laborum ab. Fuga, ab quibusdam? Exercitationem, rerum delectus! Voluptatibus assumenda praesentium rem culpa iusto ut doloremque corporis, fugit dolores facere nisi, provident, in dignissimos. Placeat eos totam esse magnam, nisi officia corporis soluta? Aliquid, ut soluta quisquam neque at velit vitae vel. Deleniti dicta reiciendis quia architecto nobis optio totam commodi distinctio unde ut, vero atque minus minima maiores voluptatem maxime reprehenderit? Esse explicabo cumque ratione, alias ipsum dolore enim in tempore!