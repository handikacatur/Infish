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

        <div class="flex flex-col flex-wrap sm:flex-row mt-5">
            <div class="w-full sm:w-1/2 xl:w-1/3">
                <div class="mb-4">
                    <div class="shadow-md rounded-md p-4 bg-white dark:bg-gray-700 w-full">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <span class="rounded-xl relative p-2">
                                    <img class="w-full rounded-md" src="{{asset('images/upload/companyProfile')}}/{{$dataPartnerProfile->image}}" alt="company-cover" />
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center mb-4">
                            <span class="px-2 py-1 font-semibold text-md">{{$dataPartnerProfile->company_name}}</span>
                            @if ($statusPartner->status_partner_id == '1')
                                {{-- verified --}}
                                <span class="px-2 py-1 font-semibold text-sm rounded-md text-green-500 bg-green-200">Terverifikasi</span>
                            @elseif ($statusPartner->status_partner_id == '2')
                                {{-- waiting --}}
                                <span class="px-2 py-1 font-semibold text-sm rounded-md text-blue-500 bg-blue-200">Sedang menunggu persetujuan</span>
                            @elseif ($statusPartner->status_partner_id == '3')
                                {{-- banned --}}
                                <span class="px-2 py-1 font-semibold text-sm rounded-md text-gray-500 bg-gray-200">Permohonan tidak disetujui</span>
                            @else
                                {{-- not verified --}}
                                <span class="px-2 py-1 font-semibold text-sm rounded-md text-yellow-500 bg-yellow-200">Permohonan belum diverifikasi</span>
                            @endif
                        </div>
                        <hr class="w-full mb-3">
                        <div class="flex flex-col px-2">
                            <div class="font-medium mb-2">Informasi Kontak</div>
                            <div>
                                <span class="text-sm text-gray-500">Alamat:</span> 
                                 <p class="text-md">{{$dataPartnerProfile->address}}</p>
                             </div>
                            <div>
                               <span class="text-sm text-gray-500">Nomor telepon:</span> 
                                <p class="text-md">{{$dataPartnerProfile->phone_number}}</p>
                            </div>
                            <div>
                               <span class="text-sm text-gray-500">Nomor telepon Alternatif:</span> 
                                <p class="text-md">{{$dataPartnerProfile->alternate_number}}</p>
                            </div>
                            <!-- <div>
                               <span class="text-sm text-gray-500">Media sosial:</span>

                            </div> -->
                            <hr class="w-full my-2">
                            <div>
                                <div class="font-medium mb-2">Deskripsi Perusahaan</div> 
                                <p class="text-md">{{$dataPartnerProfile->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 xl:w-2/3">
                <div class="mb-4 mx-0 sm:ml-4 xl:mr-4">
                    <div class="shadow-md rounded-md bg-white dark:bg-gray-700 w-full">
                        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
                            <div class="flex flex-col">
                                <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">
                                    Luas
                                </p>
                                <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$dataPartnerProfile->wide}} m<sup>3<sup></p>
                            </div>
                            <div>
                                <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">
                                    Jumlah Produksi
                                </p>
                                <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$getWeight}} ton</p>
                            </div>
                            <div>
                                <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">
                                    Harga Produksi
                                </p>
                                <p class="font-bold text-md pb-4 text-green-400 dark:text-white text-center">@currency($getAmount),00-</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="mb-4 sm:ml-4 xl:mr-4">
                    <div class="shadow-md rounded-md bg-white dark:bg-gray-700 w-full">
                        <div class="py-8 px-4 text-gray-800 flex items-center justify-center border-b-2 border-gray-100">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pemilik</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td> {{Auth::user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Budidaya</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td> {{$dataPartnerProfile->cultivation}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Ikan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>
                                            @foreach ($getFishPartner as $itemFish)
                                                {{$itemFish->name}},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NPWP</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td> {{$dataPartnerProfile->npwp}}</td>
                                    </tr>
                                    <tr>
                                        <td>SIUP</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td> {{$dataPartnerProfile->siup}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="mb-4 sm:ml-4 xl:mr-4">
                    <div class="shadow-md rounded-md bg-white dark:bg-gray-700w-full">
                        <div class="flex flex-col py-6 px-4 text-gray-800 flex items-center justify-center">
                            <p class="font-semibold text-md mb-4">Persentase Saham Terbeli</p>
                            <p class="font-semibold text-sm mb-4">{{100-($newGetPartner->lot/$newGetPartner->lot_first*100)}}%</p>
                            <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                <div class="h-full text-center text-xs text-white bg-blue-400 rounded-full" style="width: {{100-($newGetPartner->lot/$newGetPartner->lot_first*100)}}%">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
                            <div class="flex flex-col">
                                <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">Sisa Lembar Saham</p>
                                <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$newGetPartner->lot*100}} Lembar</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">Harga per Lembar</p>
                                <p class="font-bold text-md pb-4 text-green-400 dark:text-white text-center">@currency($newGetPartner->lot_price)</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">Return of Interest</p>
                                <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$newGetPartner->roi}}%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 sm:ml-4 xl:mr-4">
                    <div class="shadow-md rounded-md bg-white dark:bg-gray-700w-full">
                        <form action="{{url('company-profile/change')}}" method="POST">
                        @csrf
                            <x-button class="px-24 py-4 bg-blue-400 rounded-md text-white text-sm font-bold focus:border-transparent hover:bg-blue-500 w-full">
                                 {{ __('ubah profil')}} <i class="fa fa-pencil-alt"></i>
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="mb-4 mx-0 sm:ml-4 xl:mr-4">
                    <div class="shadow-md rounded-md bg-white dark:bg-gray-700 w-full">
                        <div class="flex flex-col mt-2 bg-white px-8 py-6 rounded-xl space-y-5 items-left">
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
                                                <button class="m-auto flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm('Hapus Data ?')">
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
            </div>

            <div class="w-full">
                <div class="mb-4 mx-0">
                    <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">
                        <div class="flex flex-col mt-2 bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                            <div class="grid grid-cols-2">
                                <div class="text-left">
                                    <span class="font-semibold text-xl text-gray-800 leading-tight inline-block align-middle">
                                        {{ __('Data Gambar Partner') }}
                                    </span>
                                </div>
                            </div>
                            <table id="thisTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                    <tr>
                                        <th data-priority="1">No</th>
                                        <th data-priority="2">Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getPartnerImages as $itemImagePartner)  
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center"><center>
                                            <img class="w-52 my-1 rounded-md" src="{{asset('images/upload/productPartner')}}/{{$itemImagePartner->product_image}}" alt="company-cover" />
                                        </center></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '.splide' ).mount();
        } );
        new Splide( '.splide' ).mount();
    </script>
</x-app-layout>
