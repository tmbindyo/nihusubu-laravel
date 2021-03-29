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
                                                    <li class="active"><a href="#composite-products" data-toggle="tab">Composite Products</a></li>
                                                    <li class=""><a href="#campaigns" data-toggle="tab">Campaigns</a></li>
                                                    <li class=""><a href="#contacts" data-toggle="tab">Contacts</a></li>
                                                    <li class=""><a href="#estimates" data-toggle="tab">Estimates</a></li>
                                                    <li class=""><a href="#expenses" data-toggle="tab">Expenses</a></li>
                                                    <li class=""><a href="#loans" data-toggle="tab">Loans</a></li>
                                                    <li class=""><a href="#inventory-adjustments" data-toggle="tab">Inventory Adjustments</a></li>
                                                    <li class=""><a href="#invoices" data-toggle="tab">Invoices</a></li>
                                                    <li class=""><a href="#items" data-toggle="tab">Items</a></li>
                                                    <li class=""><a data-toggle="tab" href="#institution">Institution Details</a></li>
                                                    <li class=""><a href="#organizations" data-toggle="tab">Organizations</a></li>
                                                    <li class=""><a href="#orders" data-toggle="tab">Orders</a></li>
                                                    <li class=""><a href="#product-groups" data-toggle="tab">Product Groups</a></li>
                                                    <li class=""><a href="#products" data-toggle="tab">Products</a></li>
                                                    <li class=""><a href="#payments" data-toggle="tab">Payments</a></li>
                                                    <li class=""><a href="#refunds" data-toggle="tab">Refunds</a></li>
                                                    <li class=""><a href="#sales" data-toggle="tab">Sales</a></li>
                                                    <li class=""><a href="#subscriptions" data-toggle="tab">Subscriptions</a></li>
                                                    <li class=""><a href="#transfer-orders" data-toggle="tab">Transfer orders</a></li>
                                                    <li class=""><a href="#transfers" data-toggle="tab">Transfers</a></li>
                                                    <li class=""><a data-toggle="tab" href="#users">Users</a></li>
                                                    <li class=""><a data-toggle="tab" href="#units">Units</a></li>
                                                    <li class=""><a href="#warehouse" data-toggle="tab">Warehouse</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">



                                                <div class="tab-pane" id="campaigns">
                                                    @can('admin view campaigns')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Type</th>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->campaigns as $campaign)
                                                                        <tr class="gradeX">
                                                                            <td>{{$campaign->name}}</td>
                                                                            <td>{{$campaign->campaignType->name}}</td>
                                                                            <td>{{$campaign->start_date}}</td>
                                                                            <td>{{$campaign->end_date}}</td>
                                                                            <td>{{$campaign->user->name}}</td>
                                                                            <td>
                                                                                <span class="label {{$campaign->status->label}}">{{$campaign->status->name}}</span>
                                                                            </td>

                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view campaign')
                                                                                        <a href="{{ route('business.campaign.show', ['portal'=>$institution->portal, 'id'=>$campaign->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                    @endcan
                                                                                    @can('delete campaign')
                                                                                        <a href="{{ route('business.campaign.delete', ['portal'=>$institution->portal, 'id'=>$campaign->id]) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Type</th>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="contacts">
                                                    @can('admin view contacts')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Phone Number</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->contacts as $contact)
                                                                        <tr class="gradeX">
                                                                            <td>@if($contact->title){{$contact->title->name}}.@endif {{$contact->first_name}} {{$contact->last_name}}</td>
                                                                            <td>{{$contact->email}}</td>
                                                                            <td>{{$contact->phone_number}}</td>
                                                                            <td>
                                                                                <span class="label {{$contact->status->label}}">{{$contact->status->name}}</span>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view contact')
                                                                                        <a href="{{ route('business.contact.show', ['portal'=>$institution->portal, 'id'=>$contact->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                    @endcan
                                                                                    @can('delete contact')
                                                                                        <a href="{{ route('business.contact.delete', ['portal'=>$institution->portal, 'id'=>$contact->id]) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                                    @endcan
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
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane active" id="composite-products">
                                                    @can('admin view composite products')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Products</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->compositeProducts as $product)
                                                                        <tr class="gradeA">
                                                                            <td>{{$product->name}}</td>
                                                                            <td>{{$product->composite_product_products_count}}</td>
                                                                            <td class="center">
                                                                                <p>@if ($product->is_service==1) Service: @elseif($product->is_service==0)Product: @endif <span class="label {{$product->status->label}}">{{$product->status->name}}</span></p>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view composite product')
                                                                                        <a href="{{ route('business.composite.product.show', ['portal'=>$institution->portal, 'id'=>$product->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Products</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="expenses">
                                                    @can('admin view expenses')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Recurring</th>
                                                                    <th>Type</th>
                                                                    <th>Expense #</th>
                                                                    <th>Date</th>
                                                                    <th>Created</th>
                                                                    <th>Expense Account</th>
                                                                    <th>Total</th>
                                                                    <th>Paid</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->expenses as $expense)
                                                                    <tr class="gradeA">
                                                                        <td>
                                                                            @if($expense->is_recurring == 1)
                                                                                <p><span class="badge badge-success">True</span></p>
                                                                            @else
                                                                                <p><span class="badge badge-success">False</span></p>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if($expense->is_inventory_adjustment == 1)
                                                                                <p><a @can('view inventory adjustment') href="{{route('business.inventory.adjustment',['portal'=>$institution->portal, 'id'=>$expense->inventory_adjustment_id])}}" @endcan class="badge badge-success">Inventory Adjustment</a></p>
                                                                            @elseif($expense->is_transfer_order == 1)
                                                                                <p><a @can('view transfer order') href="{{route('business.transfer.order.show',['portal'=>$institution->portal, 'id'=>$expense->transfer_order_id])}}" @endcan class="badge badge-primary">Transfer Order</a></p>
                                                                            @elseif($expense->is_warehouse == 1)
                                                                                <p><a @can('view warehouse') href="{{route('business.warehouse.show',['portal'=>$institution->portal, 'id'=>$expense->warehouse_id])}}" @endcan class="badge badge-primary">Warehouse</a></p>
                                                                            @elseif($expense->is_campaign == 1)
                                                                                <p><a @can('view campaign') href="{{route('business.campaign.show',['portal'=>$institution->portal, 'id'=>$expense->campaign_id])}}" @endcan class="badge badge-primary">Campaign</a></p>
                                                                            @elseif($expense->is_sale == 1)
                                                                                <p><a @can('view sale') href="{{route('business.sale.show',['portal'=>$institution->portal, 'id'=>$expense->sale_id])}}" @endcan class="badge badge-primary">Sale</a></p>
                                                                            @elseif($expense->is_liability == 1)
                                                                                <p><a @can('view liability') href="{{route('business.liability.show',['portal'=>$institution->portal, 'id'=>$expense->liability_id])}}" @endcan class="badge badge-primary">Liability</a></p>
                                                                            @elseif($expense->is_transfer == 1)
                                                                                <p><a @can('view transfer') href="{{route('business.transfer.show',['portal'=>$institution->portal, 'id'=>$expense->transfer_id])}}" @endcan class="badge badge-primary">Transfer</a></p>
                                                                            @elseif($expense->is_transaction == 1)
                                                                                <p><a @can('view transaction') href="{{route('business.transaction.show',['portal'=>$institution->portal, 'id'=>$expense->transaction_id])}}" @endcan class="badge badge-primary">Transaction</a></p>
                                                                            @else
                                                                                <p><span class="badge badge-info">None</span></p>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$expense->reference}}</td>
                                                                        <td>{{$expense->date}}</td>
                                                                        <td>{{$expense->created_at}}</td>
                                                                        <td>@if ($expense->expenseAccount){{$expense->expenseAccount->name}} @endif</td>
                                                                        <td>{{$expense->total}}</td>
                                                                        <td>{{$expense->paid}}</td>
                                                                        <td>
                                                                            <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                @can('view expense')
                                                                                    <a href="{{ route('business.expense.show', ['portal'=>$institution->portal, 'id'=>$expense->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                @endcan
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Recurring</th>
                                                                    <th>Type</th>
                                                                    <th>Expense #</th>
                                                                    <th>Date</th>
                                                                    <th>Created</th>
                                                                    <th>Expense Account</th>
                                                                    <th>Total</th>
                                                                    <th>Paid</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="estimates">
                                                    @can('admin view estimates')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Estimate #</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Customer</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Progress</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->estimates as $estimate)
                                                                    <tr class="gradeA">
                                                                        <td>{{$estimate->reference}}</td>
                                                                        <td>{{$estimate->date}}</td>
                                                                        <td>{{$estimate->due_date}}</td>
                                                                        <td>
                                                                            @if(isset($estimate->contact))
                                                                                {{$estimate->contact->first_name}} {{$estimate->contact->last_name}}
                                                                            @else
                                                                                <span class="label label-info"> NaN </span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$estimate->total}}</td>
                                                                        <td>
                                                                            <p><span class="label {{$estimate->status->label}}">{{$estimate->status->name}}</span></p>
                                                                        </td>
                                                                        <td>
                                                                            @if($estimate->is_sale == 1)
                                                                                <p><span class="badge badge-success">Sale</span></p>
                                                                            @elseif($estimate->is_order == 1)
                                                                            <p><span class="badge badge-primary">Order</span></p>
                                                                            @elseif($estimate->is_invoice == 1)
                                                                            <p><span class="badge badge-primary">Invoice</span></p>
                                                                            @elseif($estimate->is_estimate == 1)
                                                                                <p><span class="badge badge-primary">Estimate</span></p>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                <a href="{{ route('business.estimate.show', ['portal'=>$institution->portal, 'id'=>$estimate->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Estimate #</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Customer</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Progress</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="inventory-adjustments">
                                                    @can('admin view inventory adjustments')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th width="50em">Date</th>
                                                                    <th>Reason</th>
                                                                    <th>Reference</th>
                                                                    <th>Type</th>
                                                                    <th>By</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->inventoryAdjustments as $inventoryAdjustment)
                                                                    <tr class="gradeA">
                                                                        <td>{{$inventoryAdjustment->created_at->format('d/m/Y')}}</td>
                                                                        <td>{{$inventoryAdjustment->reason->name}}</td>
                                                                        <td>{{$inventoryAdjustment->inventory_adjustment_number}}</td>
                                                                        <td>
                                                                            @if($inventoryAdjustment->is_value_adjustment==1)
                                                                                Value
                                                                            @else
                                                                                Quantity
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$inventoryAdjustment->user->name}}</td>
                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                @can('view inventory adjustment')
                                                                                    <a href="{{route('business.inventory.adjustment.show',['portal'=>$institution->portal, 'id'=>$inventoryAdjustment->id])}}" class="btn-primary btn-outline btn btn-xs">View</a>
                                                                                @endcan
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Reason</th>
                                                                    <th>Reference</th>
                                                                    <th>Type</th>
                                                                    <th>By</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="invoices">
                                                    @can('admin view invoices')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Invoice #</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Customer</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Progress</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->invoices as $invoice)
                                                                    <tr class="gradeA">
                                                                        <td>{{$invoice->reference}}</td>
                                                                        <td>{{$invoice->date}}</td>
                                                                        <td>{{$invoice->due_date}}</td>
                                                                        <td>
                                                                            @if(isset($invoice->contact))
                                                                                {{$invoice->contact->first_name}} {{$invoice->contact->last_name}}
                                                                            @else
                                                                                <span class="label label-info"> NaN </span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$invoice->total}}</td>
                                                                        <td>
                                                                            <p><span class="label {{$invoice->status->label}}">{{$invoice->status->name}}</span></p>
                                                                        </td>
                                                                        <td>
                                                                            @if($invoice->is_sale == 1)
                                                                                <p><span class="badge badge-success">Sale</span></p>
                                                                            @elseif($invoice->is_order == 1)
                                                                            <p><span class="badge badge-primary">Order</span></p>
                                                                            @elseif($invoice->is_invoice == 1)
                                                                            <p><span class="badge badge-primary">Invoice</span></p>
                                                                            @elseif($invoice->is_estimate == 1)
                                                                                <p><span class="badge badge-primary">Estimate</span></p>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                @can('view invoice')
                                                                                    <a href="{{ route('business.invoice.show', ['portal'=>$institution->portal, 'id'=>$invoice->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                @endcan
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Invoice #</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Customer</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Progress</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="items">
                                                    @can('admin view items')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>SKU</th>
                                                                        <th>Stock on Hand</th>
                                                                        <th>Reorder Level</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->items as $item)
                                                                        <tr class="gradeA">
                                                                            <td>{{$item->name}}</td>
                                                                            <td>{{$item->unit->name}}</td>

                                                                            @if($item->is_service == "1" || $item->is_inventory == "0")
                                                                                <td>N/A</td>
                                                                            @else
                                                                                <td>{{$item->stock_on_hand->first()->stock_on_hand}}</td>
                                                                            @endif

                                                                            <td class="center">@if($item->reorder_level) {{$item->reorder_level}} @else N/A @endif</td>
                                                                            <td class="center">
                                                                                <p>@if ($item->is_service==1) Service: @elseif($item->is_service==0)Item: @endif <span class="label {{$item->status->label}}">{{$item->status->name}}</span></p>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view item')
                                                                                        <a href="{{ route('business.item.show', ['portal'=>$institution->portal, 'id'=>$item->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
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
                                                <div id="institution" class="tab-pane">
                                                    <div class="panel-body">

                                                        <div class="">
                                                            <div class="col-md-12">
                                                                <form method="post" action="{{ route('business.institution.update',['portal'=>$institution->portal, 'id'=>$institution->id]) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                                                    <div class="col-md-12">
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-8">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('name'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="name" name="name" required="required" value="{{$institution->name}}" class="form-control input-lg">
                                                                                    <i>name</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('portal'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('portal') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="portal" name="portal" required="required" value="{{$institution->portal}}" class="form-control input-lg">
                                                                                    <i>portal</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('email'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="email" id="email" name="email" required="required" value="{{$institution->email}}" class="form-control input-lg">
                                                                                    <i>email</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('phone_number'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('"phone_number') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="phone_number" name="phone_number" data-mask="(999) 999-999-999" required="required" value="{{$institution->phone_number}}" class="form-control input-lg">
                                                                                    <i>phone number</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('address_line_1'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('address_line_1') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="address_line_1" name="address_line_1" required="required" value="{{$institution->address->address_line_1}}" class="form-control input-lg">
                                                                                    <i>address line 1</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('address_line_2'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('address_line_2') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="address_line_2" name="address_line_2" required="required" value="{{$institution->address->address_line_2}}" class="form-control input-lg">
                                                                                    <i>address line 2</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('street'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('street') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="street" name="street" required="required" value="{{$institution->address->street}}" class="form-control input-lg">
                                                                                    <i>street</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('city'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('city') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="city" name="city" required="required" value="{{$institution->address->town}}" class="form-control input-lg">
                                                                                    <i>city</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('postal_code'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <input type="text" id="postal_code" name="postal_code" required="required" value="{{$institution->address->postal_code}}" class="form-control input-lg">
                                                                                    <i>postal code</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('currency'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                    <strong>{{ $errors->first('currency') }}</strong>
                                                                                </span>
                                                                                    @endif
                                                                                    <select name="currency" data-placeholder="Choose a currency..." class="chosen-select" {{ $errors->has('currency') ? ' is-invalid' : '' }}  tabindex="2">
                                                                                        <option></option>
                                                                                        @foreach($currencies as $currency)
                                                                                            <option @if($institution->currency->id == $currency->id) selected @endif value="{{$currency->id}}">{{$currency->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <i>currency</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('agent'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                            <strong>{{ $errors->first('agent') }}</strong>
                                                                                        </span>
                                                                                    @endif
                                                                                    <select name="agent" data-placeholder="agent..." class="chosen-select {{ $errors->has('agent') ? ' is-invalid' : '' }}"  tabindex="2">
                                                                                        @if($institution->is_agent_signup)
                                                                                            <option value="">Nihu00{{$institution->agent->code}}</option>
                                                                                        @endif
                                                                                    </select>
                                                                                    <i>agent</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('sale_format'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                            <strong>{{ $errors->first('sale_format') }}</strong>
                                                                                        </span>
                                                                                    @endif
                                                                                    <input name="is_sale_random" id="is_sale_random" type="checkbox" @if($institution->is_sale_random) checked @endif class="enablerandomReference {{ $errors->has('is_sale_random') ? ' is-invalid' : '' }}" />
                                                                                    <i>sale reference random</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="has-warning">
                                                                                    @if ($errors->has('sale_format'))
                                                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                            <strong>{{ $errors->first('sale_format') }}</strong>
                                                                                        </span>
                                                                                    @endif
                                                                                    <input type="text" id="sale_format" name="sale_format" required="required" placeholder="Sale format" value="{{$institution->sale_format}}" class="form-control input-lg" @if($institution->is_sale_random) disabled @endif>
                                                                                    <i>sale format</i>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        @can('edit institution')
                                                                            <hr>

                                                                            <div class="text-center">
                                                                                <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('Update') }}</button>
                                                                            </div>
                                                                        @endcan
                                                                    </div>


                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="loans">
                                                    @can('admin view loans')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Principal</th>
                                                                        <th>Interest</th>
                                                                        <th>Total</th>
                                                                        <th>Paid</th>
                                                                        <th>Date</th>
                                                                        <th>Due Date</th>
                                                                        <th>Account</th>
                                                                        <th>Contact</th>
                                                                        <th>Type</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->loans as $loan)
                                                                        <tr class="gradeX">
                                                                            <td>
                                                                                {{$loan->reference}}
                                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$loan->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                            </td>
                                                                            <td>{{$loan->principal}}</td>
                                                                            <td>{{$loan->interest}}</td>
                                                                            <td>{{$loan->total}}</td>
                                                                            <td>{{$loan->paid}}</td>
                                                                            <td>{{$loan->date}}</td>
                                                                            <td>{{$loan->due_date}}</td>
                                                                            <td>{{$loan->account->name}}</td>
                                                                            <td>{{$loan->contact->first_name}} {{$loan->contact->last_name}}</td>
                                                                            <td>
                                                                                <span class="label {{$loan->loanType->label}}">{{$loan->loanType->name}}</span>
                                                                            </td>
                                                                            <td>{{$loan->user->name}}</td>
                                                                            <td>
                                                                                <span class="label {{$loan->status->label}}">{{$loan->status->name}}</span>
                                                                            </td>

                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view loan')
                                                                                        <a href="{{ route('business.loan.show', ['portal'=>$institution->portal, 'id'=>$loan->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Principal</th>
                                                                        <th>Interest</th>
                                                                        <th>Total</th>
                                                                        <th>Paid</th>
                                                                        <th>Date</th>
                                                                        <th>Due Date</th>
                                                                        <th>Account</th>
                                                                        <th>Contact</th>
                                                                        <th>Type</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="warehouse">
                                                    @can('admin view warehouses')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Town</th>
                                                                    <th>Street</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Email</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->warehouses as $warehouse)
                                                                    <tr class="gradeX">
                                                                        <td>
                                                                            {{$warehouse->name}}
                                                                        </td>
                                                                        <td>{{$warehouse->address->town}}</td>
                                                                        <td>{{$warehouse->address->street}}</td>
                                                                        <td>{{$warehouse->address->phone_number}}</td>
                                                                        <td>{{$warehouse->address->email}}</td>
                                                                        <td>{{$warehouse->user->name}}</td>
                                                                        <td>
                                                                            <span class="label {{$warehouse->status->label}}">{{$warehouse->status->name}}</span>
                                                                        </td>

                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                @can('add warehouse')
                                                                                    <a href="{{ route('business.warehouse.show', ['portal'=>$institution->portal, 'id'=>$warehouse->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                @endcan
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Town</th>
                                                                    <th>Street</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Email</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="orders">
                                                    @can('admin view orders')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Order #</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Customer</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->orders as $order)
                                                                    <tr class="gradeA">
                                                                        <td>{{$order->reference}}</td>
                                                                        <td>{{$order->date}}</td>
                                                                        <td>{{$order->due_date}}</td>
                                                                        <td>
                                                                            @if(isset($order->contact))
                                                                                {{$order->contact->first_name}} {{$order->contact->last_name}}
                                                                            @else
                                                                                <span class="label label-info"> NaN </span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$order->total}}</td>
                                                                        <td>
                                                                            <p><span class="label {{$order->status->label}}">{{$order->status->name}}</span></p>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                @can('view order')
                                                                                    <a href="{{ route('business.order.show', ['portal'=>$institution->portal, 'id'=>$order->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                @endcan
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Order #</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Customer</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="organizations">
                                                    @can('admin view organizations')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Phone Number</th>
                                                                        <th>Website</th>
                                                                        <th>Members</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->organizations as $organization)
                                                                        <tr class="gradeX">
                                                                            <td>{{$organization->name}}</td>
                                                                            <td>{{$organization->phone_number}}</td>
                                                                            <td>{{$organization->website}}</td>
                                                                            <td>{{$organization->contacts_count}}</td>
                                                                            <td>
                                                                                <span class="label {{$organization->status->label}}">{{$organization->status->name}}</span>
                                                                            </td>

                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view organization')
                                                                                        <a href="{{ route('business.organization.show', ['portal'=>$institution->portal, 'id'=>$organization->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                    @endcan
                                                                                    @can('delete organization')
                                                                                        <a href="{{ route('business.organization.delete', ['portal'=>$institution->portal, 'id'=>$organization->id]) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Phone Number</th>
                                                                        <th>Website</th>
                                                                        <th>Members</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="payments">
                                                    @can('admin view payments')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Amount</th>
                                                                        <th>Initial</th>
                                                                        <th>Subsequent</th>
                                                                        <th>Date</th>
                                                                        <th>Account</th>
                                                                        <th>For</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->payments as $payment)
                                                                        <tr class="gradeX">
                                                                            <td>
                                                                                {{$payment->reference}}
                                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                            </td>
                                                                            <td>{{$payment->amount}}</td>
                                                                            <td>{{$payment->initial_balance}}</td>
                                                                            <td>{{$payment->current_balance}}</td>
                                                                            <td>{{$payment->date}}</td>
                                                                            <td>{{$payment->account->name}}</td>
                                                                            <td>
                                                                                @if($payment->sale_id)
                                                                                    <span class="label label-success">Sale</span>
                                                                                @elseif($payment->loan_id)
                                                                                    <span class="label label-success">Loan</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>{{$payment->user->name}}</td>
                                                                            <td>
                                                                                <span class="label {{$payment->status->label}}">{{$payment->status->name}}</span>
                                                                            </td>

                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view payment')
                                                                                        <a href="{{ route('business.payment.show', ['portal'=>$institution->portal, 'id'=>$payment->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Amount</th>
                                                                        <th>Initial</th>
                                                                        <th>Subsequent</th>
                                                                        <th>Date</th>
                                                                        <th>Account</th>
                                                                        <th>For</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="product-groups">
                                                    @can('admin view product groups')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Attributes</th>
                                                                        <th>Attribute Options</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->productGroups as $productGroup)
                                                                        <tr class="gradeA">
                                                                                <td>{{$productGroup->name}}</td>
                                                                                <td>{{$productGroup->attributes}}</td>
                                                                                <td>{{$productGroup->attribute_options}}</td>
                                                                                <td>
                                                                                    <p>@if ($productGroup->is_service==1) Service: @elseif($productGroup->is_service==0)Product: @endif <span class="label {{$productGroup->status->label}}">{{$productGroup->status->name}}</span></p>
                                                                                </td>
                                                                                <td class="text-right">
                                                                                    <div class="btn-group">
                                                                                        @can('view product groups')
                                                                                            <a href="{{ route('business.product.group.show', ['portal'=>$institution->portal, 'id'=>$productGroup->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                        @endcan
                                                                                    </div>
                                                                                </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>SKU</th>
                                                                        <th>Stock on Hand</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="products">
                                                    @can('admin view products')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>SKU</th>
                                                                        <th>Stock on Hand</th>
                                                                        <th>Reorder Level</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->products as $product)
                                                                        <tr class="gradeA">
                                                                            <td>{{$product->name}}</td>
                                                                            <td>{{$product->unit->name}}</td>

                                                                            @if($product->is_service == "1" || $product->is_inventory == "0")
                                                                                <td>N/A</td>
                                                                            @else
                                                                                <td>{{$product->stock_on_hand->first()->stock_on_hand}}</td>
                                                                            @endif

                                                                            <td class="center">@if($product->reorder_level) {{$product->reorder_level}} @else N/A @endif</td>
                                                                            <td class="center">
                                                                                <p>@if ($product->is_service==1) Service: @elseif($product->is_service==0)Product: @endif <span class="label {{$product->status->label}}">{{$product->status->name}}</span></p>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view product')
                                                                                        <a href="{{ route('business.product.show', ['portal'=>$institution->portal, 'id'=>$product->id]) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
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
                                                <div class="tab-pane" id="refunds">
                                                    @can('admin view refunds')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Amount</th>
                                                                        <th>Initial</th>
                                                                        <th>Subsequent</th>
                                                                        <th>Date</th>
                                                                        <th>Account</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                            <tbody>
                                                            @foreach($institution->refunds as $refund)
                                                                <tr class="gradeX">
                                                                    <td>
                                                                        {{$refund->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$refund->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{$refund->amount}}</td>
                                                                    <td>{{$refund->initial_amount}}</td>
                                                                    <td>{{$refund->subsequent_amount}}</td>
                                                                    <td>{{$refund->date}}</td>
                                                                    <td>{{$refund->account->name}}</td>
                                                                    <td>{{$refund->user->name}}</td>
                                                                    <td>
                                                                        <span class="label {{$refund->status->label}}">{{$refund->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            @can('view refund')
                                                                                <a href="{{ route('business.refund.show', ['portal'=>$institution->portal, 'id'=>$refund->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                            @endcan
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Amount</th>
                                                                        <th>Initial</th>
                                                                        <th>Subsequent</th>
                                                                        <th>Date</th>
                                                                        <th>Account</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="sales">
                                                    @can('admin view sales')
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
                                                                @foreach($institution->sales as $sale)
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
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="subscriptions">
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
                                                                        <td>{{$subscription->reference}}</td>
                                                                        <td>{{$subscription->amount}}</td>
                                                                        <td>{{$subscription->paid}}</td>
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
                                                                            <p><span class="label {{$subscription->status->label}}">{{$subscription->status->name}}</span></p>
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
                                                <div class="tab-pane" id="transfers">
                                                    @can('admin view transfers')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Amount</th>
                                                                        <th>Date</th>
                                                                        <th>Source Account</th>
                                                                        <th>Destination Account</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($institution->transfers as $transfer)
                                                                        <tr class="gradeX">
                                                                            <td>
                                                                                {{$transfer->reference}}
                                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$transfer->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                            </td>
                                                                            <td>{{$transfer->amount}}</td>
                                                                            <td>{{$transfer->date}}</td>
                                                                            <td>

                                                                                <span class="label label-success"> {{$transfer->sourceAccount->name}}</span>
                                                                                <span class="badge badge-success"> {{$transfer->source_initial_amount}} -> {{$transfer->source_subsequent_amount}}</span>
                                                                            </td>
                                                                            <td>

                                                                                <span class="label label-success"> {{$transfer->destinationAccount->name}}</span>
                                                                                <span class="badge badge-success"> {{$transfer->destination_initial_amount}} -> {{$transfer->destination_subsequent_amount}}</span>
                                                                            </td>
                                                                            <td>{{$transfer->user->name}}</td>
                                                                            <td>
                                                                                <span class="label {{$transfer->status->label}}">{{$transfer->status->name}}</span>
                                                                            </td>

                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view transfer')
                                                                                        <a href="{{ route('business.transfer.show', ['portal'=>$institution->portal, 'id'=>$transfer->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Reference</th>
                                                                        <th>Amount</th>
                                                                        <th>Date</th>
                                                                        <th>Source Account</th>
                                                                        <th>Destination Account</th>
                                                                        <th>User</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div class="tab-pane" id="transfer-orders">
                                                    @can('admin view transfer orders')
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th width="50em">Date</th>
                                                                    <th>Reason</th>
                                                                    <th>Source</th>
                                                                    <th>Destination</th>
                                                                    <th>By</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($institution->transferOrders as $transferOrder)
                                                                    <tr class="gradeA">
                                                                        <td>{{$transferOrder->transfer_order_number}}</td>
                                                                        <td>{{$transferOrder->created_at}}</td>
                                                                        <td>{{$transferOrder->reason}}</td>
                                                                        <td>
                                                                            {{$transferOrder->sourceWarehouse->name}}
                                                                        </td>
                                                                        <td>
                                                                            {{$transferOrder->destinationWarehouse->name}}
                                                                        </td>
                                                                        <td>{{$transferOrder->user->name}}</td>
                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                @can('view transfer order')
                                                                                    <a href="{{route('business.transfer.order.show',['portal'=>$institution->portal, 'id'=>$transferOrder->id])}}" class="btn-primary btn-outline btn btn-xs">View</a>
                                                                                @endcan
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th width="50em">Date</th>
                                                                    <th>Reason</th>
                                                                    <th>Source</th>
                                                                    <th>Destination</th>
                                                                    <th>By</th>
                                                                    <th class="text-right" width="13em" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    @endcan
                                                </div>
                                                <div id="units" class="tab-pane">
                                                    <div class="panel-body">

                                                        @can('view units')
                                                            {{-- units --}}
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
                                                                        @foreach($institution->units as $unit)
                                                                            <tr class="gradeX">
                                                                                <td>{{$unit->name}}</td>
                                                                                <td>{{$unit->user->name}}</td>
                                                                                <td>
                                                                                    <span class="unit {{$unit->status->unit}}">{{$unit->status->name}}</span>
                                                                                </td>
                                                                                <td class="text-right">
                                                                                    <div class="btn-group">
                                                                                        @can('view unit')
                                                                                            <a href="{{ route('business.unit.show', ['portal'=>$institution->portal, 'id'=>$unit->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                        @endcan
                                                                                        @can('delete unit')
                                                                                            <a href="{{ route('business.unit.delete', ['portal'=>$institution->portal, 'id'=>$unit->id]) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                                        @endcan

                                                    </div>
                                                </div>
                                                <div id="users" class="tab-pane ">
                                                    <div class="panel-body">

                                                        @can('add user')
                                                            <a data-toggle="modal" data-target="#userRegistration" class="btn btn-primary pull-right btn-round btn-outline"> <span class="fa fa-plus"></span> User </a>
                                                        @endcan
                                                        <br>
                                                        <br>
                                                        <br>

                                                        @can('view users')
                                                            {{-- users --}}
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>User</th>
                                                                        <th>Roles</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($users as $institutionUser)
                                                                        <tr class="gradeX">
                                                                            <td>{{$institutionUser->user->name}}</td>
                                                                            <td>{{$institutionUser->user->email}}</td>
                                                                            <td>
                                                                                @foreach($institutionUser->user->roles as $role)
                                                                                    @if(in_array($role->name, $roleNames))
                                                                                        <label class="label label-default">{{$role->name}}</label>
                                                                                    @endif
                                                                                @endforeach
                                                                            </td>
                                                                            <td>{{ $institutionUser->created_at->format('d/m/Y H:i') }}</td>
                                                                            <td class="text-right">
                                                                                <div class="btn-group">
                                                                                    @can('view user')
                                                                                        <a href="{{ route('business.user.show', ['portal'=>$institution->portal, 'id'=>encrypt($institutionUser->user->id)]) }}" class="btn-white btn btn-xs">View</a>
                                                                                    @endcan
                                                                                    @can('delete user')
                                                                                        <a href="{{ route('business.user.delete', ['portal'=>$institution->portal, 'id'=>encrypt($institutionUser->user->id)]) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                                                        <th>Roles</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right" width="70em" data-sort-ignore="true">Action</th>
                                                                    </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>

                                                            {{-- deleted users --}}
                                                            @if($deletedUsers->count())
                                                                <h3 class="text-center">Deleted Users</h3>
                                                                <br>
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>User</th>
                                                                            <th>Status</th>
                                                                            <th class="text-right" width="80em" data-sort-ignore="true">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($deletedUsers as $institutionUser)
                                                                            <tr class="gradeX">
                                                                                <td>{{$institutionUser->user->name}}</td>
                                                                                <td>{{$institutionUser->user->email}}</td>
                                                                                <td>{{ $institutionUser->created_at->format('d/m/Y H:i') }}</td>
                                                                                <td class="text-right">
                                                                                    <div class="btn-group">
                                                                                        @can('view user')
                                                                                            <a href="{{ route('business.user.show', ['portal'=>$institution->portal, 'id'=>$institutionUser->user->id]) }}" class="btn-white btn btn-xs">View</a>
                                                                                        @endcan
                                                                                        @can('delete user')
                                                                                            <a href="{{ route('business.user.restore', ['portal'=>$institution->portal, 'id'=>$institutionUser->user->id]) }}" class="btn-warning btn btn-xs">Delete</a>
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
                                                                            <th class="text-right" width="80em" data-sort-ignore="true">Action</th>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
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
