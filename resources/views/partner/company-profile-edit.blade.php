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
                <form action="{{url('company-profile/save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <img class="w-75 m-auto rounded-md mb-3" src="{{asset('images/upload/companyProfile')}}/{{$dataCompany->image}}" alt="company-cover" />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="company_name" :value="__('Nama Perusahaan* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="company_name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="company_name" :value="$dataCompany->company_name" required />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="address" :value="__('Alamat* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="address" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="address" :value="$dataCompany->address" required />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label for="phone_number" :value="__('Nomor Telepon* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="phone_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="phone_number" :value="$dataCompany->phone_number" onkeypress="return isNumber(event)" required />
                        </div>
                        <div class="md:w-1/2 px-3">
                            <x-label for="opsional_number" :value="__('Nomor Telepon - Opsional :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="opsional_number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="opsional_number" :value="$dataCompany->alternate_number" onkeypress="return isNumber(event)"/>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="culvitation" :value="__('Jenis Budidaya* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="culvitation" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="culvitation" :value="$dataCompany->cultivation" required />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="wide" :value="__('Luas Kolam* (m3) :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="wide" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="number" name="wide" :value="$dataCompany->wide" onkeypress="return isNumber(event)" required />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label for="npwp" :value="__('NPWP* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="npwp" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="npwp" :value="$dataCompany->npwp" required />
                        </div>
                        <div class="md:w-1/2 px-3">
                            <x-label for="siup" :value="__('SIUP* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="siup" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="siup" :value="$dataCompany->siup" required />
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="description" :value="__('Deskripsi* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <!-- <x-input id="description" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="description" :value="$dataCompany->description" required /> -->
                            <x-text-area id="description" rows="3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="description" required>{{$dataCompany->description}}</x-text-area>
                        </div>
                    </div>
                    <hr class="py-3">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-label for="image" :value="__('Foto Utama Perusahaan* :')" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"/>
                            <x-input id="image" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="file" name="image" :value="old('image')"/>
                            <p class="text-gray-600 text-xs">Foto ini akan digunakan sebagai cover pada detail perusahaan</p>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="mt-5 mx-2 w-full">
                            <x-label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" :value="__('Foto pendukung lainnya* :')"/>
                            <div class='flex items-center justify-center w-full'>
                                <label for="additional-photos" class='flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-purple-300 group'>
                                    <div id="additional-photo-wrapper" class='flex flex-col sm:flex-row items-center justify-center flex-wrap p-7'>
                                        <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider text-center'>Foto pendukung lain</p>
                                    </div>
                                </label>
                                <x-input id="additional-photos" class="hidden" type='file' name="file" multiple/>
                            </div>
                        </div>
                    </div>
                    <hr class="py-3">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <x-button class="px-24 py-4 bg-blue-400 rounded-md text-white text-sm focus:border-transparent hover:bg-blue-500 w-full">
                                {{ __('Simpan')}}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/dropzone.min.js')}}"></script>
    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        const additionalPhotos = document.querySelector('#additional-photos');

        additionalPhotos.addEventListener('change', (e) => {
            const file = e.target.files;
            const wrapper = document.querySelector('#additional-photo-wrapper');
            wrapper.classList.remove('justify-center');
            wrapper.classList.add('justify-evenly');
            wrapper.innerHTML = '';

            if (file) {
                for (let i=0; i<file.length; i++) {
                    const div = document.createElement('div');
                    div.classList.add('additional-photo-shaper');

                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file[i]);
                    img.style.Width = '70px';

                    div.appendChild(img)

                    wrapper.appendChild(div);
                }
            }
        });
    </script>
</x-app-layout>
