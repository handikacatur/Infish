<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="text-left">
                <span class="font-semibold text-xl text-gray-800 leading-tight inline-block align-middle">
                    {{ __('Data Profil Perusahaan') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <form action="{{url('/confirm-partner')}}/{{$dataPartner->id}}/patch" method="post">
                    @method('patch')
                    @csrf
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="company_name" :value="__('Nama Perusahaan* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="company_name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="company_name" :value="$dataCompany->company_name" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="address" :value="__('Alamat* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="address" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="address" :value="$dataCompany->address" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label for="phone_number" :value="__('Nomor Telepon* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="phone_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="phone_number" :value="$dataCompany->phone_number" onkeypress="return isNumber(event)" disabled/>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <x-label for="opsional_number" :value="__('Nomor Telepon - Opsional :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="opsional_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="opsional_number" :value="$dataCompany->alternate_number" onkeypress="return isNumber(event)" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="culvitation" :value="__('Jenis Budidaya* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="culvitation" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="culvitation" :value="$dataCompany->cultivation" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="fish" :value="__('Jenis Ikan* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input-select name="fish" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
                                @foreach ($dataFish as $itemFish)
                                <option value="{{$itemFish->id}}">{{$itemFish->name}}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="wide" :value="__('Luas Kolam* (Hektar) :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="wide" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="wide" :value="$dataCompany->wide" onkeypress="return isNumber(event)" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label for="production_amount" :value="__('Jumlah Produksi* (Ton) :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="production_amount" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="production_amount" :value="$dataCompany->amount_of_production" onkeypress="return isNumber(event)" disabled/>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <x-label for="production_value" :value="__('Nilai Produksi* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="production_value" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="production_value" :value="$dataCompany->production_value" onkeypress="return isNumber(event)" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label for="npwp" :value="__('NPWP* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="npwp" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="npwp" :value="$dataCompany->npwp" disabled/>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <x-label for="siup" :value="__('SIUP* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="siup" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="siup" :value="$dataCompany->siup" disabled/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="description" :value="__('Deskripsi* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="description" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="description" :value="$dataCompany->description" disabled/>
                        </div>
                    </div>
                    <hr class="py-3">
                    <img class="w-75 m-auto rounded-md mb-3" src="{{asset('images/upload/companyProfile')}}/{{$dataCompany->image}}" alt="company-cover" />
                    <hr class="py-3">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="status" :value="__('Status* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input-select name="status" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
                                @foreach ($dataStatus as $itemStatus)
                                <option value="{{$itemStatus->id}}" @if ($itemStatus->id == $dataPartner->status_partner_id) selected @endif>{{$itemStatus->name}}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label for="lot" :value="__('Slot :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="lot" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="lot" onkeypress="return isNumber(event)" :value="$dataPartner->lot" />
                        </div>
                        <div class="md:w-1/2 px-3">
                            <x-label for="lot_price" :value="__('Harga slot :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="lot_price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="lot_price" onkeypress="return isNumber(event)" :value="$dataPartner->lot_price" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="roi" :value="__('ROI :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="roi" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="roi" onkeypress="return isNumber(event)" :value="$dataPartner->roi" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-button class="px-24 py-4 bg-gray-900 rounded-md text-white text-sm focus:border-transparent w-full">
                                <i class="fa fa-save"></i> {{ __('Simpan')}}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
</x-app-layout>
