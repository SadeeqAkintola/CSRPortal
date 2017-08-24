<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="img" href="http://www.lafarge.com.ng">
       <img class="img-responsive" src="images/Lafarge2.gif" href="http://www.lafarge.com.ng"></li>
    </div>
    <div class="navbar-header">
        <div class="navbar-header"><a style="font-size: 15px; font-weight: 200" class="navbar-brand" href="/">CSR Data Reporting and Visualization Portal</a></div>
    </div>

    <div class="navbar-collapse collapse navbar-inverse-collapse" style="font-size: 12px">

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Admin Setup
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a  style="font-size: 12px" href="/create-user">Users Setup</a></li>
                    <li><a  style="font-size: 12px" href="/create-role">Roles Setup</a></li>

                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Project Data Records
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a style="font-size: 12px" href="/create-project-record">Enter or Update Project Data Records</a></li>
                    <li><a style="font-size: 12px" href="/query-project-record">Query Project Data Records</a></li>

                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Reports
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a style="font-size: 12px" href="/report-by-plant">By Plant</a></li>
                    <li><a style="font-size: 12px" href="/report-by-pillar">By Pillar</a></li>
                    <li><a style="font-size: 12px" href="/report-by-year">By Year</a></li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">CPA Board
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a style="font-size: 12px" href="/create-cpa-record">Enter or Update Records</a></li>

                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle dec" type="button" data-toggle="dropdown">
                        {{ Auth::user()->firstName }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
                        <li><a href="/profile"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Account Settings</a></li>
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
                    </ul>
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