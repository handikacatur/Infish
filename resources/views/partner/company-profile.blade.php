<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Usaha') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-3 mb-3">

                @if ($statusPartner->status_partner_id == '1')
                {{-- verified --}}
                <div class="bg-gray-100 border-green-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid rounded-3xl border-2 | flex justify-start | hover:bg-green-400 dark:hover:bg-green-600 hover:border-transparent | transition-colors duration-500">
                    {{-- <p class="ml-2 text-gray-900 dark:text-gray-300 font-semibold">Status Pengusaha</p> --}}
                    <p class="ml-2 text-black dark:text-gray-100 text-justify font-semibold italic"><i class="fa fa-check-circle"></i> Terverifikasi</p>
                </div>
                @elseif ($statusPartner->status_partner_id == '2')
                {{-- waiting --}}
                <div class="bg-gray-100 border-blue-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid rounded-3xl border-2 | flex justify-start | hover:bg-blue-400 dark:hover:bg-blue-600 hover:border-transparent | transition-colors duration-500">
                    {{-- <p class="ml-2 text-gray-900 dark:text-gray-300 font-semibold">Status Pengusaha</p> --}}
                    <p class="ml-2 text-black dark:text-gray-100 text-justify font-semibold italic"><i class="fa fa-clock"></i> Sedang menunggu persetujuan</p>
                </div>
                @elseif ($statusPartner->status_partner_id == '3')
                {{-- banned --}}
                <div class="bg-gray-100 border-red-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid rounded-3xl border-2 | flex justify-start | hover:bg-red-400 dark:hover:bg-red-600 hover:border-transparent | transition-colors duration-500">
                    {{-- <p class="ml-2 text-gray-900 dark:text-gray-300 font-semibold">Status Pengusaha</p> --}}
                    <p class="ml-2 text-black dark:text-gray-100 text-justify font-semibold italic"><i class="fa fa-times-circle"></i> Permohonan tidak disetujui</p>
                </div>
                @else
                {{-- not verified --}}
                <div class="bg-gray-100 border-yellow-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid rounded-3xl border-2 | flex justify-start | hover:bg-yellow-400 dark:hover:bg-yellow-600 hover:border-transparent | transition-colors duration-500">
                    {{-- <p class="ml-2 text-gray-900 dark:text-gray-300 font-semibold">Status Pengusaha</p> --}}
                    <p class="ml-2 text-black dark:text-gray-100 text-justify font-semibold italic"><i class="fa fa-info-circle"></i> Permohonan belum diverifikasi</p>
                </div>
                @endif

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 bg-white border-b border-gray-200 items-center">
                    <h3 class="font-bold text-gray-900 text-xl">Profil Pengusaha</h3>
                    <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                        <img class="w-full rounded-md" src="{{asset('images/upload/companyProfile')}}/{{$dataPartnerProfile->image}}" alt="company-cover" />

                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->company_name}}</b></td>
                                </tr>
                                <tr>
                                    <td>Pemilik</td>
                                    <td>:</td>
                                    <td><b>{{Auth::user()->name}}</b></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->address}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->phone_number}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon (Alternatif)</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->alternate_number}}</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Budidaya</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->cultivation}}</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Ikan</td>
                                    <td>:</td>
                                    <td>[get-Fish]</td>
                                </tr>
                                <tr>
                                    <td>Luas</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->wide}}</b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produksi</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->amount_of_production}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nilai Produksi</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->production_value}}</b></td>
                                </tr>
                                <tr>
                                    <td>NPWP</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->npwp}}</b></td>
                                </tr>
                                <tr>
                                    <td>SIUP</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->siup}}</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="text-center leading-relaxed">{{$dataPartnerProfile->description}}</p>
                        <span class="text-center">Dari <b>{{$dataPartnerProfile->company_name}}</b> Tim</span>

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
