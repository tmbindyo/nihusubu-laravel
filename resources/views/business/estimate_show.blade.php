@extends('business.layouts.app')

@section('title', ' Estimate')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Estimate</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('business.dashboard')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('business.sales')}}">Sales</a>
                    </li>
                    <li>
                        <a href="{{route('business.estimates')}}">Estimates</a>
                    </li>
                    <li class="active">
                        <strong>Estimate</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    @if($estimate->is_invoice == 0)
                        <a href="{{route('business.estimate.edit',$estimate->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
                        <a href="{{route('business.estimate.convert.to.invoice',$estimate->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-shopping-cart"></i> Convert to Invoice </a>
                    @else
                        <a href="{{route('business.invoice.show',$estimate->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-shopping-cart"></i> View Invoice </a>

                    @endif
                    <a href="{{route('business.estimate.print',$estimate->id)}}" target="_blank" class="btn btn-success btn-outline"><i class="fa fa-print"></i> Print </a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">



            <div class="row">
                <div class="col-md-9">

                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="pull-right">(<strong>{{$estimate->sale_products_count}}</strong>) items</span>
                            <h5>Items</h5>
                        </div>
                        @foreach($estimate->sale_products as $product)
                            <div class="ibox-content">


                            <div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                    <tr>
                                        <td width="90">
                                            <div class="cart-product-imitation">
                                            </div>
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="{{route('business.product.show',$product->product->id)}}" class="text-navy">
                                                    {{$product->product->name}}
                                                </a>
                                            </h3>

                                            {!! $product->product->description !!}

                                            <div class="m-t-sm">
                                                <a href="{{route('business.estimate.product.delete',$product->id)}}" class="text-warning"><i class="fa fa-trash"></i> Remove item</a>
                                            </div>
                                        </td>

                                        <td>
                                            <h4>
                                                {{$product->rate}}
                                            </h4>
                                        </td>
                                        <td width="65">
                                            <input type="text" class="form-control" value="{{$product->quantity}}" readonly>
                                        </td>
                                        <td>
                                            <h4>
                                                {{$product->amount}}
                                            </h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        @endforeach
                        <div class="ibox-content">


                        </div>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold">
                                {{$estimate->total}}
                            </h2>

                            <hr/>
                            <span>
                                Tax
                            </span>
                            <h2 class="font-bold">
                                {{$estimate->tax}}
                            </h2>

                            <hr/>
                            <span>
                                Discount
                            </span>
                            <h2 class="font-bold">
                                {{$estimate->discount}}
                            </h2>

                            <hr/>
                            <span class="text-muted small">
                                @if($estimate->customer->is_business == 1)
                                    {{--  if business  --}}
                                    <address>
                                        <strong>{{$estimate->customer->company_name}}</strong><br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br>
                                        <abbr title="Phone">P:</abbr> {{$estimate->customer->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$estimate->customer->email}}
                                    </address>
                                @else
                                    {{--  if not business  --}}
                                    <address>
                                        <strong>{{$estimate->customer->first_name}} {{$estimate->customer->last_name}}</strong><br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br>
                                        <abbr title="Phone">P:</abbr> {{$estimate->customer->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$estimate->customer->email}}
                                    </address>
                                @endif
                            </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-mail-forward"></i> Send</a>
                                    <a href="#" class="btn btn-danger btn-sm"> Cancel</a>
                                </div>
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

@endsection
