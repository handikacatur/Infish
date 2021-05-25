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
