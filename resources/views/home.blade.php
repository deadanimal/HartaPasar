@extends('layouts.app')

@section('content')
    <div class="px-4 pt-5 my-5 text-center">
        <h1 class="display-4 fw-bold">Harta Pasar</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                Buy and sell any tokenised asset through this platform. 
                There is no trading fees imposed by the platform! 
                We only charge on advertisement and market data.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="/dashboard"><button type="button" class="btn btn-primary px-4 me-sm-3">Dashboard</button></a>
                <a href="/asset"><button type="button" class="btn btn-info px-4 me-sm-3">Asset</button></a>
            </div>
        </div>
        {{-- <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="/images/compass-4891499_1920.jpg" class="img-fluid border rounded-3 shadow-lg mb-4"
                    alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div> --}}
    </div>

@endsection
