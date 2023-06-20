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
<body class="h-[100vh] overflow-x-hidden">
    <nav class="flex flex-row bg-[#F2C4C4] py-4 px-6 items-center rounded-b-[20px] justify-between fixed w-[100vw] shadow-lg">
        <a href="/">
            <img class="w-44" src="{{asset('assets/logo.png')}}" alt="logo milky way">
        </a>
        {{--<div class="">
            <a class="hover:underline mx-5" href="">Beranda</a>
            <a class="hover:underline mx-5" href="">Profile</a>
            <a class="hover:underline mx-5" href="/home">Produk</a>
            <a class="hover:underline mx-5" href="">Partner Kami</a>
        </div> --}} 


        </div>
    </nav>
    @if (session()->has('message'))
        <div class="bg-green-500 p-2 w-[100vw] absolute mt-[94px] text-center text-white">
            {{session('message')}}
        </div>
    @endif
    {{--<style>
        body {
            background-image: url("/assets/bunga.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>--}}
    <div class="flex h-[100%] justify-center items-center" style="background-image: url('/assets/bunga.jpg'); background-size:cover; ">  
        @yield('content')
    </div>
    @yield('modal')
</body>
</html>