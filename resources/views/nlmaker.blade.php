<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Shahid Beheshti university Of Tehran - Software Testing Laboratories</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('outsource')
    <script>

    </script>

</head>
<body data-spy="scroll" data-target=".navbar-main" data-offset="60">

<a href="logout" class="btn-primary" id="logout"><span class="fa fa-sign-out fa-2x"></span></a>
@if($lang == "en")
    <a href="../admin" class="btn-primary" id="lang">FA</a>
@else
    <a href="admin/en" class="btn-primary" id="lang">EN</a>
@endif

    <div class="container" id="admin-container">
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3" id="main-container">
                <input type="button" class="btn btn-primary" id="nl-preview" value="See Preview">
                <form id="newsletter-form" action="insert" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

