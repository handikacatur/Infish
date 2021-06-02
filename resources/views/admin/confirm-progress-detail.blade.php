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
                <form action="{{url('/confirm-progress')}}/{{$dataProgress->id}}/patch" method="post">
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
                        <div class="md:w-full px-3">
                            <x-label for="culvitation" :value="__('Jenis Budidaya* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="culvitation" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="culvitation" :value="$dataCompany->cultivation" disabled/>
                        </div>
                    </div>
                    <hr class="py-3">
                    <img class="w-75 m-auto rounded-md mb-3" src="{{asset('images/upload/companyProfile')}}/{{$dataCompany->image}}" alt="company-cover" />
                    <hr class="py-3">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="description" :value="__('Deskripsi* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="description" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="description" :value="$dataProgress->description"/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="status" :value="__('Status* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input-select name="status" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
                                @foreach ($dataStatus as $itemStatus)
                                <option value="{{$itemStatus->id}}" @if ($itemStatus->id == $dataProgress->progress_statuses) selected @endif>{{$itemStatus->name}}</option>
                                @endforeach
                            </x-input-select>
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
</x-app-layout>
