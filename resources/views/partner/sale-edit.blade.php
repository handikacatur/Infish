<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="text-left">
                <span class="font-semibold text-xl text-gray-800 leading-tight inline-block align-middle">
                    {{ __('Edit Penjualan') }}
                </span>
            </div>
        </div>
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
    
    <div class="container  w-full h-full mx-auto py-10">
        <form action="{{url('/update-sale')}}/{{$dataSale->id}}/patch" method="post">
            @csrf
            @method('patch')
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <x-label for="partner" :value="__('Mitra :')"/>
                        <x-label for="partner" class="block mt-1 w-full font-bold" :value="Auth::user()->name"/>
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <x-label for="fish" :value="__('Jenis Ikan :')"/>
                        <x-input-select name="fish" class="block mt-1 w-full p-2 border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($dataFish as $itemFish)
                            <option value="{{$itemFish->id}}">{{$itemFish->name}}</option>
                            @endforeach
                        </x-input-select>
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <x-label for="weight" :value="__('Berat :')" />
                        <x-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="$dataSale->weight" onkeypress="return isNumber(event)" required />
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <x-label for="amount" :value="__('Jumlah :')" />
                        <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="$dataSale->amount" onkeypress="return isNumber(event)" required />
                    </div>
                </div>
                <div class="flex justify-end pt-2">
                    <x-custom-button class="px-4 bg">
                        <i class="fa fa-save"></i>&nbsp; {{ __('Simpan') }}
                    </x-custom-button>
                </div>
            </div>
        </form>
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
