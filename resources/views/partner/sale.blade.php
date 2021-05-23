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
                <x-custom-button class="text-right inline-block align-middle modal-open">
                    <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah Penjualan') }}
                </x-custom-button>
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

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white bg-opacity-90">
                    <table id="thisTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">No</th>
                                <th data-priority="2">Tanggal</th>
                                <th data-priority="3">Jenis Ikan</th>
                                <th data-priority="4">Bobot</th>
                                <th data-priority="5">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listData as $item)  
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$item->created_at}}</td>
                                <td class="text-center">{{$item->name}}</td>
                                <td class="text-center">{{$item->weight}}</td>
                                <td class="text-center">{{$item->amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-8 text-left px-10">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Tambah Data Penjualan
                    </p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>
                <hr>
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
                            <x-label for="weight" :value="__('Berat :')" />
                            <x-input id="weight" class="block mt-1 w-full" type="number" name="weight" :value="old('weight')" onkeypress="return isNumber(event)" required />
                        </div>
                        <div class="mt-3">
                            <x-label for="amount" :value="__('Jumlah :')" />
                            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" onkeypress="return isNumber(event)" required />
                        </div>
                    </div>
                    <div class="flex justify-end pt-2">
                        <x-custom-button class="px-4 bg">
                            <i class="fa fa-save"></i>&nbsp; {{ __('Simpan') }}
                        </x-custom-button>
                    </div>
                </form>
            </div>
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
