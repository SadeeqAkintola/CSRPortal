@extends('layouts.pre-login')
@section('title', 'Lafarge Africa PLC :: CSR Data Reporting and Visualization Portal')
<!--landing page-->
@section('custom-css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection
@section('content')

    <div>
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li class="item1 active"></li>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="images/bus.jpg" alt="Chania" class="cover">
                    <div class="carousel-caption">
                        <h3>People and Communities</h3>
                        <p>Artisan Training to Community Youths.</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container">

            <div class="text-center">
                <h5>Welcome to the repository of Corporate Responsibility (Social/Environmental/Economic) projects for LAFARGE AFRICA PLC (A LafargeHolcim Company) in Nigeria!</h5>
                <p> <h5 style="font-size: 13px; font-weight: 100">This portal provides you with the tools to capture, present and analyse CSR data carried out by the various Nigeria Operations.<br> To access the portal, use the menu on the left navigation bar.</h5></p>
            </div>

        </div><!-- /.container -->

    </div>

@endsection