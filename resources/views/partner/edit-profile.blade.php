<x-app-layout>
    <x-slot name="extraCSS">
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <style>
            .edited-button {
                background-color: #6617cb;
                background-image: linear-gradient(315deg, #6617cb 0%, #cb218e 74%);
                box-shadow: 0 0 0 0 #ec008c, 0.2rem 0.2rem 30px #6617cb;
            }
            .edited-button:hover {
                box-shadow: 0 0 0 0 #ec008c, 0.2rem 0.2rem 60px #6617cb;
            }
        </style>
    </x-slot>

    @if (session('failed_control'))   
    <div class="mt-10 alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
        <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
            <span class="text-red-500">
                <svg fill="currentColor"
                     viewBox="0 0 20 20"
                     class="h-6 w-6">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        <div class="alert-content ml-4">
            <div class="alert-title font-semibold text-lg text-red-800">
                Terjadi Kesalahan
            </div>
            <div class="alert-description text-sm text-red-600">
                {{session('failed_control')}}
            </div>
        </div>
    </div>
    @endif

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto rounded-lg overflow-hidden shadow-lg my-2 bg-white">
                <div class="relative mb-6">
                   <img class="w-full h-72 object-cover" src="{{asset('images/base/particle-bg.png')}}" alt="Profile picture" />
                   <div class="text-center absolute w-full" style="bottom: -30px">
                        <div class="mb-10">
                            <p class="text-white tracking-wide uppercase text-lg font-bold">{{\Auth::user()->name}}</p>
                            <p class="text-gray-400 text-sm">{{\Auth::user()->email}}</p>
                        </div>
                        <a href="{{url('edit-profile-form')}}">
                            <button class="p-4 rounded-full transition ease-in duration-200 focus:outline-none edited-button">
                                <i class="fa fa-pencil-alt" style="color: white;"></i>
                            </button>
                        </a>
                   </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    
                    <div class="text-gray-700">
                        <div class="m-auto grid md:grid-cols-2 text-sm my-10">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nama Lengkap</div>
                                <div class="px-4 py-2">{{\Auth::user()->name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Telepon</div>
                                <div class="px-4 py-2">{{\Auth::user()->phone}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">{{\Auth::user()->email}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Bergabung Sejak</div>
                                <div class="px-4 py-2">{{\Auth::user()->created_at}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nama Perusahaan</div>
                                <div class="px-4 py-2">{{$getPartnerProfile->company_name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Alamat</div>
                                <div class="px-4 py-2">{{$getPartnerProfile->address}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Jenis Budidaya</div>
                                <div class="px-4 py-2">{{$getPartnerProfile->cultivation}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Status Perusahaan</div>
                                <div class="px-4 py-2">
                                    @if ($getPartnerStatus->status_partner_id == '1')
                                    <span class="px-5 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Terverivikasi
                                    </span>
                                    @elseif ($getPartnerStatus->status_partner_id == '2')
                                    <span class="px-5 py-2 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                        Sedang Menunggu Persetujuan
                                    </span>
                                    @elseif ($getPartnerStatus->status_partner_id == '3')
                                    <span class="px-5 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        Permohonan Tidak Disetujui
                                    </span>
                                    @else
                                    <span class="px-5 py-2 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                        Permohonan Belum Diverifikasi
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('profileSuccess'))
        <script>
            swal("Berhasil", "{!! Session::get('profileSuccess') !!}", "success",{
                button: "OK",
            })
        </script>
    @endif
    @if (Session::has('profileFailed'))
        <script>
            swal("Gagal", "{!! Session::get('profileFailed') !!}", "error",{
                button: "OK",
            })
        </script>
    @endif
</x-app-layout>
