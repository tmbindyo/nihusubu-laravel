@extends('personal.layouts.app')

@section('title', ' Investments')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="{{ asset('inspinia') }}/css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

@endsection

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Investments</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('personal.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="#">Trends</a>
                </li>
                <li class="active">
                    <strong>Investments</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <a href="#" class="btn btn-white btn-xs pull-right">Edit project</a>
                                    <h2>Contract with Zender Company</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">

                                    <dt>Created by:</dt> <dd>Alex Smith</dd>
                                    <dt>Messages:</dt> <dd>  162</dd>
                                    <dt>Client:</dt> <dd><a href="#" class="text-navy"> Zender Company</a> </dd>
                                    <dt>Version:</dt> <dd> 	v1.4.2 </dd>
                                </dl>
                            </div>
                            <div class="col-lg-7" id="cluster_info">
                                <dl class="dl-horizontal" >

                                    <dt>Last Updated:</dt> <dd>16.08.2014 12:15:57</dd>
                                    <dt>Created:</dt> <dd> 	10.07.2014 23:36:57 </dd>
                                    <dt>Participants:</dt>
                                    <dd class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a3.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a1.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a2.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a4.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a5.jpg"></a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Completed:</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                        <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
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
                                                <li class="active"><a href="#tab-1" data-toggle="tab">Users messages</a></li>
                                                <li class=""><a href="#tab-2" data-toggle="tab">Last activity</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <div class="feed-activity-list">
                                                    <div class="feed-element">
                                                        <a href="#" class="pull-left">
                                                            <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a2.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right">2h ago</small>
                                                            <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                            <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                            <div class="well">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="feed-element">
                                                        <a href="#" class="pull-left">
                                                            <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a3.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right">2h ago</small>
                                                            <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                            <small class="text-muted">2 days ago at 8:30am</small>
                                                        </div>
                                                    </div>
                                                    <div class="feed-element">
                                                        <a href="#" class="pull-left">
                                                            <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a4.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right text-navy">5h ago</small>
                                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                            <div class="actions">
                                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="feed-element">
                                                        <a href="#" class="pull-left">
                                                            <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a5.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right">2h ago</small>
                                                            <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                            <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                            <div class="well">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="feed-element">
                                                        <a href="#" class="pull-left">
                                                            <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/profile.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right">23h ago</small>
                                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                        </div>
                                                    </div>
                                                    <div class="feed-element">
                                                        <a href="#" class="pull-left">
                                                            <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/a7.jpg">
                                                        </a>
                                                        <div class="media-body ">
                                                            <small class="pull-right">46h ago</small>
                                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab-2">

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Title</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Comments</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                        </td>
                                                        <td>
                                                            Create project in webapp
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                        </td>
                                                        <td>
                                                            Various versions
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                        </td>
                                                        <td>
                                                            There are many variations
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                        </td>
                                                        <td>
                                                            Latin words
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Latin words, combined with a handful of model sentence structures
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                        </td>
                                                        <td>
                                                            The generated Lorem
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                        </td>
                                                        <td>
                                                            The first line
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                        </td>
                                                        <td>
                                                            The standard chunk
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                        </td>
                                                        <td>
                                                            Lorem Ipsum is that
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                        </td>
                                                        <td>
                                                            Contrary to popular
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                                                            </p>
                                                        </td>

                                                    </tr>

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
        <div class="col-lg-3">
            <div class="wrapper wrapper-content project-manager">
                <h4>Project description</h4>
                <img src="{{ asset('inspinia') }}/img/zender_logo.png" class="img-responsive">
                <p class="small">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
                    even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                </p>
                <p class="small font-bold">
                    <span><i class="fa fa-circle text-warning"></i> High priority</span>
                </p>
                <h5>Project tag</h5>
                <ul class="tag-list" style="padding: 0">
                    <li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
                    <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                    <li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
                    <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
                </ul>
                <h5>Project files</h5>
                <ul class="list-unstyled project-files">
                    <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                    <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                    <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                    <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                </ul>
                <div class="text-center m-t-md">
                    <a href="#" class="btn btn-xs btn-primary">Add files</a>
                    <a href="#" class="btn btn-xs btn-primary">Report contact</a>

                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">

        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="order_id">Order ID</label>
                        <input type="text" id="order_id" name="order_id" value="" placeholder="Order ID" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="status">Order status</label>
                        <input type="text" id="status" name="status" value="" placeholder="Status" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="customer">Customer</label>
                        <input type="text" id="customer" name="customer" value="" placeholder="Customer" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="date_added">Date added</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2014">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="date_modified">Date modified</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/06/2014">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="amount">Amount</label>
                        <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                            <tr>

                                <th>Order ID</th>
                                <th data-hide="phone">Customer</th>
                                <th data-hide="phone">Amount</th>
                                <th data-hide="phone">Date added</th>
                                <th data-hide="phone,tablet" >Date modified</th>
                                <th data-hide="phone">Status</th>
                                <th class="text-right">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    3214
                                </td>
                                <td>
                                    Customer example
                                </td>
                                <td>
                                    $500.00
                                </td>
                                <td>
                                    03/04/2015
                                </td>
                                <td>
                                    03/05/2015
                                </td>
                                <td>
                                    <span class="label label-primary">Pending</span>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{route('personal.investment.show',1)}}" class="btn-primary btn-outline btn btn-xs">View</a>
                                        <a href="{{route('personal.investment.edit',1)}}" class="btn-warning btn-outline btn btn-xs">Edit</a>
                                        <a href="{{route('personal.investment.delete',1)}}" class="btn-danger btn-outline btn btn-xs">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

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

    <!-- FooTable -->
    <script src="{{ asset('inspinia') }}/js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });

    </script>

@endsection
