@extends('master')
@section('outsource')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.js"></script>
    <script src="js/masonry-horizontal.js"></script>
@endsection

@section('menu')
    <li class=""><a href="home">Website Home</a></li>
    <li class=""><a href="#goals">Goals</a></li>
    <li class=""><a href="#industry">Industry</a></li>
    <li class=""><a href="#research">Research</a></li>
    <li class=""><a href="#tools">Tools</a></li>
    <li class=""><a href="#members">Members</a></li>
@endsection