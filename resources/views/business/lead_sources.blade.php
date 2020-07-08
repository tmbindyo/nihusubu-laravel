@extends('business.layouts.app')

@section('title', 'Lead Sources')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Lead Sources</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('business.calendar',$institution->portal)}}">Home</a>
                </li>
                <li>
                    Settings
                </li>
                <li class="active">
                    <strong>Lead Sources</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                @can('add lead contact')
                    <a href="{{route('business.lead.source.create',$institution->portal)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Lead Source </a>
                @endcan
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        {{--  titles  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lead Sources</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leadSources as $leadSource)
                                        <tr class="gradeX">
                                            <td>{{$leadSource->name}}</td>
                                            <td>{{$leadSource->user->name}}</td>
                                            <td>
                                                <span class="label {{$leadSource->status->label}}">{{$leadSource->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    @can('view lead source')
                                                        <a href="{{ route('business.lead.source.show', ['portal'=>$institution->portal, 'id'=>$leadSource->id]) }}" class="btn-white btn btn-xs">View</a>
                                                    @endcan
                                                    @can('delete lead source')
                                                        <a href="{{ route('business.lead.source.delete', ['portal'=>$institution->portal, 'id'=>$leadSource->id]) }}" class="btn-danger btn btn-xs">Delete</a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--  deleted titles  --}}
        @if($deletedLeadSources->count())
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Deleted Lead Sources</h5>

                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deletedLeadSources as $leadSource)
                                            <tr class="gradeX">
                                                <td>{{$leadSource->name}}</td>
                                                <td>{{$leadSource->user->name}}</td>
                                                <td>
                                                    <span class="label {{$leadSource->status->label}}">{{$leadSource->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        @can('view lead source')
                                                            <a href="{{ route('business.lead.source.show', ['portal'=>$institution->portal, 'id'=>$leadSource->id]) }}" class="btn-white btn btn-xs">View</a>
                                                        @endcan
                                                        @can('delete lead source')
                                                            <a href="{{ route('business.lead.source.restore', ['portal'=>$institution->portal, 'id'=>$leadSource->id]) }}" class="btn-warning btn btn-xs">Restore</a>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection

@section('js')


    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel',
                        title: 'LeadSources',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    },
                    {extend: 'pdf',
                        title: 'LeadSources',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
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
