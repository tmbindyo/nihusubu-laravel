@extends('business.layouts.app')


@if($sale->is_estimate ==1)
    @section('title', ' Mail Estimate '.$sale->reference)
@elseif($sale->is_invoice ==1)
    @section('title', ' Mail Invoice '.$sale->reference)
@elseif($sale->is_sale==1)
    @section('title', ' Mail Sale '.$sale->reference)
@elseif($sale->is_order==1)
    @section('title', ' Mail Order '.$sale->reference)
@else
    @section('title', ' Mail Sale '.$sale->reference)
@endif

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>@if($sale->is_estimate ==1) Estimate @elseif($sale->is_invoice ==1) Invoice @elseif($sale->is_sale==1) Sale @elseif($sale->is_order==1) Order @else Sale @endif</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('business.calendar',$institution->portal)}}">Home</a></strong>
                </li>
                <li>
                    Sales
                </li>
                @if($sale->is_estimate ==1)
                    <li>
                        <strong><a href="{{route('business.invoices',$institution->portal)}}">Estimates</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{ route('business.invoice.show', ['portal'=>$institution->portal, 'id'=>$sale->id]) }}">Estimate</a></strong>
                    </li>
                @elseif($sale->is_invoice ==1)
                    <li>
                        <strong><a href="{{route('business.invoices',$institution->portal)}}">Invoices</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{ route('business.invoice.show', ['portal'=>$institution->portal, 'id'=>$sale->id]) }}">Invoice</a></strong>
                    </li>
                @elseif($sale->is_sale==1)
                    <li>
                        <strong><a href="{{route('business.sales',$institution->portal)}}">Sales</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{ route('business.sale.show', ['portal'=>$institution->portal, 'id'=>$sale->id]) }}">Sale</a></strong>
                    </li>
                @elseif($sale->is_order == 1)
                    <li>
                        <strong><a href="{{route('business.orders',$institution->portal)}}">Orders</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{ route('business.order.show', ['portal'=>$institution->portal, 'id'=>$sale->id]) }}">Order</a></strong>
                    </li>
                @else
                    <li>
                        <strong><a href="{{route('business.sales',$institution->portal)}}">Sales</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{ route('business.sale.show', ['portal'=>$institution->portal, 'id'=>$sale->id]) }}">Sale</a></strong>
                    </li>
                @endif



            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">
                @can('add brand')
                    <a data-toggle="modal" data-target="#emailRegistration" class="btn btn-primary pull-right btn-round btn-outline"> <span class="fa fa-plus"></span> Email </a>
                @endcan
                @can('add brand')
                    <a data-toggle="modal" data-target="#smsRegistration" class="btn btn-primary pull-right btn-round btn-outline"> <span class="fa fa-plus"></span> SMS </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <h3 class="text-center">Sale Summary</h3>
                            <div class="col-sm-6">
                                <h5>From:</h5>
                                <address>
                                    <strong>{{$institution->name}}</strong><br>
                                    {{$institution->address->address_line_1}}<br>
                                    {{$institution->address->town}}, {{$institution->address->street}}<br>
                                    <abbr title="Phone">P:</abbr> {{$institution->phone_number}}<br>
                                    <abbr title="Email">E:</abbr> {{$institution->email}}
                                </address>
                            </div>

                            <div class="col-sm-6 text-right">
                                <h4>Sale No.</h4>
                                <h4 class="text-navy">{{$sale->reference}}</h4>
                                @if(isset($sale->contact))
                                    <span>To:</span>
                                    <address>
                                        <strong>{{$sale->contact->last_name}} {{$sale->contact->first_name}}</strong><br>
                                        <abbr title="Phone">P:</abbr> {{$sale->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$sale->contact->email}}
                                    </address>
                                @endif
                                {{-- <address>
                                    <strong>Corporate, Inc.</strong><br>
                                    112 Street Avenu, 1080<br>
                                    Miami, CT 445611<br>
                                    <abbr title="Phone">P:</abbr> (120) 9000-4321
                                </address> --}}
                                <p>
                                    <span><strong>Invoice Date:</strong> {{$sale->date}} </span><br/>
                                    <span><strong>Due Date:</strong> {{$sale->due_date}} </span>
                                </p>
                            </div>
                        </div>

                        <div class="table-responsive m-t">
                            <table class="table invoice-table">
                                <thead>
                                <tr>
                                    <th>Item List</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sale->saleProducts as $product)
                                    <tr>
                                        <td>
                                            <div>
                                                <strong>
                                                    {{$product->product->name}}
                                                </strong>
                                            </div>
                                            {{--                                            <small>{!!$product->product->description!!}</small>--}}
                                        </td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->rate}}</td>
                                        <td>{{$product->amount}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->

                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>Sub Total :</strong></td>
                                <td>{{$sale->subtotal}}</td>
                            </tr>
                            <tr>
                                <td><strong>TAX :</strong></td>
                                <td>{{$sale->tax}}</td>
                            </tr>
                            <tr>
                                <td><strong>Discount :</strong></td>
                                <td>{{$sale->discount}}</td>
                            </tr>
                            <tr>
                                <td><strong>TOTAL :</strong></td>
                                <td>{{$sale->total}}</td>
                            </tr>
                            </tbody>
                        </table>
                        {{-- <div class="text-right">
                            <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                        </div> --}}

                        <div class="well m-t"><strong>Notes</strong>
                            {{$sale->customer_notes}}
                        </div>

                        <div class="well m-t"><strong>Terms and Conditions</strong>
                            {{$sale->terms_and_conditions}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('business.layouts.modals.email_create')
@include('business.layouts.modals.sms_create')

@section('js')
<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<!-- SUMMERNOTE -->
<script src="{{ asset('inspinia') }}/js/plugins/summernote/summernote.min.js"></script>
<script>
    $(document).ready(function(){

        $('.summernote').summernote();

    });
</script>

@endsection
