<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{url('/go-invest')}}/{{$getPartner->id}}/go" method="POST" class="m-auto" enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 bg-white border-b border-gray-200 items-center">
                        <h3 class="font-bold text-gray-900 text-xl">Investasi</h3>
                        <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Nama Mitra</td>
                                        <td class="px-5">:</td>
                                        <td><b>{{$getPartner->company_name}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>ROI</td>
                                        <td class="px-5">:</td>
                                        <td><b>{{$getPartner->roi}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Slot</td>
                                        <td class="px-5">:</td>
                                        <td><b>{{$getPartner->lot_price}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Slot</td>
                                        <td class="px-5">:</td>
                                        <td><b>{{$getPartner->lot}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Slot Dibeli</td>
                                        <td class="px-5">:</td>
                                        <td><b>
                                            <x-input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="req_lot" required /> 
                                        </b></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya admin</td>
                                        <td class="px-5">:</td>
                                        <td><b>Rp.2.500</b></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="px-5">:</td>
                                        <td><b>2500</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 bg-white border-b border-gray-200 items-center">
                        <h3 class="font-bold text-gray-900 text-xl">Pembayaran</h3>
                        <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Bank Pengirim</td>
                                        <td class="px-5">:</td>
                                        <td><b>
                                            <select name="sender">
                                                <option value="1">Bank BNI</option>
                                                <option value="2">Bank BRI</option>
                                                <option value="3">Bank BCA</option>
                                                <option value="4">Bank BSI</option>
                                                <option value="5">Bank Jatim</option>
                                                <option value="6">Bank Mandiri</option>
                                            </select>    
                                        </b></td>
                                    </tr>
                                    <tr>
                                        <td>No Rekening Pengirim</td>
                                        <td class="px-5">:</td>
                                        <td><b>
                                            <x-input id="transfer_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="transfer_number" required />
                                        </b></td>
                                    </tr>
                                    <tr>
                                        <td>Bank Penerima</td>
                                        <td class="px-5">:</td>
                                        <td><b>BCA</b></td>
                                    </tr>
                                    <tr>
                                        <td>No Rekening Penerima</td>
                                        <td class="px-5">:</td>
                                        <td><b>0240407566</b></td>
                                    </tr>
                                    <tr>
                                        <td>a/n</td>
                                        <td class="px-5">:</td>
                                        <td><b>Yudha Alif Auliya</b></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td class="px-5">:</td>
                                        <td><b>Transfer ke nomor rekening diatas untuk melakukan pembayaran. Status pembayaran akan di cek paling lambat 1x24 jam.</b></td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Pembayaran</td>
                                        <td class="px-5">:</td>
                                        <td><b>
                                            <x-input id="image" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="file" name="image"/>
                                        </b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 bg-white border-b border-gray-200 items-center">
                        <div class="flex flex-col max-w-3xl bg-white px-8 py-6 rounded-xl space-y-5 items-left">
                            <x-button class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent w-full">
                                <i class="fa fa-save"></i> {{ __('Investasi')}}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
