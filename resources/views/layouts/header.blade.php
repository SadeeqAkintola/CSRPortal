<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="{{ url('/') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>CSR</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{{ config('app.name', 'CSRDataReporting') }}</span>
  </a>



  <style>
    body {
      margin: 0;
    }

    /*#over img {*/
      /*margin-left: auto;*/
      /*margin-right: auto;*/
      /*display: block;*/
    /*}*/
  </style>
  {{--<div id="over" style="position:center">--}}
    {{--<img src="Images/ssl-logo.jpg" class="img-responsive">--}}

  {{--</div>--}}

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
  <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">



  <div class="nav navbar-nav">




  <div class="img" href="http://www.lafarge.com.ng">
  <img class="img-responsive" src="images/Lafarge2.gif" href="http://www.lafarge.com.ng"></li>
  </div>
  <div class="navbar-header">
  <div class="navbar-header"><a style="font-size: 20px; font-weight: 200" class="navbar-brand" href="/login">CSR Data Reporting and Visualization Portal</a></div>
  </div>

  <div class="navbar-collapse collapse navbar-inverse-collapse" style="font-size: 15px"> </div>


  <div class="img">
  <img class="img-responsive" src="images/Holcim2.png" href="http://www.lafargeholcim.com" /></li>
  </div>

  <!-- User Account Menu -->
  <li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <!-- The user image in the navbar-->
  <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image">
  <!-- hidden-xs hides the username on small devices so only the image appears. -->
  {{ Auth::user()->username }}


  </a><a href="/logout"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span> Log out</a>

  </li>
  </div>
  </div>





  </nav>
</header>
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--{{ csrf_field() }}--}}
{{--</form>--}}