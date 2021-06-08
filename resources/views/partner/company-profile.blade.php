<x-app-layout>
    <x-slot name="extraCSS">
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <style>
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568; 			
                padding-left: 1rem; 		
                padding-right: 1rem; 		
                padding-top: .5rem; 		
                padding-bottom: .5rem;
                line-height: 1.25;
                border-width: 2px;
                border-radius: .25rem; 		
                border-color: #edf2f7;
                background-color: #edf2f7;
            }

            table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button		{
                font-weight: 700;
                border-radius: .25rem;
                border: 1px solid transparent;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
                color: #fff !important;
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
                font-weight: 700;
                border-radius: .25rem;
                background: #1b4b94 !important;
                border: 1px solid transparent;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
                color: #fff !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
                font-weight: 700;
                border-radius: .25rem;
                background: #1b4b94 !important;
                border: 1px solid transparent;
            }
            
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }
            
            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #1b4b94 !important;
            }
            
        </style>
    </x-slot>
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
                                    <td><b>
                                        @foreach ($getFishPartner as $itemFish)
                                            {{$itemFish->name}},
                                        @endforeach
                                    </b></td>
                                </tr>
                                <tr>
                                    <td>Luas</td>
                                    <td>:</td>
                                    <td><b>{{$dataPartnerProfile->wide}} m<sup>3</sup></b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produksi</td>
                                    <td>:</td>
                                    <td><b>{{$getWeight}} ton</b></td>
                                </tr>
                                <tr>
                                    <td>Nilai Produksi</td>
                                    <td>:</td>
                                    <td><b>
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            @currency($getAmount)
                                        </span>
                                    </b></td>
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

            <div class="flex flex-col mt-5 bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                <div class="grid grid-cols-2">
                    <div class="text-left">
                        <span class="font-semibold text-xl text-gray-800 leading-tight inline-block align-middle">
                            {{ __('Data Ikan') }}
                        </span>
                    </div>
                    <div class="text-right">
                        <button @click="openModal" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah Jenis Ikan') }}
                        </button>
                    </div>
                </div>
                <table id="thisTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Jenis Ikan</th>
                            <th data-priority="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getFishPartner as $itemFishPartner)  
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$itemFishPartner->name}}</td>
                            <td class="text-center">
                                <form action="{{url('/company-profile')}}/{{$itemFishPartner->id}}/dropFish" method="POST" class="m-auto">
                                    @method('delete')
                                    @csrf
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm('Hapus Data ?')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
        <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Tambah Data Ikan</p>
                <!-- Modal description -->            
                <form action="{{url('company-profile/save-fish')}}" method="POST">
                    @csrf
                    <div class="mt-3 p-3">
                        <div class="mt-3">
                            <x-label for="fish_partner" :value="__('Jenis Ikan :')"/>
                            <x-input-select name="fish_partner" class="block mt-1 w-full p-2 border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($getPureFish as $itemFish)
                                <option value="{{$itemFish->id}}">{{$itemFish->name}}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                    </div>
                    <div class="flex justify-end pt-2 px-3">
                        <x-custom-button class="px-4 bg mr-2">
                            <i class="fa fa-save"></i>&nbsp; {{ __('Simpan') }}
                        </x-custom-button>
                        <button type="button" @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            
            var table = $('#thisTable').DataTable( {
                    responsive: true
                } )
                .columns.adjust()
                .responsive.recalc();
        } );
    </script>
</x-app-layout>
