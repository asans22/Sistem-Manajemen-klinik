@extends('layouts.app')

@section('container')
    <!-- Isi konten halaman di sini -->
    <div class=" my-10 py-10 border-b-2 pl-10 border-slate-400 ">
        <h1 class=" font-bold text-3xl">Data Obat</h1>
    </div>

    <div class="box-border border-2 border-button hover:bg-[#1e939b] ml-10  inline-block mb-5 py-1 px-3  rounded-md text-base font-semibold bg-neon  text-blue hover:text-white hover:scale-105 active:scale-100 hover:duration-75">
        <p>Tambah</p>
    </div>
    
    <div class="pl-10">
        <table class="box-border bottom-1 text-center " >
            <thead class="font-semibold">
                <tr class="h-12 ">
                    <td class="border-2 border-black w-16">No</td>
                    <td class="border-2 border-black w-52">Nama</td>
                    <td class="border-2 border-black w-52">Jenis</td>
                    <td class="border-2 border-black w-52">Stok</td>
                    <td class="border-2 border-black w-52">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black ">
                        <button class="box-border border-2 flex flex-row w-16  px-2 rounded text-white border-button bg-navy mx-auto py-0.2 hover:scale-105 active:scale-100 hover:duration-75">
                            <svg width="15" height="15" viewBox="0 0 144 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M107.753 0L89.7943 17.9589L125.712 53.8766L143.671 35.9177L107.753 0ZM71.8355 35.9177L0 107.753V143.671H35.9177L107.753 71.8355L71.8355 35.9177Z" fill="white"/>
                                </svg>
                                
                            <p>edit</p>
                        </button>
                    </td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                <tr class="h-8">
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                    <td class="border-2 border-black"></td>
                </tr>
                
            </tbody>
        </table>
    </div>
@endsection


