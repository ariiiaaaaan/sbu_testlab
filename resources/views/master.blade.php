<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shahid Beheshti university Of Tehran - Software Testing Laboratories</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    @if($lang == "fa")
        <link rel="stylesheet" type="text/css" href="{{asset('css/farsi.css')}}"/>
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
        @endif
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="js/actions.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.lang").on("click",function(e){
                e.preventDefault();
                alert("English Version Will Be Published Soon.");
            });
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('outsource')
        <link rel="stylesheet" type="text/css" href="{{asset('css/mobile.css')}}"/>
</head>
<body data-spy="scroll" data-target=".navbar-main" data-offset="60" class="body-{{$lang or "fa"}}">
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12" id="nav-container" data-spy="affix" data-offset-top="8">

            <nav class="navbar navbar-inverse "  id="main-menu">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img class="logo-icon" src="images/logo-icon.png" ></a>
                    </div>
                    <div class="navbar-main collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            @yield('menu')
                        </ul>
                    </div>
                    <div class="navbar-form">
                        <div class="navbar-search-wrapper">
                            <form id="navbar-search" action="search" method="get">
                                <input class="text hide" type="text" name="query">
                                <span class="fa fa-search fa-2x"><input type="submit" class="submit" value=" "></span>
                            </form>
                        </div>
                        <a href="#home" class="social"><span class="fa fa-facebook fa-2x"></span></a>
                        <a href="#home" class="social"><span class="fa fa-twitter fa-2x"></span></a>
                        <a href="#home" class="social"><span class="fa fa-telegram fa-2x"></span></a>
                        <a href="lang?lang={{$lang == "en" ? "fa":"en"}}" class="lang"><span class="fa fa-2x">{{$lang == "en" ? "FA":"EN"}}</span></a>

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

    @yield('absolutes')
</body>
</html>