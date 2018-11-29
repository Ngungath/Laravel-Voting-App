@extends('layouts.election-template')
@section('content')

<!-- header -->
{{--
    <div class="header_bg">
        <div class="container">
            <!-----start-header----->
            <div class="header">
                <div class="logo">
                    <a href="index.html"><img src="images/logo1.png" alt=" " /></a>
                </div>
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="act"><a href="index.html">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Elections<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="party">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="about.html">Current Elections</a></li>
                                                <li class="divider"></li>
                                                <li><a href="about.html">Past Elections</a></li>
                                                <li class="divider"></li>
                                                <li><a href="about.html">Future Elections</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="results.html">Results</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="{!! url('/register') !!}">Register</a></li>
                            <li><a href="{!! url('/login') !!}">Login</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->    
                    
                </nav>
            </div>
        </div>
    </div>
    <div class="header_bottom">
    </div>
    --}}
<!-- //end-header -->
<!-- banner -->

    <div class="banner">
        <div class="container">
               
            </div>
            <!-- FlexSlider -->
                <script defer src="{{asset('election-template/js/jquery.flexslider.js')}}"></script>
                <script type="text/javascript">
                                        $(window).load(function(){
                                          $('.flexslider').flexslider({
                                            animation: "slide",
                                            start: function(slider){
                                              $('body').removeClass('loading');
                                            }
                                          });
                                        });
                                      </script>
            <!-- //FlexSlider -->
    </div>
<!-- //banner -->
@endsection