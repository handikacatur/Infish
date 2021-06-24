<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mitra Perikanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="flex flex-wrap mb-6 md:items-center">
                        @foreach ($listData as $itemData)
                        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-3 flex-shrink-1">
                            <img class="w-full min-h-10 h-28 object-cover" src="{{asset('images/upload/companyProfile/')}}/{{$itemData->image}}" alt="{{$itemData->company_name}}">
                            <div class="px-6 py-4">
                              <div class="font-bold text-xl mb-2">{{Str::limit($itemData->cultivation, $limit=20, $end="...")}}</div>
                              <p class="text-grey-darker text-base text-center">{{$itemData->company_name}}</p>
                              <table class="text-grey-darker text-base">
                                    <tbody>
                                        <tr>
                                            <td>Jenis Ikan</td>
                                            <td>:</td>
                                            <td>
                                                @foreach ($listDataFish as $itemDataFish)
                                                    @if ($itemDataFish->partner_id == $itemData->id)
                                                        {{$itemDataFish->name}},
                                                    @endif
                                                @endforeach
                                            </td>
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
                            </div>
                            <div class="px-6 py-4">                                  
                                <form action="{{url('/detail-investation')}}/{{$itemData->id}}/detail" method="POST" class="m-auto">
                                    @csrf
                                    <div class="md:w-full inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">
                                        <x-button class="px-5 py-2 bg-gray-900 rounded-md text-white text-sm focus:border-transparent w-full">
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('depositSuccess'))
        <script>
            swal("Berhasil", "{!! Session::get('depositSuccess') !!}", "success",{
                button: "OK",
            })
        </script>
    @endif
    @if (Session::has('depositFailed'))
        <script>
            swal("Gagal", "{!! Session::get('depositFailed') !!}", "error",{
                button: "OK",
            })
        </script>
    @endif
</x-app-layout>
