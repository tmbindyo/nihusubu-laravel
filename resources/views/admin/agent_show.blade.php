@extends('admin.layouts.app')

@section('title', 'Agent Show')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-3">
            <h2>Agent's</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Agent Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-9">
            <div class="title-action">
                @can('admin change agent tier')
                    <a data-toggle="modal" data-target="#brandRegistration" class="btn btn-primary pull-right btn-round btn-outline"> <span class="fa fa-plus"></span> Change Tier </a>
                @endcan
                @can('admin make agent payment')
                    <a data-toggle="modal" data-target="#brandRegistration" class="btn btn-primary pull-right btn-round btn-outline"> <span class="fa fa-plus"></span> Payment </a>
                @endcan
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Agent <small>edit</small></h5>

                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>Edit.</p>
                                <form method="post" action="{{ route('admin.agent.update',$agent->id) }}" autocomplete="off" class="form-horizontal form-label-left">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="has-warning">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                        <input type="name" name="name" value="{{$agent->user->name}}" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" readonly>
                                        <i>name</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                        <input type="email" name="email" value="{{$agent->user->email}}" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" readonly>
                                        <i>email</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                        @endif
                                        <input type="phone_number" name="phone_number" value="{{$agent->user->phone_number}}" class="form-control input-lg {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" readonly>
                                        <i>phone number</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        @if ($errors->has('id_number'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('id_number') }}</strong>
                                        </span>
                                        @endif
                                        <input type="id_number" name="id_number" value="{{$agent->id_number}}" class="form-control input-lg {{ $errors->has('id_number') ? ' is-invalid' : '' }}" readonly>
                                        <i>ID number</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        @if ($errors->has('kra_pin'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('kra_pin') }}</strong>
                                        </span>
                                        @endif
                                        <input type="kra_pin" name="kra_pin" value="{{$agent->kra_pin}}" class="form-control input-lg {{ $errors->has('kra_pin') ? ' is-invalid' : '' }}" readonly>
                                        <i>kra pin</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        @if ($errors->has('code'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                        @endif
                                        <input type="code" name="code" value="{{$agent->code}}" class="form-control input-lg {{ $errors->has('code') ? ' is-invalid' : '' }}" readonly>
                                        <i>code</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        @if ($errors->has('url'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('url') }}</strong>
                                        </span>
                                        @endif
                                        <input type="url" name="url" value="{{$agent->url}}" class="form-control input-lg {{ $errors->has('url') ? ' is-invalid' : '' }}" readonly>
                                        <i>url</i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row m-t-sm">
                    <div class="col-lg-12">
                        <div class="panel white-panel">
                            <div class="panel-heading">
                                <div class="panel-options">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#agent-commissions" data-toggle="tab">Commissions</a></li>
                                        <li class=""><a href="#institutions" data-toggle="tab">Institutions</a></li>
                                        <li class=""><a href="#payments" data-toggle="tab">Payments</a></li>
                                        <li class=""><a href="#tier-changes" data-toggle="tab">Tier Changes</a></li>
                                        <li class=""><a href="#users" data-toggle="tab">Users</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="agent-commissions">
                                        @can('admin view agent commissions')
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Institution</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>%</th>
                                                            <th>Date Paid</th>
                                                            <th>Withholding</th>
                                                            <th>Tier</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($agent->agentCommissions as $commission)
                                                            <tr class="gradeA">
                                                                <td>
                                                                    @if($commission->subscription->is_user)
                                                                        <a href="{{ route('admin.subscription.show',  $commission->subscription->user_id) }}" class="btn-success btn-outline btn btn-xs">View User</a>
                                                                    @elif($commission->subscription->is_institution)
                                                                        <a href="{{ route('admin.subscription.show',  $commission->subscription->institution_id) }}" class="btn-success btn-outline btn btn-xs">View Institution</a>
                                                                    @endif
                                                                </td>
                                                                <td>{{$commission->name}}</td>
                                                                <td>{{$commission->subscription->month}}-{{$commission->subscription->year}}</td>
                                                                <td>{{$commission->amount}}</td>
                                                                <td>{{$commission->commission_rate}}</td>
                                                                <td>{{$commission->date_paid}}</td>
                                                                <td>{{$commission->withholding_amount}}</td>
                                                                <td>{{$commission->tier->name}}({{$commission->tier->amount}})</td>
                                                                <td class="center">
                                                                    <span class="label {{$commission->status->label}}">{{$commission->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        @can('view subscription')
                                                                            <a href="{{ route('admin.subscription.show',  $commission->subscription->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Institution</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>%</th>
                                                            <th>Date Paid</th>
                                                            <th>Withholding</th>
                                                            <th>Tier</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        @endcan
                                    </div>

                                    <div class="tab-pane" id="institutions">
                                        @can('admin view agent institutions')
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Joined</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($agent->agentInstitutions as $institution)
                                                        <tr class="gradeX">
                                                            <td>{{$institution->name}}</td>
                                                            <td>{{$institution->email}}</td>
                                                            <td>{{$institution->phone_number}}</td>
                                                            <td>{{$institution->created_at->format('d-m-yy')}}</td>
                                                            <td>
                                                                <span class="label {{$institution->status->label}}">{{$institution->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                        <a href="{{ route('admin.institution.show', $institution->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Joined</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        @endcan
                                    </div>

                                    <div class="tab-pane" id="payments">
                                        @can('admin view agent payments')
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Amount</th>
                                                        <th>Before</th>
                                                        <th>After</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Payment Status</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($agent->agentPayments as $payment)
                                                        <tr class="gradeX">
                                                            <td>{{$payment->amount}}</td>
                                                            <td>{{$payment->balance_before}}</td>
                                                            <td>{{$payment->balance_after}}</td>
                                                            <td>{{$payment->start_date->format('d-m-yy')}}</td>
                                                            <td>{{$payment->end_date->format('d-m-yy')}}</td>
                                                            <td>
                                                                <span class="label {{$payment->status->label}}">{{$payment->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                        <a href="{{ route('admin.institution.show', $payment->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Plan</th>
                                                        <th>Joined</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        @endcan
                                    </div>

                                    <div class="tab-pane" id="tier-changes">
                                        @can('admin view agent tier changes')
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Previous</th>
                                                            <th>New</th>
                                                            <th>Reason</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($agent->agentTierChanges as $tierChange)
                                                            <tr class="gradeX">
                                                                <td>{{$tierChange->previousTeir->name}}({{$tierChange->previousTeir->amount}})</td>
                                                                <td>{{$tierChange->newTeir->name}}({{$tierChange->newTeir->amount}})</td>
                                                                <td>{{$tierChange->reason}}</td>
                                                                <td>{{$tierChange->created_at->format('d-m-yy')}}</td>
                                                                <td>
                                                                    <span class="label {{$tierChange->status->label}}">{{$tierChange->status->name}}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Previous</th>
                                                            <th>New</th>
                                                            <th>Reason</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        @endcan
                                    </div>

                                    <div class="tab-pane" id="users">
                                        @can('admin view agent users')
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Joined</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($agent->agentUsers as $user)
                                                            <tr class="gradeX">
                                                                <td>{{$tierChange->user->name}}</td>
                                                                <td>{{$tierChange->user->email}}</td>
                                                                <td>{{$tierChange->user->phone_number}}</td>
                                                                <td>{{$tierChange->user->created_at->format('d-m-yy')}}</td>
                                                                <td>
                                                                    <span class="label {{$tierChange->status->label}}">{{$tierChange->status->name}}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Joined</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        @endcan
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">@if($agent->registerer){{$agent->registerer->name}} @else Self signup @endif</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">Active</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-plus-square fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$agent->created_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-scissors fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$agent->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                        title: 'Users',
                        exportOptions: {
                                columns: [ 0, 1, 2, 3 ]
                            }
                    },
                    {extend: 'pdf',
                        title: 'Users',
                        exportOptions: {
                                columns: [ 0, 1, 2, 3 ]
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
