<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Vue-Laravel Admin Tempalte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="wrapper">

    <top-navbar></top-navbar>

    <side-bar></side-bar>


    <div class="content-page">
        <div class="content" >
            <pagebox></pagebox>

            <router-view></router-view>

            <vue-progress-bar></vue-progress-bar>

        </div>

        <pagef></pagef>

    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/all.js')}}"></script>

</body>

</html>

