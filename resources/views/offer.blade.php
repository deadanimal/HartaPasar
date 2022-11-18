@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Offer Detail</div>
                <div class="card-body">
                    Offer:
                    {{ $offer }} <br/>

                    Asset:
                    {{$offer->asset}}

                </div>
                @if (Auth::user()->id != $offer->user_id)
                    <div class="card-footer">
                        <form action="/offer/{{$offer->id}}/cash" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Submit Offer</button>
                        </form>                                                                      
                    </div>
                @endif
            </div>
        </div>
        @if (Auth::user()->id == $offer->user_id)
            <div class="col-xl-8">
                <div class="row">
                    <div class="col">
                        <h3>Submission</h3>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asset</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Buy/Sell</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($offer->submissions as $submission)
                                    {{$submission}}
                                    <tr>
                                        <th scope="row">1</th>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h3>Query</h3>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asset</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Buy/Sell</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($offer->queries as $query)
                                    {{$query}}
                                    @foreach($query->responses as $response)
                                    {{$response}}
                                    @endforeach
                                    <tr>
                                        <th scope="row">1</th>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-xl-8">
                @foreach($offer->queries as $query)
                    <p>{{$query->responses}}</p>
                @endforeach
                <form action="/offer/{{$offer->id}}/query" method="POST">
                    @csrf
                    <textarea class="form-control" name="message"></textarea>
                    <button type="submit" class="btn btn-warning">Query Offer</button>
                </form>   
            </div>
        @endif
    </div>
@endsection
