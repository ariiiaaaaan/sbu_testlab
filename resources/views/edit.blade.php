<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/default.css" />
    <link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/component.css" />
    <script src="ResponsiveMultiLevelMenu/js/modernizr.custom.js"></script>
    <script src="ResponsiveMultiLevelMenu/js/jquery.dlmenu.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        $(document).ready(function(){
            $("body").on("click",".add-img-input",function(){
                $form = '<input type="file" name="img[]"><input type="text" class="small" placeholder="Title" name="imgtitle[]"><select name="highlight[]"><option value="false">Normal</option><option value="true">Highlight</option></select>';
                $(".form-group.img").append($form);
            });
            var recnum = 0;
            $("body").on("click",".add-record-input",function(){
                var form = '<div class="form-group"><label>Record:</label><div class="record-form"><div class="form-group"><span>institute:</span><input type="text" class="small" name="rec[0][institute]"></div><div class="form-group"><span>position:</span><input type="text" class="small" name="rec[0][position]"></div><div class="form-group"><span>start:</span><input type="text" class="small" name="rec[0][start]"></div><div class="form-group"><span>end:</span><input type="text" class="small" name="rec[0][end]"></div><div class="form-group"><span>type:</span> <select name="rec[0][type]"><option value="academic">academic</option><option value="industrial">industrial</option><option value="teaching">teaching</option></select></div></div></div>';
                recnum = recnum + 1;
                var regex = new RegExp('0', 'g');
                $(".form-group.rec").append(form.replace(regex,recnum.toString()));
            });

            $(function() {
                $('#cat-container').dlmenu({
                    animationClasses: {classin: 'dl-animate-in-3', classout: 'dl-animate-out-3'}
                });
            });

        });
    </script>
</head>
<body id="edit">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1" id="form-wrapper">
            <div>
                <a href="admin" id="back" class="btn-primary center-block text-center">Back To Admin</a>
            </div>
            @include('newcontentmodal',['entity'=>$entity,'type'=>$type,'mode'=> 0 ,'tags'=>$tags,'cats'=>$cats])
        </div>
    </div>
</div>
</body>
</html>