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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/actions.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('outsource')
    <script>

        $(document).ready(function(){
            $('#sub').click(function(){
               $("#admin-filter").submit();
            });

            $("#admin-filter").submit(function(e)
            {
                e.preventDefault(); //STOP default action
                var postData = $(this).serializeArray();
//                var mytype = {};
//                mytype["type"] = $('.tab-pane.active').attr('data');
                postData.push ({name:'type',value:$('.tab-pane.active').attr('data')});
                alert(postData.toString());
                var formURL = $(this).attr("action");
                $.ajax(
                        {

                            url : formURL,
                            type: "POST",
                            data : postData,
                            success:function(data)
                            {
                                $('.tab-pane.active').html(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert("error"); //if fails
                            }
                        });
               // e.unbind(); //unbind. to stop multiple form submit.
            });
        });


    </script>

</head>
<body data-spy="scroll" data-target=".navbar-main" data-offset="60">
<div class="container">

    <div class="row">
        <div class="col-sm-3" id="nav-container" data-spy="affix" data-offset-top="8">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#tab1">Services</a></li>
                <li><a data-toggle="pill" href="#tab2">Blogs</a></li>
                <li><a data-toggle="pill" href="#tab3">News</a></li>
                <li><a data-toggle="pill" href="#tab4">Events</a></li>
                <li><a data-toggle="pill" href="#tab5">Researches</a></li>
                <li><a data-toggle="pill" href="#tab6">Contact</a></li>
                <li><a data-toggle="pill" href="#tab7">Galleries</a></li>
                <li><a data-toggle="pill" href="#tab8">Members</a></li>
                <li><a data-toggle="pill" href="#tab9">Newsletter</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3" id="main-container">
            <div class="form-wraper">
                <form id="admin-filter" action="adminfilter" method="post">

                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" class="form-control" name="query" id="search">
                        <label for="sel1">Select list:</label>
                        <select class="form-control" id="sel1" name="sort">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        <input type="submit" class="btn btn-primary form-control">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <hr>
            <div class="tab-content">
                <div id="tab1" class="tab-pane fade in active" data="services">
                    <h3>HOME</h3>
                    <p>Some content.</p>
                </div>
                <div id="tab2" class="tab-pane fade" data="blogs">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="tab3" class="tab-pane fade" data="news">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab4" class="tab-pane fade" data="events">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="tab5" class="tab-pane fade" data="researches">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab6" class="tab-pane fade" data="contacts">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab7" class="tab-pane fade" data="galleries">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab8" class="tab-pane fade" data="members">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab9" class="tab-pane fade" data="newsletter">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>

        </div>
    </div>


</div>


</body>
</html>