<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mitra Perikanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="flex mb-6">
                    <div class="grid grid-cols-2 m-auto px-3 mb-6 md:mb-0">
                        @foreach ($listData as $itemData)
                        <div class="max-w-3xl m-3 bg-white p-5 rounded-md tracking-wide shadow-lg">
                            <div id="header" class="flex"> 
                                <img alt="mountain" class="w-56 rounded-md border-2 border-gray-300 object-cover" src="{{asset('images/upload/companyProfile/')}}/{{$itemData->image}}" />
                                <div id="body" class="flex flex-col ml-5">
                                    <h4 id="name" class="text-xl font-semibold mb-2">{{Str::limit($itemData->cultivation, $limit=20, $end="...")}}</h4>
                                    <p id="job" class="text-gray-800 mt-2">{{Str::limit($itemData->cultivation, $limit=27, $end="...")}}</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Jenis Ikan</td>
                                                <td>:</td>
                                                <td>[get-Fish]</td>
                                            </tr>
                                            <tr>
                                                <td>ROI</td>
                                                <td>:</td>
                                                <td>{{$itemData->roi}}</td>
                                            </tr>
                                            <tr>
                                                <td>LOT</td>
                                                <td>:</td>
                                                <td>{{$itemData->lot}}</td>
                                            </tr>
                                            <tr>
                                                <td>Harga LOT</td>
                                                <td>:</td>
                                                <td>{{$itemData->lot_price}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="flex mt-5">
                                    <img alt="avatar" class="w-6 rounded-full border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                                    <p class="ml-3">{{$itemData->company_name}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-5">
                            <div class="-mx-3 my-3 md:flex">
                                <form action="{{url('/detail-investation')}}/{{$itemData->id}}/detail" method="POST" class="m-auto">
                                    @csrf
                                    <div class="md:w-full px-3">
                                        <x-button class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent w-full">
                                            <i class="fa fa-eye"></i> {{ __('Lihat Mitra')}}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
