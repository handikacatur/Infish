<x-app-layout>
    <div class="flex flex-col gap-8 flex-wrap sm:flex-row mt-5">
        <div class="w-full sm:w-1/2 xl:w-1/3">
            <div class="mb-4 w-96 m-auto">
                <div class="w-full shadow-md rounded-md p-4 bg-white dark:bg-gray-700">
                    <div class="flex items-center justify-between mb-2">
                            <div class="owl-carousel owl-theme">
                                <div class="w-full">
                                    <img class="w-full rounded-md object-contain" src="{{asset('images/upload/companyProfile')}}/{{$getPartner->image}}" alt="company-cover" />
                                </div>
                                @foreach ($partnerImages as $itemImagePartner)
                                <div class="w-full">
                                    <img class="w-full rounded-md object-contain" src="{{asset('images/upload/productPartner')}}/{{$itemImagePartner->product_image}}" alt="company-cover" />
                                </div>
                                @endforeach
                            </div>
                    </div>
                    <hr class="w-full mb-3">
                    <div class="flex flex-col px-2">
                        <div class="font-medium mb-2">Informasi Kontak</div>
                        <div>
                            <span class="text-sm text-gray-500">Alamat:</span> 
                                <p class="text-md">{{$getPartner->address}}</p>
                            </div>
                        <div>
                            <span class="text-sm text-gray-500">Nomor telepon:</span> 
                            <p class="text-md">{{$getPartner->phone_number}}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Nomor telepon Alternatif:</span> 
                            <p class="text-md">{{$getPartner->alternate_number}}</p>
                        </div>
                        <!-- <div>
                            <span class="text-sm text-gray-500">Media sosial:</span>

                        </div> -->
                        <hr class="w-full my-2">
                        <div>
                            <div class="font-medium mb-2">Deskripsi Perusahaan</div> 
                            <p class="text-md">{{$getPartner->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="w-full sm:w-1/2 xl:w-3/5">
            <div class="mb-4 mx-0 sm:ml-4 xl:mr-4">
                <div class="shadow-md rounded-md bg-white dark:bg-gray-700 w-full">
                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
                        <div class="flex flex-col">
                            <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">
                                Luas
                            </p>
                            <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$getPartner->wide}} Hektar</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">
                                Jumlah Produksi
                            </p>
                            <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$getPartner->production_value}}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">
                                Harga Produksi
                            </p>
                            <p class="font-bold text-md pb-4 text-green-400 dark:text-white text-center">@currency($getPartner->amount_of_production),00-</p>
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
                                    <td><b>{{$getPartner->name}}</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Budidaya</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{$getPartner->cultivation}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Ikan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>
                                        @foreach ($getFish as $itemFish)
                                            {{$itemFish->name}},
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>NPWP</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td> {{$getPartner->npwp}}</td>
                                </tr>
                                <tr>
                                    <td>SIUP</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td> {{$getPartner->siup}}</td>
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
                        <p class="font-semibold text-sm mb-4">{{100-($getPartner->lot/$getPartner->lot_first*100)}}%</p>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                            <div class="h-full text-center text-xs text-white bg-blue-400 rounded-full" style="width: {{100-($getPartner->lot/$getPartner->lot_first*100)}}%">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
                        <div class="flex flex-col">
                            <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">Sisa Lembar Saham</p>
                            <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$getPartner->lot*100}} Lembar</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">Harga per Lembar</p>
                            <p class="font-bold text-md pb-4 text-green-400 dark:text-white text-center">@currency($getPartner->lot_price) / Slot</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-sm pt-4 px-4 text-gray-800 dark:text-white text-center">Return of Interest</p>
                            <p class="font-bold text-md pb-4 text-red-400 dark:text-white text-center">{{$getPartner->roi}}%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 sm:ml-4 xl:mr-4">
                <div class="shadow-md rounded-md bg-white dark:bg-gray-700w-full">
                    <form action="{{url('/invest')}}/{{$getPartner->id}}/check" method="POST">
                    @csrf
                        <x-button class="px-24 py-4 bg-blue-400 rounded-md text-white text-sm font-bold focus:border-transparent hover:bg-blue-500 w-full">
                            {{ __('Tambahkan investasi')}} &nbsp; <i class="fa fa-coins"></i>
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('companySuccess'))
        <script>
            swal("Berhasil", "{!! Session::get('companySuccess') !!}", "success",{
                button: "OK",
            })
        </script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                margin:10,
                responsive:{
                    600:{
                        items:1
                    }
                }
            });
        });
    </script>
</x-app-layout>
