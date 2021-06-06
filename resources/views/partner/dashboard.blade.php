<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 m-auto">
                <!-- 1 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                    <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
                        @if ($statusPartner->status_partner_id == '1')
                            <i class="fa fa-check-circle"></i>
                        @elseif ($statusPartner->status_partner_id == '2')
                            <i class="fa fa-clock-o"></i>
                        @elseif ($statusPartner->status_partner_id == '3')
                            <i class="fa fa-times-circle"></i>
                        @else
                            <i class="fa fa-question-circle"></i>
                        @endif
                    </div>
                    <div class="mt-8">
                        <p class="text-xl font-semibold my-2">Status Perusahaan</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <i class="fa fa-address-card"></i>
                            @if ($statusPartner->status_partner_id == '1')
                                <p>Tereverifikasi</p>
                            @elseif ($statusPartner->status_partner_id == '2')
                                <p>Sedang menunggu persetujuan</p>
                            @elseif ($statusPartner->status_partner_id == '3')
                                <p>Permohonan tidak disetujui</p>
                            @else
                                <p>Permohonan belum diverifikasi</p>
                            @endif
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <i class="fa fa-desktop"></i>
                            <p>{{$getPartnerProfile->company_name}}</p>
                        </div>
                        <div class="border-t-2"></div>
                        <div class="flex justify-between">
                            <a href="{{url('company-profile')}}" class="m-auto">
                                <button class="py-2 px-4 bg-pink-500 text-white font-semibold rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-opacity-75 m-auto mt-5">
                                    Lihat Detail
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
        
                <!-- 2 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                    <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 left-4 -top-6">
                        <i class="fa fa-coins"></i>
                    </div>
                    <div class="mt-8">
                        <p class="text-xl font-semibold my-2">Penjualan</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <i class="fa fa-dollar-sign"></i>
                            <p>Total Penjualan :</p>
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">@currency($getAmount)</span>
                        </div>
                        <div class="border-t-2 "></div>
                        <div class="flex justify-between">
                            <a href="{{url('sale')}}" class="m-auto">
                                <button class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 m-auto mt-5">
                                    Lihat Detail
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
        
                <!-- 3 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                    <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                        <i class="fa fa-chart-line"></i>
                    </div>
                    <div class="mt-8">
                        <p class="text-xl font-semibold my-2">Perkembangan</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <i class="fa fa-briefcase"></i>
                            <p>{{$getProgress}} Perkembangan</p> 
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <i class="fa fa-clock"></i>
                            <p>2 Bulan Terakhir</p> 
                        </div>
                        <div class="border-t-2 "></div>
                        <div class="flex justify-between">
                            <a href="{{url('progress')}}" class="m-auto">
                                <button class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 m-auto mt-5">
                                    Lihat Detail
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
        
                 <!-- 4 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                    <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
                        <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                    <div class="mt-8">
                        <p class="text-xl font-semibold my-2">Pengajuan Dana</p>
                        <div class="flex space-x-2 text-gray-400 text-sm">
                            <i class="fa fa-magic"></i>
                            <p>{{$getSubmission}} Total Pengajuan Dana</p> 
                        </div>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                            <i class="fa fa-gem"></i>
                            <p>@currency($submissionAmount) Dana Disetujui</p> 
                        </div>
                        <div class="border-t-2 "></div>
                        <div class="flex justify-between">
                            <a href="{{url('submission')}}" class="m-auto">
                                <button class="py-2 px-4 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 m-auto mt-5">
                                    Lihat Detail
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
