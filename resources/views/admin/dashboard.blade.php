@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body text-center">
                    <h2>Dear  {{ Auth::user()->name }}! </h2>
                </div>

                <div >

                    <div class="text-center">
                        <h5>Welcome to the repository of Corporate Responsibility (Social/Environmental/Economic) projects for LAFARGE AFRICA PLC (A LafargeHolcim Company) in Nigeria!!</h5>
                        <p> <h5 style="font-size: 13px; font-weight: 100">This portal provides you with the tools to capture, present and analyse CSR data carried out by the various Nigeria Operations.<br> To access the portal, use the menu on the left navigation bar.</h5></p>
                    </div>

                </div><!-- /.container -->
            </div>
        </div>
    </div>
@endsection
