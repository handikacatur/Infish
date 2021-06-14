<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex sm:flex-col flex-col-reverse ">
    <div class="grid gap-4 mb-2 md:grid-cols-2 xl:grid-cols-4 my-5 w-full"> 
        <!-- Card 1 -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-full">
          <div class="p-3 mr-1 text-orange-500 rounded-full">
            @if ($statusPartner->status_partner_id == '1')
                    <i class="fa fa-check fa-2x text-green-600 bg-green-100 rounded-full px-1 py-1"></i>
                @elseif ($statusPartner->status_partner_id == '2')
                    <i class="fa fa-clock-o fa-2x text-blue-600 bg-blue-100 rounded-full px-1 py-1"></i>
                @elseif ($statusPartner->status_partner_id == '3')
                    <i class="fa fa-times-circle fa-2x text-red-600 bg-red-100 rounded-full px-1 py-1"></i>
                @else
                    <i class="fa fa-question-circle fa-2x text-yellow-600 bg-yellow-100 rounded-full px-1 py-1"></i>
                @endif
          </div>
          <div class="w-full">
            <p class="text-base font-bold text-gray-900 dark:text-gray-400 w-full">
              Status Perusahaan
            </p>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                {{-- <i class="fa fa-address-card"></i> --}}
                @if ($statusPartner->status_partner_id == '1')
                    <p class="px-7 rounded-full bg-green-100 text-green-700 font-semibold">Terverifikasi</p>
                @elseif ($statusPartner->status_partner_id == '2')
                    <p class="px-7 rounded-full bg-blue-100 text-blue-700">Sedang menunggu persetujuan</p>
                @elseif ($statusPartner->status_partner_id == '3')
                    <p class="px-7 rounded-full bg-red-100 text-red-700">Permohonan tidak disetujui</p>
                @else
                    <p class="px-7 rounded-full bg-yellow-100 text-yellow-700">Permohonan belum diverifikasi</p>
                @endif
            </p>
            <hr class="my-2 w-full">
            <a href="{{route('company-profile')}}" class="m-auto text-sm font-semibold text-gray-700 dark:text-gray-200">
                <button class="w-full py-1 px-2 bg-blue-500 text-white font-light rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-opacity-75 m-auto mt-1">
                    Lihat Detail
                </button>
            </a>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-full">
          <div class="p-3 mr-1 text-orange-500 rounded-full">
              <i class="fas fa-money-bill-wave-alt fa-lg text-green-600 bg-green-100 rounded-full px-2 py-3"></i>
          </div>
          <div class="w-full">
            <p class="text-base font-bold text-gray-900 dark:text-gray-400 w-full">
              Penjualan
            </p>
            <p class="text-md font-semibold text-gray-700 dark:text-gray-200">
              Rp 46,760.89
            </p>
            <hr class="my-2 w-full">
            <a href="{{url('sale')}}" class="m-auto text-sm font-semibold text-gray-700 dark:text-gray-200">
                <button class="w-full py-1 px-2 bg-blue-500 text-white font-light rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-opacity-75 m-auto mt-1">
                    Lihat Detail
                </button>
            </a>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-full">
          <div class="p-3 mr-1 text-orange-500 rounded-full">
              <i class="fas fa-coins fa-lg text-blue-600 bg-blue-100 rounded-full px-2 py-3"></i>
          </div>
          <div class="w-full">
            <p class="text-base font-bold text-gray-900 dark:text-gray-400 w-full">
                Perkembangan
            </p>
            <p class="text-msm font-semibold text-gray-700 dark:text-gray-200">
                <i class="fa fa-briefcase"></i>
                {{$getProgress}}&nbsp;Perkembangan
            </p>
            <hr class="my-2 w-full">
            <a href="{{url('progress')}}" class="m-auto text-sm font-semibold text-gray-700 dark:text-gray-200">
                <button class="w-full py-1 px-2 bg-blue-500 text-white font-light rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-opacity-75 m-auto mt-1">
                    Lihat Detail
                </button>
            </a>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-full">
          <div class="p-3 mr-1 text-orange-500 rounded-full">
            <i class="fas fa-chart-line fa-lg text-yellow-600 bg-yellow-100 rounded-full px-2 py-3"></i>
          </div>
          <div class="w-full">
            <p class="text-base font-bold text-gray-900 dark:text-gray-400 w-full">
                Pengajuan Dana
            </p>
            <p class="text-xs font-semibold text-gray-700 dark:text-gray-200">
                <i class="fa fa-magic"></i>
                {{$getSubmission}}&nbsp;Total Pengajuan Dana
            </p>
            <hr class="my-2 w-full">
            <a href="{{url('submission')}}" class="m-auto text-sm font-semibold text-gray-700 dark:text-gray-200">
                <button class="w-full py-1 px-2 bg-blue-500 text-white font-light rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-opacity-75 m-auto mt-1">
                    Lihat Detail
                </button>
          </div>
        </div>
    </div>

    <div class="w-full mt-5">
        <div id="chart-container" class="w-full" style="width:75vw;"></div>
    </div>
</div>
    {{-- {{dd($dataPenjualan)}} --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        var datas = {{ json_encode($dataPenjualan) }}

        Highcharts.chart('chart-container', {
            title:{
                text:'Data Penjualan Ikan'
            },
            subtitle: {
                text: 'Data Penjualan Ikan Setiap Bulan Tahun 2021'
            },
            xAxis: {
                categories:['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text : 'Banyak Penjualan'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series:{
                    allowPointSelect: true
                }
            },
            series:[{
                name: 'Banyaknya',
                data: datas
            }],
            responsive:{
                rules:[{
                    condition:{
                        maxWidth:100
                    },
                    chartOptions:{
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
<script>
    //     const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
    //     const data = {
    //         labels: labels,
    //         datasets: [{
    //             label: 'Banyak Penjualan',
    //             backgroundColor: 'rgb(255, 99, 132)',
    //             borderColor: 'rgb(255, 99, 132)',
    //             data: {{ json_encode($dataPenjualan) }},
    //         }]
    //     };

    //     const config = {
    //         type: 'line',
    //         data: data,
    //         options: {
    //             responsive: true,
    //             plugins: {
    //                 title: {
    //                     display: true,
    //                     text: 'Data Penjualan Ikan Setiap Bulan Tahun 2021'
    //                 },
    //             },
    //             interaction: {
    //                 intersect: false,
    //             },
    //             scales: {
    //                 x: {
    //                     display: true,
    //                     title: {
    //                         display: true
    //                     }
    //                 },
    //                 y: {
    //                     display: true,
    //                     title: {
    //                         display: true,
    //                         text: 'Value'
    //                     },
    //                     suggestedMin: -10,
    //                     suggestedMax: 200,
    //                     min:0,
    //                     max:10
    //                 }
    //             }
    //         },
    //     };

    //     var myChart = new Chart(
    //         document.getElementById('myChart'),
    //         config
    //     );
    </script>
</x-app-layout>
