<x-app-layout>
    <x-slot name="extraCSS">
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <style>
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568; 			
                padding-left: 1rem; 		
                padding-right: 1rem; 		
                padding-top: .5rem; 		
                padding-bottom: .5rem;
                line-height: 1.25;
                border-width: 2px;
                border-radius: .25rem; 		
                border-color: #edf2f7;
                background-color: #edf2f7;
            }

            table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button		{
                font-weight: 700;
                border-radius: .25rem;
                border: 1px solid transparent;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
                color: #fff !important;
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
                font-weight: 700;
                border-radius: .25rem;
                background: #1b4b94 !important;
                border: 1px solid transparent;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
                color: #fff !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
                font-weight: 700;
                border-radius: .25rem;
                background: #1b4b94 !important;
                border: 1px solid transparent;
            }
            
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }
            
            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #1b4b94 !important;
            }
            
        </style>
    </x-slot>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <div class="text-left">
                <span class="font-semibold text-xl text-gray-800 leading-tight inline-block align-middle">
                    {{ __('Detail Penjualan') }}
                </span>
            </div>
            <div class="text-right">
                <button @click="openModal" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah Penjualan') }}
                </button>
            </div>
        </div>
    </x-slot>

    <div class="pt-12 pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden m-auto sm:rounded-lg">
                <div class="rounded shadow-xl m-auto overflow-hidden md:w-1/2 " x-data="{stockTicker:stockTicker()}" x-init="stockTicker.renderChart()">
                    <div class="flex px-5 pb-4 pt-8 bg-indigo-500 text-white items-center">
                        <canvas id="chart" class="w-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="w-full overflow-hidden rounded-lg shadow-sm border-1">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Jenis Ikan</th>
                <th class="px-4 py-3">Berat</th>
                <th class="px-4 py-3">Harga</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($listData as $item)  
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">{{$loop->iteration}}</td>
                    <td class="px-4 py-3 text-sm">{{$item->created_at}}</td>
                    <td class="px-4 py-3 text-sm">{{$item->name}}</td>
                    <td class="px-4 py-3 text-sm">{{$item->weight}} ton</td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            @currency($item->amount)
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm md:flex">
                            <form action="{{url('/edit-sale')}}/{{$item->id}}/change" method="POST" class="m-auto">
                                @csrf
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{url('/delete-sale')}}/{{$item->id}}/drop" method="POST" class="m-auto">
                                @method('delete')
                                @csrf
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm('Hapus Data ?')">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach  
            </tbody>
          </table>
        </div>
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          <span class="flex items-center col-span-3">
            Showing 21-30 of 100
          </span>
          <span class="col-span-2"></span>
          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
              <ul class="inline-flex items-center">
                <li>
                  <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                      <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                  </button>
                </li>
                <li>
                  <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    1
                  </button>
                </li>
                <li>
                  <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    2
                  </button>
                </li>
                <li>
                  <button class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                    3
                  </button>
                </li>
                <li>
                  <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    4
                  </button>
                </li>
                <li>
                  <span class="px-3 py-1">...</span>
                </li>
                <li>
                  <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    8
                  </button>
                </li>
                <li>
                  <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    9
                  </button>
                </li>
                <li>
                  <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                      <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                  </button>
                </li>
              </ul>
            </nav>
          </span>
        </div>
      </div>

      
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
        <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Tambah Data Penjualan</p>
                <!-- Modal description -->            
                <form action="{{url('sale/save')}}" method="POST">
                    @csrf
                    <div class="mt-3 p-3">
                        <div>
                            <x-label for="partner" :value="__('Mitra :')"/>
                            <x-label for="partner" class="block mt-1 w-full font-bold" :value="Auth::user()->name"/>
                        </div>
                        <div class="mt-3">
                            <x-label for="fish" :value="__('Jenis Ikan :')"/>
                            <x-input-select name="fish" class="block mt-1 w-full p-2 border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($dataFish as $itemFish)
                                <option value="{{$itemFish->id}}">{{$itemFish->name}}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                        <div class="mt-3">
                            <x-label for="weight" :value="__('Berat (Ton) :')" />
                            <x-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="old('weight')" onkeypress="return isNumber(event)" required />
                        </div>
                        <div class="mt-3">
                            <x-label for="amount" :value="__('Jumlah (Rp.) :')" />
                            <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" onkeypress="return isNumber(event)" required />
                        </div>
                    </div>
                    <div class="flex justify-end pt-2">
                        <x-custom-button class="px-4 bg">
                            <i class="fa fa-save"></i>&nbsp; {{ __('Simpan') }}
                        </x-custom-button>
                    </div>
                </form>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
            </footer>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
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

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        Number.prototype.m_formatter = function() {
            return this > 999999 ? (this / 1000000).toFixed(1) + 'M' : this
        };
        let stockTicker = function(){
            return {
                stockFullName: 'SW Limited.',
                stockShortName: 'ASX:SFW',
                price: {
                    current: 2.320,
                    open: 2.230,
                    low: 2.215,
                    high: 2.325,
                    cap: 93765011,
                    ratio: 20.10,
                    dividend: 1.67
                },
                chartData: {
                    labels: ['10:00','','','','12:00','','','','2:00','','','','4:00'],
                    data: [2.23,2.215,2.22,2.25,2.245,2.27,2.28,2.29,2.3,2.29,2.325,2.325,2.32],
                },
                renderChart: function(){
                    let c = false;
        
                    Chart.helpers.each(Chart.instances, function(instance) {
                        if (instance.chart.canvas.id == 'chart') {
                            c = instance;
                        }
                    });
        
                    if(c) {
                        c.destroy();
                    }
        
                    let ctx = document.getElementById('chart').getContext('2d');
        
                    let chart = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: this.chartData.labels,
                            datasets: [
                                {
                                    label: '',
                                    backgroundColor: "rgba(255, 255, 255, 0.1)",
                                    borderColor: "rgba(255, 255, 255, 1)",
                                    pointBackgroundColor: "rgba(255, 255, 255, 1)",
                                    data: this.chartData.data,
                                },
                            ],
                        },
                        layout: {
                            padding: {
                                right: 10
                            }
                        },
                        options: {
                            legend: {
                                display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        fontColor: "rgba(255, 255, 255, 1)",
                                    },
                                    gridLines: {
                                        display: false,
                                    },
                                }],
                                xAxes: [{
                                    ticks: {
                                        fontColor: "rgba(255, 255, 255, 1)",
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, .2)",
                                        borderDash: [5, 5],
                                        zeroLineColor: "rgba(255, 255, 255, .2)",
                                        zeroLineBorderDash: [5, 5]
                                    },
                                }]
                            }
                        }
                    });
                }
            }
        }
    </script>
</x-app-layout>
