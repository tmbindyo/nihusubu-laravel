@extends('business.layouts.app')

@section('title', ' Projects')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Projects Feed</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="{{route('business.projects',$institution->portal)}}">Projects</a>
                </li>
                <li class="active">
                    <strong>Feed</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="text-center float-e-margins p-md">
                        <span>Turn on/off color/background or orientation version: </span>
                        <a href="#" class="btn btn-xs btn-primary" id="lightVersion">Light version</a>
                        <a href="#" class="btn btn-xs btn-primary" id="darkVersion">Dark version</a>
                        <a href="#" class="btn btn-xs btn-primary" id="leftVersion">Left version</a>
                    </div>
                    <div class="ibox-content" id="ibox-content">

                        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-briefcase"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Meeting</h2>
                                    <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                                    </p>
                                    <a href="#" class="btn btn-sm btn-primary"> More info</a>
                                    <span class="vertical-date">
                                        Today <br/>
                                        <small>Dec 24</small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Send documents to Mike</h2>
                                    <p>Sample Input dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                    <a href="#" class="btn btn-sm btn-success"> Download document </a>
                                    <span class="vertical-date">
                                        Today <br/>
                                        <small>Dec 24</small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-coffee"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Coffee Break</h2>
                                    <p>Go to shop and find some products. Sample Input dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                                    <a href="#" class="btn btn-sm btn-info">Read more</a>
                                    <span class="vertical-date"> Yesterday <br/><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon yellow-bg">
                                    <i class="fa fa-phone"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Phone with Jeronimo</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                    <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-user-md"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Go to the doctor dr Smith</h2>
                                    <p>Find some issue and go to doctor. Sample Input dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </p>
                                    <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-comments"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>Chat with Monica and Sandra</h2>
                                    <p>Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
                                    <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
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

    <!-- Peity -->
    <script src="{{ asset('inspinia') }}/js/demo/peity-demo.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){

            // Local script for demo purpose only
            $('#lightVersion').click(function(event) {
                event.preventDefault()
                $('#ibox-content').removeClass('ibox-content');
                $('#vertical-timeline').removeClass('dark-timeline');
                $('#vertical-timeline').addClass('light-timeline');
            });

            $('#darkVersion').click(function(event) {
                event.preventDefault()
                $('#ibox-content').addClass('ibox-content');
                $('#vertical-timeline').removeClass('light-timeline');
                $('#vertical-timeline').addClass('dark-timeline');
            });

            $('#leftVersion').click(function(event) {
                event.preventDefault()
                $('#vertical-timeline').toggleClass('center-orientation');
            });


        });
    </script>

@endsection
