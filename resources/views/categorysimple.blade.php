@section('outsource')
    @parent
    <link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}"/>
    <link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/default.css" />
    <link rel="stylesheet" type="text/css" href="ResponsiveMultiLevelMenu/css/component.css" />
    <script src="ResponsiveMultiLevelMenu/js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="ResponsiveMultiLevelMenu/js/jquery.dlmenu.js"></script>
    <script>

        $(document).ready(function() {

            $('#cat-container').dlmenu({
                animationClasses: {classin: 'dl-animate-in-3', classout: 'dl-animate-out-3'}
            });

        });
    </script>

@endsection

@include("category")