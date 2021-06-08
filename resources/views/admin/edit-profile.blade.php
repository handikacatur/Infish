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
                        <a href="{{url('edit-profile-form-admin')}}">
                            <button class="p-4 rounded-full transition ease-in duration-200 focus:outline-none edited-button">
                                <i class="fa fa-pencil-alt" style="color: white;"></i>
                            </button>
                        </a>
                   </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-sm">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
