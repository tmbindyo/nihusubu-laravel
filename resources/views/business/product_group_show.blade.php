@extends('business.layouts.app')

@section('title', ' Product Group '.$productGroup->name)

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Product Group {{$productGroup->name}}</h2>
        <ol class="breadcrumb">
            <li>
                <strong><a href="{{route('business.calendar',$institution->portal)}}">Home</a></strong>
            </li>
            <li>
                <a href="#">Products</a>
            </li>
            <li>
                <strong><a href="{{route('business.product.groups',$institution->portal)}}">Product Groups</a></strong>
            </li>
            <li class="active">
                <strong>Product Group {{$productGroup->name}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            {{-- <a href="#" data-toggle="modal" data-target="#productRegistration" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Add </a> --}}
            @can('edit product group')
                <a href="{{route('business.product.group.edit',['portal'=>$institution->portal, 'id'=>$productGroup->id])}}"class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
            @endcan
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">

        <div class="col-sm-4">
            <h1 class="m-b-xs">
                26,900
            </h1>
            <small>
                Sales in current month
            </small>
            <div id="sparkline1" class="m-b-sm"></div>
            <div class="row">
                <div class="col-xs-4">
                    <small class="stats-label">Pages / Visit</small>
                    <h4>236 321.80</h4>
                </div>

                <div class="col-xs-4">
                    <small class="stats-label">% New Visits</small>
                    <h4>46.11%</h4>
                </div>
                <div class="col-xs-4">
                    <small class="stats-label">Last week</small>
                    <h4>432.021</h4>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <h1 class="m-b-xs">
                98,100
            </h1>
            <small>
                Sales in last 24h
            </small>
            <div id="sparkline2" class="m-b-sm"></div>
            <div class="row">
                <div class="col-xs-4">
                    <small class="stats-label">Pages / Visit</small>
                    <h4>166 781.80</h4>
                </div>

                <div class="col-xs-4">
                    <small class="stats-label">% New Visits</small>
                    <h4>22.45%</h4>
                </div>
                <div class="col-xs-4">
                    <small class="stats-label">Last week</small>
                    <h4>862.044</h4>
                </div>
            </div>


        </div>
        <div class="col-sm-4">

            <div class="row m-t-xs">
                <div class="col-xs-6">
                    <h5 class="m-b-xs">Income last month</h5>
                    <h1 class="no-margins">160,000</h1>
                    <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                </div>
                <div class="col-xs-6">
                    <h5 class="m-b-xs">Sals current year</h5>
                    <h1 class="no-margins">42,120</h1>
                    <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                </div>
            </div>


            <table class="table small m-t-sm">
                <tbody>
                <tr>
                    <td>
                        <strong>142</strong> Projects

                    </td>
                    <td>
                        <strong>22</strong> Messages
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Comments
                    </td>
                    <td>
                        <strong>54</strong> Articles
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>154</strong> Companies
                    </td>
                    <td>
                        <strong>32</strong> Clients
                    </td>
                </tr>
                </tbody>
            </table>



        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="small pull-left col-md-3 m-l-lg m-t-md">
                <strong>Sales char</strong> have evolved over the years sometimes.
            </div>
            <div class="small pull-right col-md-3 m-t-md text-right">
                <strong>There are many</strong> variations of passages of Lorem Ipsum available, but the majority have suffered.
            </div>
            <div class="flot-chart m-b-xl">
                <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Monthly</span>
                    <h5>Views</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">386,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total views</small>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Annual</span>
                    <h5>Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,800</h1>
                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>visits</h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins">406,42</h1>
                            <div class="font-bold text-navy">44% <i class="fa fa-level-up"></i> <small>Rapid pace</small></div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins">206,12</h1>
                            <div class="font-bold text-navy">22% <i class="fa fa-level-up"></i> <small>Slow pace</small></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Monthly income</h5>
                    <div class="ibox-tools">
                        <span class="label label-primary">Updated 12.2015</span>
                    </div>
                </div>
                <div class="ibox-content no-padding">
                    <div class="flot-chart m-t-lg" style="height: 55px;">
                        <div class="flot-chart-content" id="flot-chart1"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">


    <div class="row">
        {{--  foreach  --}}
        @foreach($productGroup->productGroupProducts as $product)
            <div class="col-md-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5 class="text-center">{{$product->name}}</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            {{--                            <img alt="image" class="img-fluid" src="img/profile_big.jpg">--}}
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong>{{$institution->currency->name}} {{$product->taxed_selling_price}}</strong></h4>
                            @isset($product->unit_id)
                                <p><i class="fa fa-map-marker"></i> {{$product->unit->name}}</p>
                            @endisset
                            <h5>
                                About
                            </h5>
                            <p>
                                {!! \Illuminate\Support\Str::limit($product->name, 205, $end='...') !!}
                            </p>
{{--                            todo graph of product details--}}
{{--                            <div class="row m-t-lg">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <span class="bar">5,3,9,6,5,9,7,3,5,2</span>--}}
{{--                                    <h5><strong>169</strong> Sales</h5>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <span class="line">5,3,9,6,5,9,7,3,5,2</span>--}}
{{--                                    <h5><strong>28</strong> Views</h5>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>--}}
{{--                                    <h5><strong>240</strong> Followers</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <br>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{--  <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>--}}
                                    </div>
                                    <div class="col-md-6">
                                        @can('view product')
                                            <a href="{{route('business.product.show',['portal'=>$institution->portal, 'id'=>$product->id])}}" type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-arrow-right"></i> View</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--  endforeach  --}}

        {{--  foreach  --}}
{{--        @foreach($productGroup->products as $product)--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="ibox">--}}
{{--                    <div class="ibox-content product-box">--}}

{{--                        <div class="product-imitation">--}}
{{--                            [ INFO ]--}}
{{--                        </div>--}}
{{--                        <div class="product-desc">--}}
{{--                            <span class="product-price">--}}
{{--                                {{$product->selling_price}}--}}
{{--                            </span>--}}
{{--                            <small class="text-muted">Category</small>--}}
{{--                            <a href="{{route('business.product.show',['portal'=>$institution->portal, 'id'=>$product->id])}}" class="product-name"> {{$product->name}}</a>--}}



{{--                            <div class="small m-t-xs">--}}
{{--                                {!! Str::limit($product->description, 100) !!}--}}
{{--                            </div>--}}

{{--                            <div class="m-t text-righ">--}}

{{--                                <a href="{{route('business.product.show',['portal'=>$institution->portal, 'id'=>$product->id])}}" class="btn btn-xs btn-outline btn-primary">View <i class="fa fa-long-arrow-right"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
        {{--  endforeach  --}}

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
            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1C84C6',
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
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
        ];
        var data2 = [
            [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
        ];
        $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1,  data2
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
    var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
    var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

    var data1 = [
        { label: "Data 1", data: d1, color: '#17a084'},
        { label: "Data 2", data: d2, color: '#127e68' }
    ];
    $.plot($("#flot-chart1"), data1, {
        xaxis: {
            tickDecimals: 0
        },
        series: {
            lines: {
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                },
            },
            points: {
                width: 0.1,
                show: false
            },
        },
        grid: {
            show: false,
            borderWidth: 0
        },
        legend: {
            show: false,
        }
    });
</script>

    <script>
    var options = { $AutoPlay: 1 };
    var jssor_1_slider = new $JssorSlider$("jssor_1", options);
</script>

@endsection
