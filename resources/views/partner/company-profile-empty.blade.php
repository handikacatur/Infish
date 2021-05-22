<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4 my-3">
                <div class="bg-gray-100 border-yellow-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around | hover:bg-yellow-400 dark:hover:bg-yellow-600 hover:border-transparent | transition-colors duration-500">
                    
                    <div class="h-16 h-16 object-cover">
                        <i class="fa fa-info-circle object-cover" style="font-size: 400%;"></i>
                    </div>
                    <div class="flex flex-col justify-center">
                        <p class="text-gray-900 dark:text-gray-300 font-semibold">Status Pengusaha</p>
                        <p class="text-black dark:text-gray-100 text-justify font-semibold italic">Belum Terverifikasi</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 bg-white border-b border-gray-200 items-center">
                    <h3 class="font-bold text-gray-900 text-xl">Profil Pengusaha</h3>
                    <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Pemilik</td>
                                    <td>:</td>
                                    <td><b>{{Auth::user()->name}}</b></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon (Alternatif)</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Budidaya</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Ikan</td>
                                    <td>:</td>
                                    <td>[get-Fish]</td>
                                </tr>
                                <tr>
                                    <td>Luas</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produksi</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>Nilai Produksi</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>NPWP</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                                <tr>
                                    <td>SIUP</td>
                                    <td>:</td>
                                    <td><b>Kosong</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="text-center leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi asperiores corporis repudiandae, laborum repellat voluptatum distinctio sed aliquid aliquam rerum saepe cumque velit eveniet et nostrum quo! Placeat, accusamus maiores.</p>
                        <span class="text-center">Dari Tim</span>

                        <form action="{{url('company-profile/change')}}" method="POST">
                        @csrf
                            <x-button class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent w-full">
                                <i class="fa fa-pencil-alt"></i> {{ __('Ubah')}}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
