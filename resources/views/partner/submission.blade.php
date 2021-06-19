<x-app-layout>    
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="text-left">
                <span class="font-semibold text-xl text-gray-800 leading-tight inline-block align-middle">
                    {{ __('Detail Pengajuan') }}
                </span>
            </div>
            <div class="text-right">
                <button @click="openModal" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <i class="fa fa-plus"></i>&nbsp; {{ __('Ajukan Dana') }}
                </button>
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

    <div class="mt-10 flex flex-row">
        <div class="relative flex flex-col items-center justify-around p-4 mr-16 w-80 rounded-2xl " style="transform: translate(0px, 0px); opacity: 1;">
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-300 rounded-xl -rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-400 rounded-xl rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full transform scale-x-105 scale-y-95 bg-white rounded-xl " style="z-index: -1;"></div>
            <h3 class="z-10 p-2 text-2xl font-semibold text-purple-900">Investasi Diterima</h3>
            <div class="z-10 p-2 text-sm text-center text-gray-500 ">@currency($sumInvest)</div>
        </div>
        <div class="relative flex flex-col items-center justify-around p-4 mr-16 w-80 rounded-2xl " style="transform: translate(0px, 0px); opacity: 1;">
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-300 rounded-xl -rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-400 rounded-xl rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full transform scale-x-105 scale-y-95 bg-white rounded-xl " style="z-index: -1;"></div>
            <h3 class="z-10 p-2 text-2xl font-semibold text-purple-900">Investasi Yang Dapat Dicairkan</h3>
            <div class="z-10 p-2 text-sm text-center text-gray-500 ">@currency($sumInvest-$sumSubmissionDone)</div>
        </div>
        <div class="relative flex flex-col items-center justify-around p-4 mr-16 w-80 rounded-2xl " style="transform: translate(0px, 0px); opacity: 1;">
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-300 rounded-xl -rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-400 rounded-xl rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full transform scale-x-105 scale-y-95 bg-white rounded-xl " style="z-index: -1;"></div>
            <h3 class="z-10 p-2 text-2xl font-semibold text-purple-900">Investasi Dikembalikan</h3>
            <div class="z-10 p-2 text-sm text-center text-gray-500 ">@currency($sumInvestBack)</div>
        </div>
        <div class="relative flex flex-col items-center justify-around p-4 mr-16 w-80 rounded-2xl " style="transform: translate(0px, 0px); opacity: 1;">
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-300 rounded-xl -rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full text-white transform scale-x-105 scale-y-95 bg-purple-400 rounded-xl rotate-2 " style="z-index: -1;"></div>
            <div class="absolute z-0 w-full h-full transform scale-x-105 scale-y-95 bg-white rounded-xl " style="z-index: -1;"></div>
            <h3 class="z-10 p-2 text-2xl font-semibold text-purple-900">Pengembalian Bulan Ini</h3>
            <div class="z-10 p-2 text-sm text-center text-gray-500 ">@currency($sumInvestMonth)</div>
        </div>
    </div>

    <div class="w-full mt-12 overflow-hidden rounded-lg shadow-sm border-1">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="text-center px-4 py-3">No</th>
                <th class="text-center px-4 py-3">Tanggal</th>
                <th class="text-center px-4 py-3">Jumlah</th>
                <th class="text-center px-4 py-3">Deskripsi</th>
                <th class="text-center px-4 py-3">Status</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($listData as $key => $item)  
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="text-center px-4 py-3">{{$listData->firstItem() + $key}}</td>
                    <td class="text-center px-4 py-3 text-sm">{{$item->created_at}}</td>
                    <td class="text-center px-4 py-3 text-sm">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            @currency($item->amount)
                        </span>
                    </td>
                    <td class="text-center px-4 py-3 text-sm">{{$item->description}}</td>
                    <td class="text-center px-4 py-3 text-sm">{{$item->name}}</td>
                </tr>
                @endforeach  
            </tbody>
          </table>
        </div>
        {{ $listData->links() }}
    </div>

    <!--Modal-->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
        <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Pengajuan Dana</p>
                <!-- Modal description -->  
                <form action="{{url('submission/save')}}" method="POST">
                    @csrf
                    <div class="mt-3 p-3">
                        <div>
                            <x-label for="amount" :value="__('Jumlah :')" />
                            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" onkeypress="return isNumber(event)" required />
                        </div>
                        <div class="mt-3">
                            <x-label for="description" :value="__('Deskripsi / Keterangan :')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                        </div>
                    </div>
                    <div class="flex justify-end pt-2">
                        <x-custom-button class="px-4 bg-purple-700">
                            <i class="fa fa-save"></i>&nbsp; {{ __('Ajukan Dana') }}
                        </x-custom-button>
                        <button @click="closeModal" class="w-full ml-2 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('submissionSuccess'))
        <script>
            swal("Berhasil", "{!! Session::get('submissionSuccess') !!}", "success",{
                button: "OK",
            })
        </script>
    @endif
    
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
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
                openmodal[i].addEventListener('click', function(event){
                event.preventDefault()
                toggleModal()
            })
        }
        
        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)
        
        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }
        
        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };
        
        
        function toggleModal () {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
        
        
    </script>
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
