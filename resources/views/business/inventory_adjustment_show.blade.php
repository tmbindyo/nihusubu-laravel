@extends('business.layouts.app')

@section('title', 'Inventory Adjustment')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Inventory Adjustment</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('business.calendar',$institution->portal)}}">Home</a>
                </li>
                <li>
                    Inventory
                </li>
                <li class="active">
                    <a href="{{route('business.inventory.adjustments',$institution->portal)}}">Inventory Adjustments</a>
                </li>
                <li class="active">
                    <strong>Inventory Adjustment</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2>{{$inventoryAdjustment->inventory_adjustment_number}}</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary">{{$inventoryAdjustment->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{$inventoryAdjustment->user->name}}</dd>
                                        <dt>Reason:</dt> <dd>  {{$inventoryAdjustment->reason->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        @if($inventoryAdjustment->updated_at != $inventoryAdjustment->created_at)
                                            <dt>Last Updated:</dt> <dd>{{$inventoryAdjustment->updated_at}}</dd>
                                        @endif
                                        <dt>Created:</dt> <dd> {{$inventoryAdjustment->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Description:</dt>
                                        <dd>
{{--                                            <div class="progress progress-striped active m-b-sm">--}}
{{--                                                <div style="width: 60%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
                                            <small>{{$inventoryAdjustment->description}}</small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab-2" data-toggle="tab">Adjusted Products</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-2">

                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Initial</th>
                                                            <th>Adjusted</th>
                                                            <th>Subsequent</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($inventoryAdjustment->inventoryAdjustmentProducts as $product)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{route('business.product.show',['portal'=>$institution->portal, 'id'=>$product->product->id])}}" class="text-navy">
                                                                        {{$product->product->name}}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    {{$product->initial_quantity}}
                                                                </td>
                                                                <td>
                                                                    {{$product->quantity}}
                                                                </td>
                                                                <td>
                                                                    {{$product->subsequent_quantity}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

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
