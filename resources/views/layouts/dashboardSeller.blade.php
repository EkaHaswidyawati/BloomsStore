<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$title}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="">
    <nav class="z-[1] flex flex-row items-center bg-[#F2C4C4] py-8 pr-5 place-content-end rounded-b-[10px] shadow-lg fixed w-[100vw]">
        <p class="right-5 mx-4">{{'Halo, '.$user = Auth::user()->nama_lengkap;}}</p>
        <div class="action">
            <div class="profile" onclick="showMenu()">
                <img class="w-[40px] mx-2" src="{{asset('/assets/profile.png')}}" alt="Profile">
            </div>
            <div id="profileMenu" class="menu hidden absolute bg-white right-7 p-2 rounded-md mt-2 drop-shadow-lg">
                <ul class="flex flex-col text-sm">
                    <li class="my-1 hover:font-semibold"><a href="/profilePenjual">Profile</a></li>
                    <hr>
                    <li class="my-1 hover:font-semibold"><a href="/resetPasswordPenjual">Reset Password</a></li>
                    <hr>
                    <li class="my-1 hover:font-semibold"><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @if (session()->has('message'))
        <div class="bg-green-500 p-2 w-[100vw] absolute mt-[94px] text-center text-white">
            {{session('message')}}
        </div>
    @endif

    <div class="z-[2] fixed bg-[#E68686] h-[100vh] w-[250px] flex flex-col items-center">
        <a class="bg-[#F2C4C4] rounded-lg py-4 px-14 mt-5 drop-shadow-lg font-bold" href="/dashboardPenjual">Dashboard</a>
        <ul class="">
            <li class="my-5">
                <a class="hover:bg-[#F2C4C4] duration-200 py-4 text-start pl-14 w-[210px] block rounded-lg drop-shadow-lg" href="/dashboardPenjual/barang">Barang</a>
            </li>
            <li class="my-5">
                <a class="hover:bg-[#F2C4C4] duration-200 py-4 text-start pl-14 w-[210px] block rounded-lg drop-shadow-lg" href="/dashboardPenjual/pengiriman">Pengiriman</a>
            </li>
            <li class="my-5">
                <a class="hover:bg-[#F2C4C4] duration-200 py-4 text-start pl-14 w-[210px] block rounded-lg drop-shadow-lg" href="/dashboardPenjual/pencatatan">Pencatatan</a>
            </li>
            <li class="my-5">
                <a class="hover:bg-[#F2C4C4] duration-200 py-4 text-start pl-14 w-[210px] block rounded-lg drop-shadow-lg" href="/dashboardPenjual/penarikan">Penarikan</a>
            </li>
            <li class="my-5">
                <a class="hover:bg-[#F2C4C4] duration-200 py-4 text-start pl-14 w-[210px] block rounded-lg drop-shadow-lg" href="/dashboardPenjual/riwayat">Riwayat</a>
            </li>
        </ul>
    </div>

    <div class="h-[100vh]">
        @yield('content')
    </div>

    <script>
        function showMenu(){
            var popup = document.querySelector("#profileMenu")
            popup.classList.toggle('flex')
            popup.classList.toggle('hidden')
        }
    </script>
</body>
</html>