<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="img" href="http://www.lafarge.com.ng">
        <img class="img-responsive" src="images/Lafarge2.gif" href="http://www.lafarge.com.ng"></li>
    </div>


    @if (Auth::check())
    <div class="navbar-header">
        <div class="navbar-header"><a style="font-size: 20px; font-weight: 200" class="navbar-brand" href="/admin/dashboard">CSR Data Reporting and Visualization Portal</a></div>
    </div>
    @else
        <div class="navbar-header"><a style="font-size: 20px; font-weight: 200" class="navbar-brand" href="/login">CSR Data Reporting and Visualization Portal</a></div>


    @endif

    <div class="navbar-collapse collapse navbar-inverse-collapse" style="font-size: 15px">


        <ul class="nav navbar-nav navbar-right">
         @if (Auth::check())
                <div class="dropdown">
                    <span>
                               {{ Auth::user()->name }}     .                   .                   .

                        <a href="/logout"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span> Log out</a>

                    </span>



                </div>
            @else
                <li><a href="/login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log in </a></li>

            @endif
        </ul>
    </div>
    <div class="img">
        <img class="img-responsive" src="images/Holcim2.png" href="http://www.lafargeholcim.com" /></li>
    </div>
</div>