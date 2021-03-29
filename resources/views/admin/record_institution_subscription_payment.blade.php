@extends('admin.layouts.app')

@section('title', 'institution')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-3">
            <h2>Institution's</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>institution</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-9">

        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">




        {{--  details  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$institution->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$institution->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$institution->status->name}}</h3>
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
                                                <h3 class="font-bold">{{$institution->created_at}}</h3>
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
                                                <h3 class="font-bold">{{$institution->updated_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel white-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#subscriptions" data-toggle="tab">Subscriptions</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">

                                                <div class="tab-pane active" id="subscriptions">
                                                    @can('admin view subscriptions')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Ref #</th>
                                                                    <th>Amount</th>
                                                                    <th>Paid</th>
                                                                    <th>Month</th>
                                                                    <th>Start</th>
                                                                    <th>End</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->subscriptions as $subscription)
                                                                    <tr class="gradeA">
                                                                        <td class="reference">{{$subscription->reference}}</td>
                                                                        <td class="amount">{{$subscription->amount}}</td>
                                                                        <td class="paid">{{$subscription->paid}}</td>
                                                                        <td>{{$subscription->month}}-{{$subscription->year}}</td>
                                                                        <td>{{$subscription->start_date}}</td>
                                                                        <td>{{$subscription->end_date}}</td>
                                                                        <td>
                                                                            @if($subscription->is_active)
                                                                                <p><span class="badge badge-primary">Active</span></p>
                                                                            @endif
                                                                            @if($subscription->is_trial_period)
                                                                                <p><span class="badge badge-info">Trial Period</span></p>
                                                                            @endif
                                                                            @if($subscription->is_promotion)
                                                                                <p><span class="badge badge-success">Promotional</span></p>
                                                                            @endif
                                                                        </td>

                                                                        <td>
                                                                            @if($subscription->is_paid)
                                                                                <p><span class="badge badge-info">Paid</span></p>
                                                                            @elseif($subscription->is_trial_period)
                                                                                <p><span class="badge badge-info">Trial Period</span></p>
                                                                            @else
                                                                                <a data-toggle="modal" data-target="#recordPayment" class="make_payment_class btn btn-danger btn-round btn-outline"> <span class="fa fa-plus"></span> Record Payment </a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Ref #</th>
                                                                    <th>Amount</th>
                                                                    <th>Paid</th>
                                                                    <th>Month</th>
                                                                    <th>Start</th>
                                                                    <th>End</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
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
                </div>
            </div>
        </div>

    </div>


@endsection

@include('admin.layouts.modals.record_payment')

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

    <!-- Chosen -->
<script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Input Mask-->
<script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Switchery -->
<script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

<!-- iCheck -->
<script src="{{ asset('inspinia') }}/js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Color picker -->
<script src="{{ asset('inspinia') }}/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- Clock picker -->
<script src="{{ asset('inspinia') }}/js/plugins/clockpicker/clockpicker.js"></script>

<!-- Image cropper -->
<script src="{{ asset('inspinia') }}/js/plugins/cropper/cropper.min.js"></script>

<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

<!-- Date range picker -->
<script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Select2 -->
<script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

<script>
    $(function () {
        // ON SELECTING ROW
    //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
        $(".make_payment_class").click(function () {
            var reference = $(this).parents("tr").find(".reference").text();
            var amount = $(this).parents("tr").find(".amount").text();
            var paid = $(this).parents("tr").find(".paid").text();

            var p = "";

            // CREATING DATA TO SHOW ON MODEL
            p += '<div class="row"> <div class="col-md-12"> <div class="has-warning"> <input type="t" id="reference" name="reference" required="required" value="'+ reference +'" readonly class="form-control input-lg"> <i>reference</i> </div> </div> </div> <br>'
            p += '<div class="row"> <div class="col-md-12"> <div class="has-warning"> <input type="number" id="subscription_amount" name="subscription_amount" required="required" value="'+ amount +'" readonly class="form-control input-lg"> <i>subscription amount</i> </div> </div> </div> <br>'
            p += '<div class="row"> <div class="col-md-12"> <div class="has-warning"> <input type="number" id="paid" name="paid" required="required" value="'+ paid +'" readonly class="form-control input-lg"> <i>paid</i> </div> </div> </div> <br>'

            //CLEARING THE PREFILLED DATA
            $("#divGFG").empty();

            //WRITING THE DATA ON MODEL
            $("#divGFG").append(p);

        });
    });
</script>

<script>
    $(document).ready(function(){

        $('.chosen-select').chosen({width: "100%"});

        $(".select2_currency").select2({
            placeholder: "Select Currency",
            allowClear: true
        });


        $(".select2_type").select2({
            placeholder: "Select Type",
            allowClear: true
        });

        $(".select2_product_category").select2({
            placeholder: "Select Product Category",
            allowClear: true
        });

    });

</script>


<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: 'Transfers',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                    }
                },
                {extend: 'pdf',
                    title: 'Transfers',
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
