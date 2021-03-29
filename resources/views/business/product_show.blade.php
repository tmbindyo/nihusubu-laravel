@extends('business.layouts.app')

@section('title', 'Product '.$product->name)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Product {{$product->name}}</h2>
        <ol class="breadcrumb">
            <li>
                <strong><a href="{{route('business.calendar',$institution->portal)}}">Home</a></strong>
            </li>
            <li>
                <a href="#">Products</a>
            </li>
            <li>
                <a href="{{route('business.products',$institution->portal)}}">Products</a>
            </li>
            <li class="active">
                <strong>Product {{$product->name}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            @can('edit product')
                <a href="{{route('business.product.edit',['portal'=>$institution->portal, 'id'=>$product->id])}}" class="btn btn-outline btn-primary"><i class="fa fa-pencil"></i> Edit </a>
            @endcan
        </div>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">

    {{-- infographics --}}
    <div class="wrapper wrapper-content project-manager">

        <div class="row">

            <div class="col-sm-8">
                <h1 class="m-b-xs">
                    26,900
                </h1>
                <small>
                    Sales in current month
                </small>
                <div id="sparkline1" class="m-b-sm"></div>
                <div class="row">
                    <div class="col-xs-2">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>236 321.80</h4>
                    </div>

                    <div class="col-xs-2">
                        <small class="stats-label">% New Visits</small>
                        <h4>46.11%</h4>
                    </div>
                    <div class="col-xs-2">
                        <small class="stats-label">Last week</small>
                        <h4>432.021</h4>
                    </div>
                    <div class="col-xs-2">
                        <small class="stats-label">Pages / Visit</small>
                        <h4>166 781.80</h4>
                    </div>

                    <div class="col-xs-2">
                        <small class="stats-label">% New Visits</small>
                        <h4>22.45%</h4>
                    </div>
                    <div class="col-xs-2">
                        <small class="stats-label">Last week</small>
                        <h4>862.044</h4>
                    </div>
                </div>

            </div>
{{--            <div class="col-sm-4">--}}
{{--                <h1 class="m-b-xs">--}}
{{--                    98,100--}}
{{--                </h1>--}}
{{--                <small>--}}
{{--                    Sales in last 24h--}}
{{--                </small>--}}
{{--                <div id="sparkline2" class="m-b-sm"></div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xs-4">--}}
{{--                        <small class="stats-label">Pages / Visit</small>--}}
{{--                        <h4>166 781.80</h4>--}}
{{--                    </div>--}}

{{--                    <div class="col-xs-4">--}}
{{--                        <small class="stats-label">% New Visits</small>--}}
{{--                        <h4>22.45%</h4>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-4">--}}
{{--                        <small class="stats-label">Last week</small>--}}
{{--                        <h4>862.044</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
            <div class="col-sm-4">

                <div class="row m-t-xs">
                    <div class="col-xs-6">
                        <h5 class="m-b-xs">Income last month</h5>
                        <h1 class="no-margins">160,000</h1>
                        <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                    </div>
                    <div class="col-xs-6">
                        <h5 class="m-b-xs">Sales current year</h5>
                        <h1 class="no-margins">42,120</h1>
                        <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                    </div>
                </div>


                <table class="table small m-t-sm">
                    <tbody>
                    <tr>
                        <td>
                            <strong>142</strong> Total Sold

                        </td>
                        <td>
                            <strong>22</strong> Total Sales
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>61</strong> Total Orders
                        </td>
                        <td>
                            <strong>54</strong> Total Orders Sale
                        </td>
                    </tr>
                    <tr>
                        @if($product->is_service == "1" || $product->is_inventory == "0")
                        @else
                            <td>
                                <strong>{{$product->stock_on_hand->first()->stock_on_hand}} {{$product->unit->name}}</strong> Stock
                            </td>
                        @endif
                        @if($product->reorder_level)
                            <td>
                                <strong>{{$product->reorder_level}} {{$product->unit->name}}</strong> Reorder Level
                            </td>
                        @endif
                    </tr>
                    </tbody>
                </table>



            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="small pull-left col-md-3 m-l-lg m-t-md">
{{--                    <strong>Sales char</strong> have evolved over the years sometimes.--}}
                </div>
                <div class="small pull-right col-md-3 m-t-md text-right">
{{--                    <strong>There are many</strong> variations of passages of Lorem Ipsum available, but the majority have suffered.--}}
                </div>
                <div class="flot-chart m-b-xl">
                    <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-2">--}}
{{--                <div class="ibox float-e-margins">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-success pull-right">Monthly</span>--}}
{{--                        <h5>Views</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}
{{--                        <h1 class="no-margins">386,200</h1>--}}
{{--                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
{{--                        <small>Total views</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-2">--}}
{{--                <div class="ibox float-e-margins">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-info pull-right">Annual</span>--}}
{{--                        <h5>Orders</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}
{{--                        <h1 class="no-margins">80,800</h1>--}}
{{--                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>--}}
{{--                        <small>New orders</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-4">--}}
{{--                <div class="ibox float-e-margins">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-primary pull-right">Today</span>--}}
{{--                        <h5>visits</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <h1 class="no-margins">406,42</h1>--}}
{{--                                <div class="font-bold text-navy">44% <i class="fa fa-level-up"></i> <small>Rapid pace</small></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <h1 class="no-margins">206,12</h1>--}}
{{--                                <div class="font-bold text-navy">22% <i class="fa fa-level-up"></i> <small>Slow pace</small></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="ibox float-e-margins">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <h5>Monthly income</h5>--}}
{{--                        <div class="ibox-tools">--}}
{{--                            <span class="label label-primary">Updated 12.2015</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content no-padding">--}}
{{--                        <div class="flot-chart m-t-lg" style="height: 55px;">--}}
{{--                            <div class="flot-chart-content" id="flot-chart1"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}

{{--            <div class="col-md-3">--}}
{{--                <div class="widget style1 navy-bg">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-4">--}}
{{--                            <i class="fa fa-dollar fa-5x"></i>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-8 text-right">--}}
{{--                            <span> Sales </span>--}}
{{--                            <h2 class="font-bold">{{$product->sale_products_count}}</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-3">--}}
{{--                <div class="widget style1 navy-bg">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-4">--}}
{{--                            <i class="fa fa-shopping-cart fa-5x"></i>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-8 text-right">--}}
{{--                            <span> Orders </span>--}}
{{--                            <h2 class="font-bold">{{$product->order_products_count}}</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-3">--}}
{{--                <div class="widget style1 navy-bg">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-4">--}}
{{--                            <i class="fa fa-database fa-5x"></i>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-8 text-right">--}}
{{--                            <span> Stock On Hand </span>--}}
{{--                            @if($product->is_service == "1" || $product->is_inventory == "0")--}}
{{--                                <h2 class="font-bold">N/A</h2>--}}
{{--                            @else--}}
{{--                                        <h2 class="font-bold">{{$product->stock_on_hand->first()->stock_on_hand}} {{$product->unit->name}}</h2>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @if($product->is_service == "0")--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="widget style1 navy-bg">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-4">--}}
{{--                                <i class="fa fa-level-down fa-5x"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-8 text-right">--}}
{{--                                <span> Reorder Level </span>--}}
{{--                                <h2 class="font-bold">{{$product->reorder_level}} {{$product->unit->name}}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if($product->is_service == "0")--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="widget style1 navy-bg">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-4">--}}
{{--                                <i class="fa fa-archive fa-5x"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-8 text-right">--}}
{{--                                <span> Restocks </span>--}}
{{--                                <h2 class="font-bold">{{$product->restock_count}}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--        </div>--}}
    </div>

    {{-- product description --}}
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox product-detail">
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-4">

                            <div class="carousel slide" id="carousel1">
                                <div class="carousel-inner">
                                @foreach($product->productImages as $image)
                                        <div class="item @if ($loop->first) active @endif">
                                            <img alt="image" class="img-responsive" src="{{asset('storage')}}/{{$image->upload->small_thumbnail}}">
                                            <div class="carousel-caption">
                                                <a class="" href=""><i class="fa fa-trash fa-3x"></i> </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a data-slide="prev" href="#carousel1" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel1" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>

                        </div>
                        <div class="col-md-8">

                            <h2 class="font-bold m-b-xs">
                                {{$product->name}}
                            </h2>
                            <small>{{$product->unit->name}}</small>
                            <div class="m-t-md">
                                <h2 class="product-main-price">{{$institution->currency->name}} {{$product->taxed_selling_price}} <small class="text-muted">{{$product->taxMethod->name}} [{{$product->selling_price}}]</small> </h2>
                            </div>
                            <hr>

                            <h4>Product description</h4>

                            <div class="small text-muted">
                                {!!$product->description!!}
                            </div>
                            <hr>

                            {{--  todo time to complete a service  --}}

                            <div>
                                <div class="btn-group">
                                    {{-- <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Schedule Delivery</button> --}}
                                    {{-- <a href="{{route('business.expense.create',$institution->portal)}}" class="btn btn-warning btn-sm"><i class="fa fa-cart-plus"></i> Update stock</a> --}}
                                    @can('delete product')
                                        @if ($product->status_id == 'bc6170bf-299a-44f5-8362-8cdeed1f47b0')
                                            <a href="{{ route('business.product.restore', ['portal'=>$institution->portal, 'id'=>$product->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Restore </a>
                                        @else
                                            <a href="{{ route('business.product.delete', ['portal'=>$institution->portal, 'id'=>$product->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Deactivate </a>
                                        @endif
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
                                        <h3 class="font-bold">{{$product->user->name}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget style1 {{$product->status->label}}">
                                <div class="row vertical-align">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ellipsis-v fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h3 class="font-bold">{{$product->status->name}}</h3>
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
                                        <h3 class="font-bold">{{$product->created_at}}</h3>
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
                                        <h3 class="font-bold">{{$product->updated_at}}</h3>
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
                                            <li class="active"><a href="#inventory-adjustments" data-toggle="tab">Inventory Adjustments</a></li>
                                            <li class=""><a href="#item" data-toggle="tab">Items</a></li>
                                            <li class=""><a href="#stock" data-toggle="tab">Stock</a></li>
                                            <li class=""><a href="#sales" data-toggle="tab">Sales</a></li>
                                            <li class=""><a href="#restock" data-toggle="tab">Restock</a></li>
                                            <li class=""><a href="#transfer-orders" data-toggle="tab">Transfer Orders</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        {{--  to do show stock from different warehouses  --}}
                                        <div class="tab-pane active" id="inventory-adjustments">
                                            @can('view inventory adjustments')
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-inventory-adjustments" >
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Initial</th>
                                                            <th>Adjustment</th>
                                                            <th>Subsequent</th>
                                                            <th>Adjustment Type</th>
                                                            <th>Adjustment</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($product->inventoryAdjustmentProducts as $inventory_adjustment_product)
                                                            <tr class="gradeX">
                                                                <td>{{$inventory_adjustment_product->created_at}}</td>
                                                                {{--  Quantity based  --}}
                                                                @if($inventory_adjustment_product->inventoryAdjustment->is_value_adjustment == 0)
                                                                    <td>{{$inventory_adjustment_product->initial_quantity}}</td>
                                                                    <td>{{$inventory_adjustment_product->subsequent_quantity}}</td>
                                                                    <td>{{$inventory_adjustment_product->quantity}}</td>
                                                                    <td><p><span class="label label-info">Quantity Based</span></p></td>
                                                                    {{--  Value based  --}}
                                                                @else
                                                                    <td>{{$inventory_adjustment_product->initial_warehouse_value}}</td>
                                                                    <td>{{$inventory_adjustment_product->subsequent_warehouse_value}}</td>
                                                                    <td>{{$inventory_adjustment_product->value}}</td>
                                                                    <td><p><span class="label label-info">Value Based</span></p></td>
                                                                @endif
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('business.inventory.adjustment.show', ['portal'=>$institution->portal, 'id'=>$inventory_adjustment_product->inventory_adjustment_id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Initial</th>
                                                            <th>Adjustment</th>
                                                            <th>Subsequent</th>
                                                            <th>Adjustment Type</th>
                                                            <th>Adjustment</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            @endcan
                                        </div>
                                        <div class="tab-pane" id="item">
                                            @can('view item')
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-item" >
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Qty</th>
                                                            <th>SKU</th>
                                                            <th>Stock on Hand</th>
                                                            <th>Reorder Level</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($product->productItems as $item)
                                                            <tr class="gradeA">
                                                                <td>{{$item->item->name}}</td>
                                                                <td>{{$item->quantity}}</td>
                                                                <td>{{$item->item->unit->name}}</td>

                                                                @if($item->item->is_service == "1" || $item->item->is_inventory == "0")
                                                                    <td>N/A</td>
                                                                @else
                                                                    <td>{{$item->item->stock_on_hand->first()->stock_on_hand}}</td>
                                                                @endif

                                                                <td class="center">@if($item->item->reorder_level) {{$item->item->reorder_level}} @else N/A @endif</td>
                                                                <td class="center">
                                                                    <p>@if ($item->item->is_service==1) Service: @elseif($item->item->is_service==0)Item: @endif <span class="label {{$item->item->status->label}}">{{$item->item->status->name}}</span></p>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        @can('view item')
                                                                            <a href="{{ route('business.item.show', ['portal'=>$institution->portal, 'id'=>$item->item->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Qty</th>
                                                            <th>SKU</th>
                                                            <th>Stock on Hand</th>
                                                            <th>Reorder Level</th>
                                                            <th>Status</th>
                                                            <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            @endcan
                                        </div>
                                        <div class="tab-pane" id="stock">
                                            @can('view stock')
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-stock" >
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Quantity</th>
                                                            <th>Warehouse</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($product->inventory as $inventory)
                                                            <tr class="gradeX">
                                                                <td>{{$inventory->date}}</td>
                                                                <td>{{$inventory->quantity}}</td>
                                                                <td class="center">{{$inventory->warehouse->name}}</td>
                                                                <td class="center"><span class="label {{$inventory->status->label}}">{{$inventory->status->name}}</span></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Quantity</th>
                                                            <th>Rate</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            @endcan
                                        </div>
                                        <div class="tab-pane" id="sales">
                                            @can('view sales')
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-sales" >
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Quantity</th>
                                                            <th>Rate</th>
                                                            <th>Status</th>
                                                            <th>Sale</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($product->saleProducts as $sale)
                                                            <tr class="gradeX">
                                                                <td>{{$sale->created_at}}</td>
                                                                <td>{{$sale->quantity}}</td>
                                                                <td class="center">{{$sale->rate}}</td>
                                                                <td class="center"> <span class="label {{$sale->status->label}}">{{$sale->status->name}}</span></td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('business.sale.show', ['portal'=>$institution->portal, 'id'=>$sale->sale_id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Quantity</th>
                                                            <th>Rate</th>
                                                            <th>Status</th>
                                                            <th>Sale</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            @endcan
                                        </div>
                                        <div class="tab-pane" id="restock">
                                            @can('view restock')
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-restock" >
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Initial Quantity</th>
                                                            <th>Restock Quantity</th>
                                                            <th>Total Value</th>
                                                            <th>Subsequent Quantity</th>
                                                            <th>Restock</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($product->restock as $restock)
                                                            <tr class="gradeX">
                                                                <td>{{$restock->created_at}}</td>
                                                                <td>{{$restock->initial_warehouse_amount}}</td>
                                                                <td>{{$restock->quantity}}</td>
                                                                <td>{{$restock->total_value}}</td>
                                                                <td class="center">{{$restock->subsequent_warehouse_amount}}</td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        @if($restock->is_opening_stock == 0)
                                                                            <a href="{{ route('business.expense.show', ['portal'=>$institution->portal, 'id'=>$restock->expenseItem->expense_id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                        @else
                                                                            <p><span class="label label-info">Opening Stock</span></p>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Initial Quantity</th>
                                                            <th>Restock Quantity</th>
                                                            <th>Total Value</th>
                                                            <th>Subsequent Quantity</th>
                                                            <th>Restock</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            @endcan
                                        </div>

                                        <div class="tab-pane" id="transfer-orders">
                                            @can('view transfer orders')
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-transfer-orders" >
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Source Warehouse</th>
                                                            <th>Source Initial</th>
                                                            <th>Source Subsequent</th>
                                                            <th>Destination Warehouse</th>
                                                            <th>Destination Initial</th>
                                                            <th>Destination Subsequent</th>
                                                            <th>Quantity</th>
                                                            <th>Transfer Order</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($product->transferOrderProducts as $transfer_order_product)
                                                            <tr class="gradeX">
                                                                <td>{{$transfer_order_product->created_at}}</td>
                                                                {{--  Quantity based  --}}
                                                                <td>{{$transfer_order_product->transferOrder->sourceWarehouse->name}}</td>
                                                                <td>{{$transfer_order_product->source_warehouse_initial_amount}}</td>
                                                                <td>{{$transfer_order_product->source_warehouse_subsequent_amount}}</td>
                                                                <td>{{$transfer_order_product->transferOrder->destinationWarehouse->name}}</td>
                                                                <td>{{$transfer_order_product->destination_warehouse_initial_amount}}</td>
                                                                <td>{{$transfer_order_product->destination_warehouse_subsequent_amount}}</td>
                                                                <td>{{$transfer_order_product->quantity}}</td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('business.transfer.order.show', ['portal'=>$institution->portal, 'id'=>$transfer_order_product->transfer_order_id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Source Warehouse</th>
                                                            <th>Source Initial</th>
                                                            <th>Source Subsequent</th>
                                                            <th>Destination Warehouse</th>
                                                            <th>Destination Initial</th>
                                                            <th>Destination Subsequent</th>
                                                            <th>Quantity</th>
                                                            <th>Transfer Order</th>
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

<!-- slick carousel-->
<script src="{{ asset('inspinia') }}/js/plugins/slick/slick.min.js"></script>
{{-- slider --}}
<script src="{{ asset('inspinia') }}/js/plugins/silder-master/jssor.slider.min.js"></script>

<!-- Flot -->
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/curvedLines.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/flot/jquery.flot.time.js"></script>

<!-- Peity -->
<script src="{{ asset('inspinia') }}/js/plugins/peity/jquery.peity.min.js"></script>
<script src="{{ asset('inspinia') }}/js/demo/peity-demo.js"></script>

<!-- jQuery UI -->
<script src="{{ asset('inspinia') }}/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Jvectormap -->
<script src="{{ asset('inspinia') }}/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Sparkline -->
<script src="{{ asset('inspinia') }}/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="{{ asset('inspinia') }}/js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="{{ asset('inspinia') }}/js/plugins/chartJs/Chart.min.js"></script>


<script>
    $(document).ready(function() {

        var sparklineCharts = function(){
            $("#sparkline1").sparkline([4, 3, 14, 34, 5, 9, 18, 3, 6, 34, 34, 34, 43, 43, 35, 44, 32, 44, 52, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

        };

        var sparkResize;

        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });

        sparklineCharts();

        var data1 = [
            [1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13]
        ];

        var data2 = [
            [1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5]
        ];

        $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis:{
                },
                yaxis: {
                },
                tooltip: false
            }
        );

    });
</script>

<script>
    var options = { $AutoPlay: 1 };
    var jssor_1_slider = new $JssorSlider$("jssor_1", options);
</script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-stock').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: '{{$product->name}}',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3 ]
                        }
                },
                {extend: 'pdf',
                    title: '{{$product->name}}',
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    $(document).ready(function(){
        $('.dataTables-item').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: '{{$product->name}} Items',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                },
                {extend: 'pdf',
                    title: '{{$product->name}} Items',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    $(document).ready(function(){
        $('.dataTables-sales').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: '{{$product->name}} Sales',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3 ]
                        }
                },
                {extend: 'pdf', title: '{{$product->name}} Sales',
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    $(document).ready(function(){
        $('.dataTables-restock').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: '{{$product->name}} Restocks',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                },
                {extend: 'pdf',
                    title: '{{$product->name}} Restocks',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    $(document).ready(function(){
        $('.dataTables-inventory-adjustments').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: '{{$product->name}} Inventory Adjustments',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                },
                {extend: 'pdf',
                    title: '{{$product->name}} Inventory Adjustments',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    $(document).ready(function(){
        $('.dataTables-transfer-orders').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel',
                    title: '{{$product->name}} Transfer Orders',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                },
                {extend: 'pdf',
                    title: '{{$product->name}} Transfer Orders',
                    exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>

<script>
    $(document).ready(function(){


        $('.product-images').slick({
            dots: true
        });

    });

</script>

@endsection
