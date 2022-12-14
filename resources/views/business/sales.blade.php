@extends('business.layouts.app')

@section('title', ' Sales')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Sales</h2>
                <ol class="breadcrumb">
                    <li>
                        <strong><a href="{{route('business.calendar',$institution->portal)}}">Home</a></strong>
                    </li>
                    <li>
                        Sales
                    </li>
                    <li class="active">
                        <strong>Sales</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
                <div class="title-action">
                    @can('add sale')
                        <a href="{{route('business.sale.create',$institution->portal)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Sale </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Sales</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Sale #</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Status</th>
                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        <tr class="gradeA">
                                            <td>{{$sale->reference}}</td>
                                            <td>{{$sale->date}}</td>
                                            <td>{{$sale->due_date}}</td>

                                            <td>
                                                @if(isset($sale->contact))
                                                    {{$sale->contact->first_name}} {{$sale->contact->last_name}}
                                                @else
                                                    <span class="label label-info"> NaN </span>
                                                @endif
                                            </td>

                                            <td>{{$sale->total}}</td>
                                            <td>{{$sale->paid}}</td>
                                            <td>
                                                <p><span class="label {{$sale->status->label}}">{{$sale->status->name}}</span></p>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    @can('view sale')
                                                        <a href="{{ route('business.sale.show', ['portal'=>$institution->portal, 'id'=>$sale->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sale #</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Status</th>
                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('js')

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

<!-- Datatables -->
<script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>


{{--  Data tables  --}}
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: 'Sales',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                },
                {extend: 'pdf',
                    title: 'Sales',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        }
                },

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

        /* Init DataTables */
        var oTable = $('#editable').DataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable( '../example_ajax.php', {
            "callback": function( sValue, y ) {
                var aPos = oTable.fnGetPosition( this );
                oTable.fnUpdate( sValue, aPos[0], aPos[1] );
            },
            "submitdata": function ( value, settings ) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition( this )[2]
                };
            },

            "width": "90%",
            "height": "100%"
        } );


    });

</script>
@endsection
