<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Shahid Beheshti university Of Tehran - Software Testing Laboratories</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropdown.css')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p style="color: #ffffff">Please enter required password.</p>
    <form action="adminlogin" method="post">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Enter" class="btn btn-primary" >
    </form>
</body>
