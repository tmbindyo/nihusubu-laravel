@extends('business.layouts.app')

@section('title', ' Expense Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Expenses</h2>
                <ol class="breadcrumb">
                    <li>
                        <strong><a href="{{route('business.calendar',$institution->portal)}}">Home</a></strong>
                    </li>
                    <li>
                        <a href="#">Accounting</a>
                    </li>
                    <li>
                        <strong><a href="{{route('business.expenses',$institution->portal)}}">Expenses</a></strong>
                    </li>
                    <li class="active">
                        <strong>Expense Create</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="">
                                <form method="post" action="{{ route('business.expense.store',$institution->portal) }}" >
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


                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--  expense account  --}}
                                            <div class="has-warning">
                                                @if ($errors->has('expense_account'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('expense_account') }}</strong>
                                                    </span>
                                                @endif
                                                <select name="expense_account" class="select2_expense_account form-control input-lg {{ $errors->has('expense_account') ? ' is-invalid' : '' }}" required>
                                                    <option></option>
                                                    @foreach($expenseAccounts as $expenseAccount)
                                                        <option value="{{$expenseAccount->id}}">{{$expenseAccount->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>expense account</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                @if ($errors->has('date'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('date') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="date" id="date" value="{{ old('date') }}" class="form-control input-lg {{ $errors->has('date') ? ' is-invalid' : '' }}" required>
                                                </div>
                                                <i> expense date.</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--  expense account  --}}
                                            <div class="has-warning">
                                                @if ($errors->has('account'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('account') }}</strong>
                                                    </span>
                                                @endif
                                                <select name="account" class="select2_account form-control input-lg {{ $errors->has('account') ? ' is-invalid' : '' }}" required>
                                                    <option></option>
                                                    @foreach($accounts as $account)
                                                        <option value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
                                                    @endforeach
                                                </select>
                                                <i>account</i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @if ($errors->has('is_paid'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('is_paid') }}</strong>
                                                    </span>
                                            @endif
                                            <div class="checkbox checkbox-info">
                                                <input id="is_paid" name="is_paid" type="checkbox" checked class="{{ $errors->has('is_paid') ? ' is-invalid' : '' }}">
                                                <label for="is_paid">
                                                    Paid
                                                </label>
                                                <span><i data-toggle="tooltip" data-placement="right" title="If checked, the selected account is deducted from the selected account." class="fa fa-x text-warning fa-question-circle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    {{--table--}}
                                    <div class="">
                                        <table class="table table-bordered" id = "expense_table">
                                            <thead>
                                            <tr>
                                                <th>Item Details</th>
                                                <th>Quantity</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="item_details[0][item]" type="text" class="form-control input-lg item-detail">
                                                </td>
                                                <td>
                                                    <input oninput = "changeItemQuantity(this)" name="item_details[0][quantity]" type="number" class="form-control input-lg item-quantity" value = "0" min = "0">
                                                </td>
                                                <td>
                                                    <input oninput = "changeItemRate(this)" name="item_details[0][rate]" type="number" class="form-control input-lg item-rate" placeholder="E.g +10, -10" value = "0" min = "0">
                                                </td>
                                                <td>
                                                    <input oninput = "itemTotalChange()" onchange = "this.oninput()" name="item_details[0][amount]" type="number" class="form-control input-lg item-total" placeholder="E.g +10, -10" value = "0" min = "0">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small btn-primary" onclick = "addTableRow()">+ Add Row</label>
                                        <label class="btn btn-small btn-primary" onclick = "addTableRow()">+ Add Product</label>
{{--                                        <label class="btn btn-small btn-primary" onclick = "addTableRow()">+ Add Another Line</label>--}}
                                    </div>

                                    {{--sub totals--}}
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-8">
                                            <input name="subtotal" type = "number" class="pull-right input-lg form-control" id = "items-subtotal" readonly value="0">
                                            <i>subtotal</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-8">
                                            <input name="adjustment" oninput = "itemTotalChange()" type="number" class="form-control input-lg" id = "adjustment-value" value = "0">
                                            <i>adjustment</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-8">
                                            <input type = "number" name = "grand_total" id = "grand-total" class="pull-right input-lg form-control" value = "0" readonly>
                                            <i>total</i>
                                        </div>
                                    </div>
                                    <hr>
                                    {{--  Tie expense to something  --}}
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                @if ($errors->has('sale'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('sale') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="col-md-4">
                                                    {{--  Customer  --}}
                                                    <div class="checkbox checkbox-info">
                                                        <input id="is_sale" name="is_sale" @isset($saleExists) checked @endisset type="checkbox" class="enableSale {{ $errors->has('is_sale') ? ' is-invalid' : '' }}">
                                                        <label for="is_sale">Sale </label> <span><i data-toggle="tooltip" data-placement="right" title="Check this if you want to tie the expense to a sale, then select the sale in the dropdown." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="has-warning">
                                                        <div class="has-warning">
                                                            <select name="sale" id="sale" @isset($saleExists) required @endisset class="select2_sale form-control input-lg {{ $errors->has('sale') ? ' is-invalid' : '' }}" @if (@isset($saleExists) == false) disabled @endif>
                                                                <option></option>
                                                                @foreach($sales as $sale)
                                                                    <option @isset($saleExists) @if($saleExists->id == $sale->id) selected @endif @endisset value="{{$sale->id}}" >{{$sale->reference}} [{{$sale->total}}] ({{$sale->created_at}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                @if ($errors->has('campaign'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('campaign') }}</strong>
                                                </span>
                                                @endif
                                                <div class="col-md-4">
                                                    {{--  Customer  --}}
                                                    <div class="checkbox checkbox-info">
                                                        <input id="is_campaign" name="is_campaign" @isset($campaignExists) checked @endisset type="checkbox" class="enableCampaign{{ $errors->has('is_campaign') ? ' is-invalid' : '' }}" >
                                                        <label for="is_campaign">Campaign </label> <span><i data-toggle="tooltip" data-placement="right" title="Check this if you want to tie the expense to a campaign, then select the campaign in the dropdown." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="has-warning">
                                                        <div class="has-warning">
                                                            <select name="campaign" id="campaign" @isset($campaignExists) required @endisset class="select2_campaign form-control input-lg {{ $errors->has('campaign') ? ' is-invalid' : '' }}" @if (@isset($campaignExists) == false) disabled @endif>
                                                                <option></option>
                                                                @foreach($campaigns as $campaign)
                                                                    <option @isset($campaignExists) @if($campaignExists->id == $campaign->id) selected @endif @endisset value="{{$campaign->id}}" >{{$campaign->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                @if ($errors->has('transfer'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('transfer') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="col-md-4">
                                                    {{--  Customer  --}}
                                                    <div class="checkbox checkbox-info">
                                                        <input id="is_transfer" name="is_transfer" @isset($transferExists) checked @endisset type="checkbox" class="enableTransfer {{ $errors->has('is_transfer') ? ' is-invalid' : '' }}">
                                                        <label for="is_transfer">Transfer </label> <span><i data-toggle="tooltip" data-placement="right" title="Check this if you want to tie the expense to a transfer, then select the transfer in the dropdown." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="has-warning">
                                                        <div class="has-warning">
                                                            <select name="transfer" id="transfer" @isset($transferExists) required @endisset class="select2_transfer form-control input-lg {{ $errors->has('transfer') ? ' is-invalid' : '' }}" @if (@isset($transferExists) == false) disabled @endif>
                                                                <option></option>
                                                                @foreach($transfers as $transfer)
                                                                    <option @isset($transferExists) @if($transferExists->id == $transfer->id) selected @endif @endisset value="{{$transfer->id}}" >{{$transfer->reference}} [{{$transfer->amount}}] ({{$transfer->date}})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <hr>


                                    {{--attachments--}}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                @if ($errors->has('frequency'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('frequency') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="col-md-4">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="is_recurring" name="is_recurring" type="checkbox" class="enableRecurring {{ $errors->has('is_recurring') ? ' is-invalid' : '' }}">
                                                        <label for="is_recurring">Recurring</label> <span><i data-toggle="tooltip" data-placement="right" title="Check this option if it's a recurring expense." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="has-warning">
                                                        <select name="frequency" id="frequency" class="select2_frequency form-control input-lg {{ $errors->has('frequency') ? ' is-invalid' : '' }}" disabled>
                                                            <option></option>
                                                            @foreach($frequencies as $frequency)
                                                                <option value="{{$frequency->id}}" >{{$frequency->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>frequency</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @if ($errors->has('start_date'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('start_date') }}</strong>
                                                    </span>
                                                    @endif
                                                    <div class="has-warning" id="data_1">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <input type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" class="form-control input-lg {{ $errors->has('start_date') ? ' is-invalid' : '' }}" disabled>
                                                        </div>
                                                        <i> start date.</i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    @if ($errors->has('end_date'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('end_date') }}</strong>
                                                    </span>
                                                    @endif
                                                    <div class="has-warning" id="data_1">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <input type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" class="form-control input-lg {{ $errors->has('end_date') ? ' is-invalid' : '' }}" disabled>
                                                        </div>
                                                        <i> end date (leave blank if no end date)</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--  Customer  --}}
                                            <div class="has-warning">
                                                @if ($errors->has('status'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('status') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="has-warning">
                                                    <select name="status" class="select2_status form-control input-lg {{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                                        <option></option>
                                                        @foreach($expenseStatuses as $status)
                                                            <option value="{{$status->id}}" >{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>status</i> <span><i data-toggle="tooltip" data-placement="right" title="Billable means that the cost can be at the clients expense, non billable however is charged to the business account selected." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                </div>
                                                <br>
                                                <div class="has-warning">
                                                    @if ($errors->has('payment_schedule'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('payment_schedule') }}</strong>
                                                        </span>
                                                    @endif
                                                    <select name="payment_schedule" class="select2_payment_schedule form-control input-lg {{ $errors->has('payment_schedule') ? ' is-invalid' : '' }}">
                                                        <option></option>
                                                        @foreach($paymentSchedules as $paymentSchedule)
                                                            <option value="{{$paymentSchedule->id}}"> {{$paymentSchedule->name}} [{{$paymentSchedule->period}}]</option>
                                                        @endforeach
                                                    </select>
                                                    <i>payment schedule</i> <span><i data-toggle="tooltip" data-placement="right" title="Select this if this estimate will have a payment schedule." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                </div>

                                            </div>

                                            <br>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                @if ($errors->has('notes'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('notes') }}</strong>
                                                </span>
                                                @endif
                                                <textarea required name="notes" placeholder="Notes" class="form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}" rows="7">{{ old('name') }}</textarea>
                                                <i>notes</i>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('Save') }}</button>
                                    </div>

                                </form>

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

<!-- Data picker -->
<script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Chosen -->
<script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

<!-- JSKnob -->
<script src="{{ asset('inspinia') }}/js/plugins/jsKnob/jquery.knob.js"></script>

<!-- Input Mask-->
<script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- NouSlider -->
<script src="{{ asset('inspinia') }}/js/plugins/nouslider/jquery.nouislider.min.js"></script>

<!-- Switchery -->
<script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

<!-- IonRangeSlider -->
<script src="{{ asset('inspinia') }}/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

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

<!-- TouchSpin -->
<script src="{{ asset('inspinia') }}/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

{{--  Get due date to populate   --}}
    <script>
        $(document).ready(function() {
            // Set date
            console.log('var');
            var today = new Date();
            console.log(today);
            var dd = today.getDate();
            var mm = today.getMonth();
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            mm ++;
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date_today = mm + '/' + dd + '/' + yyyy;
            var time_curr = h + ':' + m;
            console.log(time_curr);
            document.getElementById("date").value = date_today;
            document.getElementById("start_date").value = date_today;
            document.getElementById("end_date").value = date_today;

            // Set time
        });

    </script>

<script>
    $(document).ready(function(){

        $(".select2_account").select2({
            placeholder: "Select Account",
            allowClear: true
        });
        $(".select2_campaign").select2({
            placeholder: "Select Campaign",
            allowClear: true
        });
        $(".select2_payment_schedule").select2({
            placeholder: "Select Payment Schedule",
            allowClear: true
        });
        $(".select2_expense_account").select2({
            placeholder: "Select Expense Account",
            allowClear: true
        });
        $(".select2_frequency").select2({
            placeholder: "Select Frequency",
            allowClear: true
        });
        $(".select2_sale").select2({
            placeholder: "Select Sale",
            allowClear: true
        });
        $(".select2_status").select2({
            placeholder: "Select Status",
            allowClear: true
        });
        $(".select2_transfer").select2({
            placeholder: "Select Transfer",
            allowClear: true
        });


        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });



    });

</script>

{{-- to do start time and end time --}}
<script>
    $(document).ready(function() {
        $('.enableRecurring').on('click',function(){

            if (document.getElementById('is_recurring').checked) {
                // enable end_time input
                document.getElementById("frequency").disabled = false;
                document.getElementById("start_date").disabled = false;
                document.getElementById("end_date").disabled = false;
            } else {
                // disable input
                document.getElementById("frequency").disabled = true;
                document.getElementById("start_date").disabled = true;
                document.getElementById("end_date").disabled = true;
            }
        });
        $('.enableSale').on('click',function(){
            if (document.getElementById('is_sale').checked) {
                // enable end_time input
                document.getElementById("sale").disabled = false;
            } else {
                // disable input
                document.getElementById("sale").disabled = true;
            }
        });
        $('.enableTransfer').on('click',function(){

            if (document.getElementById('is_transfer').checked) {
                // enable end_time input
                document.getElementById("transfer").disabled = false;
            } else {
                // disable input
                document.getElementById("transfer").disabled = true;
            }
        });
        $('.enableCampaign').on('click',function(){

            if (document.getElementById('is_campaign').checked) {
                // enable end_time input
                document.getElementById("campaign").disabled = false;
            } else {
                // disable input
                document.getElementById("campaign").disabled = true;
            }
        });

    });

</script>

<script>
    var subTotal = [];
    var adjustedValue;
    function itemSelected (e) {
        var selectedItemQuantity = e.options[e.selectedIndex].getAttribute("data-product-quantity");
        var selectItemPrice = e.options[e.selectedIndex].getAttribute("data-product-selling-price");
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var itemQuantity = selectedTr.getElementsByClassName("item-quantity");
        var itemRate = selectedTr.getElementsByClassName("item-rate");
        // -20 is an arbitrary value set to indicate that an item is a service and so has no limit
        if (selectedItemQuantity === "-20") {
            itemQuantity[0].setAttribute("max", 100000000);
        } else {
            itemQuantity[0].setAttribute("max", selectedItemQuantity);
        };
        itemRate[0].value = selectItemPrice;
    };
    function changeItemQuantity (e) {
        var quantityValue;
        if (e.value.isEmpty) {
            quantityValue = 0;
        } else {
            quantityValue = e.value;
        };
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var itemRateInputField = selectedTr.getElementsByClassName("item-rate");
        var itemTotalInputField = selectedTr.getElementsByClassName("item-total");
        var itemRate;
        if (itemRateInputField[0].value.isEmpty) {
            itemRate = 0;
        } else {
            itemRate = itemRateInputField[0].value;
        };
        itemTotalInputField[0].value = quantityValue * itemRate;
        itemTotalChange();
    };
    function changeItemRate (e) {
        var itemRate;
        if (e.value.isEmpty) {
            itemRate = 0;
        } else {
            itemRate = e.value;
        };
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var itemQuantityInputField = selectedTr.getElementsByClassName("item-quantity");
        var itemTotalInputField = selectedTr.getElementsByClassName("item-total");
        var quantityValue;
        if (itemQuantityInputField[0].value.isEmpty) {
            quantityValue = 0;
        } else {
            quantityValue = itemQuantityInputField[0].value;
        };
        itemTotalInputField[0].value = quantityValue * itemRate;
        itemTotalChange();
    };
    var tableValueArrayIndex = 1;
    function addTableRow () {
        var table = document.getElementById("expense_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        var fourthCell = row.insertCell(3);
        var fifthCell = row.insertCell(4);
        firstCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][item]' type='text' class='form-control input-lg item-detail'>";
        secondCell.innerHTML = "<input oninput = 'changeItemQuantity(this)' name='item_details["+tableValueArrayIndex+"][quantity]' type='number' class='form-control input-lg item-quantity' value = '0' min = '0'>";
        thirdCell.innerHTML = "<input oninput = 'changeItemRate(this)' name='item_details["+tableValueArrayIndex+"][rate]' type='number' class='form-control input-lg item-rate' placeholder='E.g +10, -10' value = '0' min = '0'>";
        fourthCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][amount]' type='number' class='form-control input-lg item-total' placeholder='E.g +10, -10' value = '0' min = '0'>";
        fifthCell.innerHTML = "<span><i onclick = 'removeSelectedRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
        fifthCell.setAttribute("style", "width: 1em;")
        tableValueArrayIndex++;
    };
    function removeSelectedRow (e) {
        var selectedParentTd = e.parentElement.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var selectedTable = selectedTr.parentElement;
        var removed = selectedTr.getElementsByClassName("item-select")[0].getAttribute("name");
        adjustTableInputFieldsIndex(removed);
        selectedTable.removeChild(selectedTr);
        tableValueArrayIndex--;
        itemTotalChange();
    };
    function adjustTableInputFieldsIndex (removedFieldName) {
        // Fields whose values are submitted are:
        // 1. item_details[][item]
        // 2. item_details[][quantity]
        // 3. item_details[][rate]
        // 4. item_details[][amount]
        var displacement = 0;
        var removedIndex;
        while (displacement < tableValueArrayIndex) {
            if (removedFieldName == "item_details["+displacement+"][item]"){
                removedIndex = displacement;
            } else {
                var itemField = document.getElementsByName("item_details["+displacement+"][item]");
                var quantityField = document.getElementsByName("item_details["+displacement+"][quantity]");
                var rateField = document.getElementsByName("item_details["+displacement+"][rate]");
                var amountField = document.getElementsByName("item_details["+displacement+"][amount]");
                if (removedIndex) {
                    if (displacement > removedIndex) {
                        var newIndex = displacement - 1;
                        itemField[0].setAttribute("name", "item_details["+newIndex+"][item]");
                        quantityField[0].setAttribute("name", "item_details["+newIndex+"][quantity]");
                        rateField[0].setAttribute("name", "item_details["+newIndex+"][rate]");
                        amountField[0].setAttribute("name", "item_details["+newIndex+"][amount]");
                    };
                };
            };
            displacement++;
        };
    };
    function itemTotalChange () {
        subTotal = [];
        var itemTotals = document.getElementsByClassName("item-total");
        for (singleTotal of itemTotals) {
            subTotal.push(Number(singleTotal.value));
        };
        var itemSubTotal = subTotal.reduce((a, b) => a + b, 0);
        document.getElementById("items-subtotal").value = itemSubTotal;
        document.getElementById("grand-total").innerHTML = itemSubTotal;
        var adjustedValueInputValue = document.getElementById("adjustment-value").value;
        if (adjustedValueInputValue.isEmpty) {
            adjustedValue = 0
        } else {
            adjustedValue = adjustedValueInputValue;
        };
        document.getElementById("adjustment-value").innerHTML = adjustedValue;
        var adjustedTotal = Number(adjustedValue) + Number(itemSubTotal);
        document.getElementById("grand-total").value = adjustedTotal;
    };
</script>
@endsection
