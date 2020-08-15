@extends('business.layouts.app')

@section('title', 'Product Edit')


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Product Edit</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('business.calendar',$institution->portal)}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('business.products',$institution->portal)}}">Products</a></strong>
                </li>
                <li class="active">
                    <strong>Product Edit</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">

            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">

        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#product"> Product info</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="product" class="tab-pane active">
                            <div class="panel-body">

                                <form method="post" enctype="multipart/form-data" action="{{ route('business.product.update',['portal'=>$institution->portal, 'id'=>$product->id]) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                    {{--  Product  --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 b-r">
                                                    {{--  Product type  --}}
                                                    @if ($errors->has('product_type'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('product_type') }}</strong>
                                                        </span>
                                                    @endif
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="goods" value="goods" name="product_type" @if($product->is_service == false)  checked="" @endif onclick = "productTypeSelected(this)" class="{{ $errors->has('product_type') ? ' is-invalid' : '' }}" disabled>
                                                        <label for="goods"> Goods </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="services" value="services" name="product_type" @if($product->is_service == True)  checked="" @endif onclick = "productTypeSelected(this)" class="{{ $errors->has('product_type') ? ' is-invalid' : '' }}" disabled>
                                                        <label for="services"> Service </label>
                                                    </div>
                                                    <br>
                                                    <i>product type</i>
                                                </div>
                                                <div class="col-md-6">
                                                    {{--  Product returnable  --}}
                                                    @if ($errors->has('is_returnable'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('is_returnable') }}</strong>
                                                </span>
                                                    @endif
                                                    <div class="checkbox">
                                                        <input id="is_returnable" name="is_returnable" type="checkbox" @if($product->is_returnable == True) checked @endif class=" {{ $errors->has('is_returnable') ? ' is-invalid' : '' }}">
                                                        <label for="is_returnable">
                                                            Returnable Product
                                                        </label>
                                                        <span><i data-toggle="tooltip" data-placement="right" title="Enable this option if the item is eligible for sales return." class="fa fa-x text-warning fa-question-circle"></i></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <br>
                                            <br>

                                            {{--  Name  --}}
                                            <div class="has-warning">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                                <input type="text" id="name" name="name" required="required" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$product->name}}">
                                                <i>name</i>
                                            </div>
                                            <br>
                                            {{--  Product Unit  --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="has-warning">
                                                        @if ($errors->has('unit'))
                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                <strong>{{ $errors->first('unit') }}</strong>
                                                            </span>
                                                        @endif
                                                        <select name="unit" class="select2_unit form-control input-lg {{ $errors->has('unit') ? ' is-invalid' : '' }}" required>
                                                            <option></option>
                                                            @foreach($units as $unit)
                                                                <option @if($product->unit_id == $unit->id) selected @endif value="{{$unit->id}}">{{$unit->name}}</option>
                                                            @endforeach()
                                                        </select>
                                                        <i>unit</i> <span><i data-toggle="tooltip" data-placement="right" title="The item will be measured in terms of this unit (e.g.:kg,dozen,litres)" class="fa fa-question-circle fa-x text-warning"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                @if ($errors->has('brand'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('brand') }}</strong>
                                            </span>
                                                @endif
                                                <div class="col-lg-12">
                                                    <div class="has-warning">
                                                        <select name="brand" class="select2_brand form-control input-lg {{ $errors->has('brand') ? ' is-invalid' : '' }}">
                                                            <option></option>
                                                            @foreach($brands as $brand)
                                                                <option @if($product->brand_id == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach()
                                                        </select>
                                                        <i>brand</i> <span><i data-toggle="tooltip" data-placement="right" title="This depends on whether the item belongs to a brand." class="fa fa-question-circle fa-x text-warning"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                @if ($errors->has('product_category'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('product_category') }}</strong>
                                            </span>
                                                @endif
                                                <div class="col-lg-12">
                                                    <div class="has-warning">
                                                        <select name="product_sub_category" class="select2_product_sub_category form-control input-lg {{ $errors->has('product_sub_category') ? ' is-invalid' : '' }}">
                                                            <option></option>
                                                            @foreach($productSubCategories as $productSubCategory)
                                                                <option @if($product->product_sub_category_id == $productSubCategory->id) selected @endif value="{{$productSubCategory->id}}">{{$productSubCategory->name}}</option>
                                                            @endforeach()
                                                        </select>
                                                        <i>product sub category</i> <span><i data-toggle="tooltip" data-placement="right" title="This depends on whether the item belongs to a product category." class="fa fa-question-circle fa-x text-warning"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    Product Images
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-groups">
                                                        <div class="file-loading">
                                                            <input id="file-1" type="file" name="file[]" multiple class="file {{ $errors->has('file') ? ' is-invalid' : '' }}" data-overwrite-initial="false" data-min-file-count="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <label>Description.</label>
                                    <div class="">
                                        {{--  Description  --}}
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                        <textarea id="summernote" class="summernote {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">
                                        {!! $product->description !!}
                                    </textarea>
                                    </div>
                                    <hr>

                                    {{--  Sales and purchase information  --}}
                                    <h3 class="text-center">SALES AND PURCHASE INFORMATION</h3>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="text-center">SALES INFORMATION</h4>
                                            {{--  Product purchase account  --}}
                                            <div class="row">
                                                @if ($errors->has('selling_account'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('selling_account') }}</strong>
                                                </span>
                                                @endif
                                                <div class="col-md-12">
                                                    <select name="selling_account" class="select2_selling_account form-control input-lg {{ $errors->has('selling_account') ? ' is-invalid' : '' }}" required>
                                                        <option></option>
                                                        @foreach($salesAccounts as $account)
                                                            <option @if($product->selling_account_id == $account->id) selected @endif value="{{$account->id}}">{{$account->name}}</option>
                                                        @endforeach()
                                                    </select>
                                                    <i>selling account</i> <span><i data-toggle="tooltip" data-placement="right" title="All transactions related to the items you purchase will be displayed in this account" class="fa fa-question-circle fa-x text-warning"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-center">PURCHASE INFORMATION</h4>
                                            {{--  Product selling account  --}}
                                            <div class="row">
                                                @if ($errors->has('purchase_account'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('purchase_account') }}</strong>
                                                    </span>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="has-warning">
                                                        <select name="purchase_account" class="select2_purchase_account form-control input-lg {{ $errors->has('purchase_account') ? ' is-invalid' : '' }}" required>
                                                            <option></option>
                                                            <optgroup label="Exepense">
                                                                @foreach($expenseAccounts as $account)
                                                                    <option @if($product->purchase_account_id == $account->id) selected @endif value="{{$account->id}}">{{$account->name}}</option>
                                                                @endforeach()
                                                            </optgroup>

                                                            <optgroup label="Costs Of Goods Sold">
                                                                @foreach($costOfGoodsSoldAccounts as $account)
                                                                    <option @if($product->purchase_account_id == $account->id) selected @endif value="{{$account->id}}">{{$account->name}}</option>
                                                                @endforeach()
                                                            </optgroup>

                                                        </select>
                                                        <i>purchase account</i> <span><i data-toggle="tooltip" data-placement="right" title="All transactions related to the items you purchase will be displayed in this account" class="fa fa-question-circle fa-x text-warning"></i></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--  Selling price  --}}
                                            <div class="has-warning">
                                                @if ($errors->has('selling_price'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('selling_price') }}</strong>
                                                    </span>
                                                @endif
                                                <input type="text" id="selling_price" name="selling_price" required="required" value="{{$product->selling_price}}" class="form-control input-lg {{ $errors->has('selling_price') ? ' is-invalid' : '' }}">
                                                <i>selling price</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{--  Purchase price  --}}
                                            <div class="has-warning">
                                                @if ($errors->has('purchase_price'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('purchase_price') }}</strong>
                                                    </span>
                                                @endif
                                                <input type="text" id="purchase_price" name="purchase_price" required="required" value="{{$product->purchase_price}}" class="form-control input-lg {{ $errors->has('purchase_price') ? ' is-invalid' : '' }}">
                                                <i>purchase price</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--  Product Tax  --}}
                                            @if ($errors->has('taxes'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('taxes') }}</strong>
                                                </span>
                                            @endif
                                            <select name="taxes[]" class="select2_taxes form-control input-lg {{ $errors->has('taxes') ? ' is-invalid' : '' }}" required multiple>
                                                @foreach($taxes as $tax)
                                                    <option @foreach ($product->productTaxes as $product_tax) {{$product_tax->tax_id}}  @if($product_tax->tax_id == $tax->id) selected @endif @endforeach value="{{$tax->id}}">{{$tax->name}}[{{$tax->amount}}@if($tax->is_percentage == True)%@endif]</option>
                                                @endforeach()
                                            </select>
                                            <i>taxes</i>
                                        </div>
                                        <div class="col-md-6">
                                            {{--  Product Tax  --}}
                                            @if ($errors->has('tax_method'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('tax_method') }}</strong>
                                                </span>
                                            @endif
                                            <select name="tax_method" class="tax_method-select form-control input-lg {{ $errors->has('tax_method') ? ' is-invalid' : '' }}">
                                                <option></option>
                                                @foreach($taxMethods as $taxMethod)
                                                    <option @if($product->tax_method_id == $taxMethod->id) selected @endif value="{{$taxMethod->id}}">{{$taxMethod->name}}</option>
                                                @endforeach()
                                            </select>
                                            <i>tax method</i>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <h3 class="text-center">PRODUCT CREATION INFORMATION</h3>
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if ($errors->has('is_created'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('is_created') }}</strong>
                                                </span>
                                            @endif
                                            <div class="checkbox checkbox-info">
                                                <input id="is_created" name="is_created" type="checkbox" @if($product->is_created == True) checked @endif class="enableCreationInformation {{ $errors->has('is_created') ? ' is-invalid' : '' }}">
                                                <label for="is_created">Created?</label> <span><i data-toggle="tooltip" data-placement="right" title="Check this option if the product is manufactured, created or a period of time is used by this business to add value to it." class="fa fa-x text-warning fa-question-circle"></i></span>
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            @if ($errors->has('creation_time'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('creation_time') }}</strong>
                                                </span>
                                            @endif
                                            <input type="number" id="creation_time" name="creation_time" value="{{$product->creation_time}}" class="form-control input-lg {{ $errors->has('creation_time') ? ' is-invalid' : '' }}" @if(!$product->creation_time) disabled @endif>
                                            <i>Average time taken to manufacture/create or add value to it in minutes.</i>
                                        </div>
                                        <div class="col-md-5">
                                            @if ($errors->has('creation_cost'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('creation_cost') }}</strong>
                                                </span>
                                            @endif
                                            <input type="number" id="creation_cost" name="creation_cost" value="{{$product->creation_cost}}" class="form-control input-lg {{ $errors->has('creation_cost') ? ' is-invalid' : '' }}" @if(!$product->acquired) disabled @endif>
                                            <i>Average cost of manufacturing/creation or value addition process. Include items acquired and cost of time.</i>
                                        </div>
                                    </div>

                                    @if($product->is_inventory == 1)
                                        <hr>
                                        {{--  Inventory information  --}}
                                        <h3 class="text-center" name = "inventory_information_header">INVENTORY INFORMATION</h3>
                                        <br>
{{--                                        <div class="checkbox checkbox-primary">--}}
{{--                                            <input id="is_inventory" name="is_inventory" type="checkbox" @if($product->is_inventory == 1) checked="checked" @endif onclick="notInventory(this)" class=" {{ $errors->has('is_inventory') ? ' is-invalid' : '' }}">--}}
{{--                                            <label for="is_inventory">--}}
{{--                                                Track Inventory for this item--}}
{{--                                            </label>--}}
{{--                                            <span><i data-toggle="tooltip" data-placement="right" title="Check this option if the product is manufactured, created or a period of time is used by this business to add value to it." class="fa fa-2x fa-question-circle"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <br>--}}
                                        <div class="row" name = "inventory_information">
                                            <div class="col-md-6">
                                                {{--  Inventory account  --}}
                                                <div class="row">
                                                    @if ($errors->has('inventory_account'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('inventory_account') }}</strong>
                                                        </span>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <div class="has-warning">
                                                            <select name="inventory_account" name="inventory_account"  class="select2_inventory_account form-control input-lg {{ $errors->has('inventory_account') ? ' is-invalid' : '' }}" required>
                                                                <option></option>
                                                                @foreach($stockAccounts as $account)
                                                                    <option @if($product->inventory_account_id == $account->id) selected @endif value="{{$account->id}}">{{$account->name}}</option>
                                                                @endforeach()
                                                            </select>
                                                            <i>inventory account</i> <span><i data-toggle="tooltip" data-placement="right" title="All inventory related transactions will be displayed in this account" class="fa fa-question-circle fa-x text-warning"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                @if ($errors->has('reorder_value'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('reorder_value') }}</strong>
                                                        </span>
                                                @endif
                                                <div class="">
                                                    <input type="number" id="reorder_level" name="reorder_level" required="required" class="form-control input-lg {{ $errors->has('reorder_level') ? ' is-invalid' : '' }}" value="{{$product->reorder_level}}">
                                                    <i>reorder level</i> <span><i data-toggle="tooltip" data-placement="right" title="Reorder level refers to the quantity of an item below which, an item is considered to be low on stock." class="fa fa-question-circle fa-x text-warning"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" name = "inventory_information">
                                            <div class="col-md-6">
                                                {{--  Opening stock  --}}
                                                <div class="row">
                                                    @if ($errors->has('opening_stock'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('opening_stock') }}</strong>
                                                        </span>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <input type="number" id="opening_stock" name="opening_stock" required="required" class="form-control input-lg {{ $errors->has('opening_account') ? ' is-invalid' : '' }}" value="{{$product->opening_stock}}" disabled>
                                                        <i>opening stock</i> <span><i data-toggle="tooltip" data-placement="right" title="To change this, please make an inventory adjustment." class="fa fa-question-circle fa-x text-warning"></i></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{--  Opening stock value  --}}
                                                {{--  todo Make KES (currency) dynamic  --}}
                                                <div class="row">
                                                    @if ($errors->has('opening_stock_value'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('opening_stock_value') }}</strong>
                                                        </span>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <input type="number" id="opening_stock_value" name="opening_stock_value" required="required" class="form-control input-lg {{ $errors->has('opening_stock_value') ? ' is-invalid' : '' }}" value="{{$product->opening_stock}}" disabled>
                                                        <i>opening stock value</i> <span><i data-toggle="tooltip" data-placement="right" title="To change this, please make an inventory adjustment." class="fa fa-question-circle fa-x text-warning"></i></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @can('edit product')
                                        <hr>
                                        <br />

                                        <div class="ln_solid"></div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-warning btn-block btn-lg btn-outline mt-4">{{ __('Update') }}</button>
                                        </div>
                                    @endcan
                                </form>
                            </div>
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

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

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

<!-- SUMMERNOTE -->
<script src="{{ asset('inspinia') }}/js/plugins/summernote/summernote.min.js"></script>

<!-- DROPZONE -->
<script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>

{{-- FILEINPUT --}}
<script src="{{ asset('inspinia') }}/js/plugins/fileinput/fileinput.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/fileinput/theme.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/popper/popper.min.js"></script>


<script type="text/javascript">

    $("#file-1").fileinput({

        theme: 'fa',
        uploadUrl: "/image-view",
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize:2000,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }

    });

</script>

<script>
    $(document).ready(function(){

        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("image/delete") }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
    });
</script>

<script>
    $(document).ready(function(){

        $('.summernote').summernote();

        $('.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });
</script>

<script>
    $(document).ready(function() {

        $('.enableCreationInformation').on('click',function(){
            if (document.getElementById('is_created').checked) {
                // enable end_time input
                document.getElementById("creation_time").disabled = false;
                document.getElementById("creation_cost").disabled = false;
            } else {
                // disable input
                document.getElementById("creation_time").disabled = true;
                document.getElementById("creation_cost").disabled = true;
            }
        });


    });

</script>

<script>
    $(document).ready(function(){

        $(".select2_unit").select2({
            placeholder: "Select Unit",
            allowClear: true
        });

        $(".select2_selling_account").select2({
            placeholder: "Select Selling Account",
            allowClear: true
        });

        $(".select2_purchase_account").select2({
            placeholder: "Select Purchase Account",
            allowClear: true
        });

        $(".select2_brand").select2({
            placeholder: "Select Brand",
            allowClear: true
        });

        $(".select2_product_sub_category").select2({
            placeholder: "Select Product Sub Category",
            allowClear: true
        });

        $(".select2_taxes").select2({
            placeholder: "Select Taxes",
            allowClear: true
        });

        $('.tax_method-select').select2({
            theme: "default",
            placeholder: "Select tax method",
        });

        $(".select2_inventory_account").select2({
            placeholder: "Select Inventory Account",
            allowClear: true
        });

        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
                // Output the result data for cropping image.
            }
        });

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function() {
                var fileReader = new FileReader(),
                    files = this.files,
                    file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {
                        $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }

        $("#download").click(function() {
            window.open($image.cropper("getDataURL"));
        });

        $("#zoomIn").click(function() {
            $image.cropper("zoom", 0.1);
        });

        $("#zoomOut").click(function() {
            $image.cropper("zoom", -0.1);
        });

        $("#rotateLeft").click(function() {
            $image.cropper("rotate", 45);
        });

        $("#rotateRight").click(function() {
            $image.cropper("rotate", -45);
        });

        $("#setDrag").click(function() {
            $image.cropper("setDragMode", "crop");
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

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.demo1').colorpicker();

        var divStyle = $('.back-change')[0].style;
        $('#demo_apidemo').colorpicker({
            color: divStyle.backgroundColor
        }).on('changeColor', function(ev) {
            divStyle.backgroundColor = ev.color.toHex();
        });

        $('.clockpicker').clockpicker();

        $('input[name="daterange"]').daterangepicker();

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });


        $(".touchspin1").TouchSpin({
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin2").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin3").TouchSpin({
            verticalbuttons: true,
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });


    });

    $(".select2").select2();

    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_2").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_3").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        postfix: "°",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_4").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });

    $("#ionrange_5").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " km",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });

    $(".dial").knob();

    $("#basic_slider").noUiSlider({
        start: 40,
        behaviour: 'tap',
        connect: 'upper',
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#range_slider").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#drag-fixed").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });

</script>

<script>

    function productTypeSelected (e) {
        if (e.value === "goods") {
            // Getting the parent container
            var invInformationSection = document.getElementsByName("inventory_information")
            // Getting each element in the parent that's an input field
            for (parent of invInformationSection){
                for (input of parent.getElementsByTagName("input")){
                    // Removing the readonly attribute
                    input.removeAttribute("readonly", true)
                }
            }
            // Enabling the select element
            var invInformationSectionLabel = document.getElementsByName("inventory_account")[0]
            invInformationSectionLabel.removeAttribute("disabled", true)
            // Instance of chosen on the select element
            $(".inventory-account-chosen").chosen(
                {allow_single_deselect:true},
                {disable_search_threshold:10},
                {no_results_text:'Oops, nothing found!'},
                {width:"95%"}
            );
            // Changing the inventory information section heading
            var inventoryHeading = document.getElementsByName("inventory_information_header")[0]
            inventoryHeading.innerHTML = "INVENTORY INFORMATION"
        } else if (e.value === "services") {
            // Getting the parent container
            var invInformationSection = document.getElementsByName("inventory_information")
            // Getting each element in the parent that's an input field
            for (parent of invInformationSection){
                for (inputElement of parent.getElementsByTagName("input")){
                    // Setting each element to readonly
                    inputElement.setAttribute("readonly", true)
                }
            }
            // Destroying the instance of chosen that was making it hard to disable the inventory account select element
            $(".inventory-account-chosen").chosen("destroy");
            // Disabling the select element
            var invInformationSectionLabel = document.getElementsByName("inventory_account")[0]
            invInformationSectionLabel.setAttribute("disabled", true)
            // Changing the inventory information section heading
            var inventoryHeading = document.getElementsByName("inventory_information_header")[0]
            inventoryHeading.innerHTML = "INVENTORY INFORMATION (Not Applicable for a Service)"
        }
    }

</script>

<script>
    function notInventory (e) {
        console.log("e.value")
        console.log(e)
        if (e.checked == true) {
            // Getting the parent container
            var invInformationSection = document.getElementsByName("inventory_information")
            // Getting each element in the parent that's an input field
            for (parent of invInformationSection){
                for (input of parent.getElementsByTagName("input")){
                    // Removing the readonly attribute
                    input.removeAttribute("readonly", true)
                }
            }
            // Enabling the select element
            var invInformationSectionLabel = document.getElementsByName("inventory_account")[0]
            invInformationSectionLabel.removeAttribute("disabled", true)
            // Instance of chosen on the select element
            $(".inventory-account-chosen").chosen(
                {allow_single_deselect:true},
                {disable_search_threshold:10},
                {no_results_text:'Oops, nothing found!'},
                {width:"95%"}
            );
            // Changing the inventory information section heading
            var inventoryHeading = document.getElementsByName("inventory_information_header")[0]
            inventoryHeading.innerHTML = "INVENTORY INFORMATION"
        } else if (e.checked == false) {
            // Getting the parent container
            var invInformationSection = document.getElementsByName("inventory_information")
            // Getting each element in the parent that's an input field
            for (parent of invInformationSection){
                for (inputElement of parent.getElementsByTagName("input")){
                    // Setting each element to readonly
                    inputElement.setAttribute("readonly", true)
                }
            }
            // Destroying the instance of chosen that was making it hard to disable the inventory account select element
            $(".inventory-account-chosen").chosen("destroy");
            // Disabling the select element
            var invInformationSectionLabel = document.getElementsByName("inventory_account")[0]
            invInformationSectionLabel.setAttribute("disabled", true)
            // Changing the inventory information section heading
            var inventoryHeading = document.getElementsByName("inventory_information_header")[0]
            inventoryHeading.innerHTML = "INVENTORY INFORMATION (Not tracking for this product)"
        }
    }

</script>
@endsection
