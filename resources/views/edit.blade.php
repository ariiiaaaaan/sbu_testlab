<html>
<head>
    <script>
        $(document).ready(function(){
            $("body").on("click",".add-img-input",function(){
                $form = '<input type="file" class="small" name="img[]"><input type="text" placeholder="Title" name="imgtitle[]">';
                $(".form-group.img").append($form);
            });
            var recnum = 0;
            $("body").on("click",".add-record-input",function(){
                var form = '<div class="form-group"><label>Record:</label><div class="record-form"><div class="form-group"><span>institute:</span><input type="text" class="small" name="rec[0][institute]"></div><div class="form-group"><span>position:</span><input type="text" class="small" name="rec[0][position]"></div><div class="form-group"><span>start:</span><input type="text" class="small" name="rec[0][start]"></div><div class="form-group"><span>end:</span><input type="text" class="small" name="rec[0][end]"></div><div class="form-group"><span>type:</span> <select name="rec[0][type]"><option value="academic">academic</option><option value="industrial">industrial</option></select></div></div></div>';
                recnum = recnum + 1;
                var regex = new RegExp('0', 'g');
                $(".form-group.rec").append(form.replace(regex,recnum.toString()));
            });

        });
    </script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div>
                <a href="admin" class="btn-primary center-block text-center">Back To Admin</a>
            </div>
            @include('newcontentmodal',['entity'=>$entity,'type'=>$type,'mode'=> 0 ,'tags'=>$tags,'cats'=>$cats])
        </div>
    </div>
</div>

</body>
</html>