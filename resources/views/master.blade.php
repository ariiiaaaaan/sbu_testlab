<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Shahid Beheshti university Of Tehran - Software Testing Laboratories</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="js/actions.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('outsource')
</head>
<body data-spy="scroll" data-target=".navbar-main" data-offset="60">
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12" id="nav-container" data-spy="affix" data-offset-top="8">

            <nav class="navbar navbar-inverse "  id="main-menu">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img class="logo-icon" src="images/logo-icon.png" ></a>
                    </div>
                    <div class="navbar-main">
                        <ul class="nav navbar-nav">
                            @yield('menu')
                        </ul>
                    </div>
                    <div class="navbar-form">
                        <div class="navbar-search-wrapper">
                            <form id="navbar-search" action="search" method="get">
                                <input class="text hide" type="text">
                                <span class="fa fa-search fa-2x"><input type="submit" class="submit" value=" "></span>
                            </form>
                        </div>
                        <a href="#home" class="social"><span class="fa fa-facebook fa-2x"></span></a>
                        <a href="#home" class="social"><span class="fa fa-twitter fa-2x"></span></a>
                        <a href="#home" class="social"><span class="fa fa-google-plus fa-2x"></span></a>
                        @if(Auth::check())
                            <a href="#home" class="login"><span class="fa fa-user fa-2x"></span></a>
                        @else
                            <a href="#home" class="profile"><span class="fa fa-user fa-2x"></span></a>
                        @endif
                    </div>
                </div>
            </nav>

        </div>
    </div>

    <div class="row">

        <div class="col-sm-12" id="main-container">
            @yield('content')

        </div>
    </div>


</div>

    @yield('absolutes');
</body>
</html>