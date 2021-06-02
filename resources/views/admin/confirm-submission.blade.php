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
                    {{ __('Konfirmasi Progres Mitra') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white bg-opacity-90">
                    <table id="thisTable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">No</th>
                                <th data-priority="2">Mitra</th>
                                <th data-priority="3">Total</th>
                                <th data-priority="4">Deskripsi</th>
                                <th data-priority="5">Status</th>
                                <th data-priority="6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSubmission as $itemSubmission)  
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$itemSubmission->company_name}}</td>
                                <td class="text-center">{{$itemSubmission->amount}}</td>
                                <td class="text-center">{{$itemSubmission->description}}</td>
                                <td class="text-center">{{$itemSubmission->name}}</td>
                                <td class="text-center">
                                    <form action="{{url('/confirm-submission')}}/{{$itemSubmission->id}}/submission" method="POST" class="m-auto text-center">
                                        @csrf
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
</x-app-layout>
