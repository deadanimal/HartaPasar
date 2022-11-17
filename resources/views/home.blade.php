@extends('layouts.app')

@section('content')
    <div class="px-4 pt-5 my-5 text-center">
        <h1 class="display-4 fw-bold">Metaverse Compass</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Explore the real world and at the same time, the metaverse where you could get rewarded for the puzzles solved.
                You can choose to be an explorer, or a trader or a diplomat, as long as you buy the necessary compass to function. Each compass 
                has a different storyline! You go explore NOW!
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="/play"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Explore Now</button></a>
                <a href="/faq"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Learn More</button></a>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="/images/compass-4891499_1920.jpg" class="img-fluid border rounded-3 shadow-lg mb-4"
                    alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>

@endsection
