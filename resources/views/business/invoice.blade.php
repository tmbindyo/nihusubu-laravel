@extends('business.layouts.app')

@section('title', ' Invoice')

@section('css')
    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Invoice</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('business.dashboard')}}">Home</a>
            </li>
            <li>
                <a href="{{route('business.sales')}}">Sales</a>
            </li>
            <li>
                <a href="{{route('business.invoices')}}">Invoices</a>
            </li>
            <li class="active">
                <strong>Invoice</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <a href="#" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
            <a href="{{route('business.invoice.print',1)}}" target="_blank" class="btn btn-success btn-outline"><i class="fa fa-print"></i> Print Invoice </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content p-xl">
        <div class="row">
            <div class="col-sm-6">
                <h5>From:</h5>
                <address>
                    <strong>Inspinia, Inc.</strong><br>
                    106 Jorg Avenu, 600/10<br>
                    Chicago, VT 32456<br>
                    <abbr title="Phone">P:</abbr> (123) 601-4590
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <h4>Invoice No.</h4>
                <h4 class="text-navy">INV-000567F7-00</h4>
                <span>To:</span>
                <address>
                    <strong>Corporate, Inc.</strong><br>
                    112 Street Avenu, 1080<br>
                    Miami, CT 445611<br>
                    <abbr title="Phone">P:</abbr> (120) 9000-4321
                </address>
                <p>
                    <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br/>
                    <span><strong>Due Date:</strong> March 24, 2014</span>
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
                    <th>Tax</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><div><strong>Admin Theme with psd project layouts</strong></div>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                    <td>1</td>
                    <td>$26.00</td>
                    <td>$5.98</td>
                    <td>$31,98</td>
                </tr>
                <tr>
                    <td><div><strong>Wodpress Them customization</strong></div>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </small></td>
                    <td>2</td>
                    <td>$80.00</td>
                    <td>$36.80</td>
                    <td>$196.80</td>
                </tr>
                <tr>
                    <td><div><strong>Angular JS & Node JS Application</strong></div>
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                    <td>3</td>
                    <td>$420.00</td>
                    <td>$193.20</td>
                    <td>$1033.20</td>
                </tr>

                </tbody>
            </table>
        </div><!-- /table-responsive -->

        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>Sub Total :</strong></td>
                <td>$1026.00</td>
            </tr>
            <tr>
                <td><strong>TAX :</strong></td>
                <td>$235.98</td>
            </tr>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>$1261.98</td>
            </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button class="btn btn-primary"><i class="fa fa-dollar"></i> Mark as Sale </button>
        </div>

        <div class="well m-t"><strong>Comments</strong>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
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
