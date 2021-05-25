<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 bg-white border-b border-gray-200 items-center">
                    <h3 class="font-bold text-gray-900 text-xl">Profil Mitra</h3>
                    <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                        <img class="w-full rounded-md" src="{{asset('images/upload/companyProfile')}}/{{$getPartner->image}}" alt="company-cover" />
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->company_name}}</b></td>
                                </tr>
                                <tr>
                                    <td>Pemilik</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->name}}</b></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->address}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->phone_number}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon (Alternatif)</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->alternate_number}}</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Budidaya</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->cultivation}}</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Ikan</td>
                                    <td>:</td>
                                    <td><b>
                                        @foreach ($getFish as $itemFish)
                                        {{$itemFish->name}},
                                        @endforeach
                                    </b></td>
                                </tr>
                                <tr>
                                    <td>Luas</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->wide}} Hektar</b></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produksi</td>
                                    <td>:</td>
                                    <td><b>Rp.{{$getPartner->amount_of_production}}</b></td>
                                </tr>
                                <tr>
                                    <td>Nilai Produksi</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->production_value}}</b></td>
                                </tr>
                                <tr>
                                    <td>NPWP</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->npwp}}</b></td>
                                </tr>
                                <tr>
                                    <td>SIUP</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->siup}}</b></td>
                                </tr>
                                <tr>
                                    <td>ROI</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->roi}}%</b></td>
                                </tr>
                                <tr>
                                    <td>Harga Slot</td>
                                    <td>:</td>
                                    <td><b>Rp.{{$getPartner->lot_price}} / Slot</b></td>
                                </tr>
                                <tr>
                                    <td>Sisa Slot</td>
                                    <td>:</td>
                                    <td><b>{{$getPartner->lot}} slot</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="text-center leading-relaxed"><td><b>{{$getPartner->description}}</p>

                        <div class="-mx-3 my-3 md:flex">
                            <form action="{{url('/invest')}}/{{$getPartner->id}}/check" method="POST" class="m-auto">
                                @csrf
                                <div class="md:w-full px-3">
                                    <x-button class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent w-full">
                                        <i class="fa fa-coins"></i> {{ __('Invest')}}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
