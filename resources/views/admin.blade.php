<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Shahid Beheshti university Of Tehran - Software Testing Laboratories</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/actions.js"></script>
    <script src="js/core.js"></script>
    <script src="js/touch.js"></script>
    <script src="js/scrollbar.js"></script>
    <script src="js/dropdown.js"></script>
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
                postData.push ({name:'entity',value:$('.tab-pane.active').attr('data-entity')});
                postData.push ({name:'type',value:$('.tab-pane.active').attr('data-type')});
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

            $("#admin-add-button").click('show.bs.tab',function(e)
            {

                var postData = {type:$('.tab-pane.active').attr('data-type'),entity:$('.tab-pane.active').attr('data-entity')};
                var formURL ="getinsertform";
                alert($('.tab-pane.active').attr('data-type'));
                $.ajax(
                        {
                            url : formURL,
                            type: "GET",
                            data : postData,
                            success:function(data)
                            {
                                $('#insert-modal').modal();
                                $('#insert-modal .modal-body').html(data);
                                $('#insert-modal').modal("show");
                                $(".cat-select").dropdown();
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert("error"); //if fails
                            }
                        });
                // e.unbind(); //unbind. to stop multiple form submit.
            });

            $('.nav-pills a').on('shown.bs.tab',function(e) {
                var postData = {type:$('.tab-pane.active').attr('data-type'),entity:$('.tab-pane.active').attr('data-entity')};
                var formURL = "getadmintable";
                $.ajax(
                        {
                            url : formURL,
                            type: "GET",
                            data : postData,
                            success:function(data)
                            {
                                $('.tab-pane.active').html(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert("error loading table"); //if fails
                            }
                        });
            });

            $(document).on('click','.pager a',function(e) {
                e.preventDefault();
                var postData = {type:$('.tab-pane.active').attr('data-type'),entity:$('.tab-pane.active').attr('data-entity')};
                var formURL = "getadmintable";
                formURL =$(this).attr('href');
                $.ajax(
                        {
                            url : formURL,
                            type: "GET",
                            data : postData,
                            success:function(data)
                            {
                                $('.tab-pane.active').html(data);
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert("error loading table"); //if fails
                            }
                        });
            });

            @if(session('errorcode'))
            $('#insert-modal').modal();
            $('#insert-modal').modal("show");
            @endif

              $("body").on("click",".add-img-input",function(){
                        $form = '<input type="file" name="img[]"><input type="text" placeholder="Title" name="imgtitle[]">';
                        $(".form-group.img").append($form);
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
                <li><a data-toggle="pill" href="#tab9">Company</a></li>
                <li><a data-toggle="pill" href="#tab10">Newsletter</a></li>
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
            <input type="button" class="btn btn-primary" id="admin-add-button" value="Add New Content">
            <hr>
            <div class="tab-content">
                <div id="tab1" class="tab-pane fade in active" data-entity="contents" data-type="services">
                    <h3>HOME</h3>
                    <p>Some content.</p>
                </div>
                <div id="tab2" class="tab-pane fade" data-entity="contents" data-type=="blogs">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="tab3" class="tab-pane fade" data-entity="contents" data-type="news">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab4" class="tab-pane fade" data-entity="contents" data-type="events">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="tab5" class="tab-pane fade" data-entity="contents" data-type="researches">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab6" class="tab-pane fade" data-entity="contacts" data-type="contacts">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab7" class="tab-pane fade" data-entity="contents" data-type="galleries">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab8" class="tab-pane fade" data-entity="members" data-type="members">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab9" class="tab-pane fade" data-entity="contents" data-type="companies">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="tab10" class="tab-pane fade" data-entity="newsletter">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>

        </div>
    </div>

    <div id="insert-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New </h4>
                </div>
                @if ($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="modal-body">
                    @if(session('errorcode'))
                        @include('newcontentmodal',['type' => session('errorcode')])
                    @endif
                </div>
            </div>

        </div>
    </div>


</div>


</body>
</html>