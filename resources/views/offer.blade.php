@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Offer Detail</div>
                {{-- <div class="card-body">
         

                </div> --}}
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">



                        {{ $offer->asset->name }} ({{ $offer->asset->symbol }})
                    </li>
                    <li class="list-group-item">
                        {{ $offer->amount / pow(10, 6) }} {{ $offer->asset->symbol }} |
                        {{ $offer->asset->denominator }} {{ $offer->price / pow(10, 6) }}
                    </li>
                    <li class="list-group-item">
                        @if ($offer->tosell)
                            <span class="badge rounded-pill bg-danger">Sell</span>
                        @else
                            <span class="badge rounded-pill bg-success">Buy</span>
                        @endif
                        {{ $offer->asset->denominator }}
                        {{ ($offer->price / pow(10, 6)) * ($offer->amount / pow(10, 6)) }}
                    </li>
                    <li class="list-group-item">Trader: <a
                            href="/trader/{{ $offer->user->public_name }}">{{ $offer->user->name }}</a></li>
                </ul>
                @if (Auth::user()->id != $offer->user_id)
                    <div class="card-footer">
                        <form action="/offer/{{ $offer->id }}/cash" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Submit Offer</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        @if (Auth::user()->id == $offer->user_id)
            <div class="col-xl-8">
                @if ($offer->submissions->count() > 0)
                    <div class="row">
                        <div class="col">
                            <h3>Submission</h3>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Timestamp</th>
                                            <th scope="col">User</th>                          
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offer->submissions as $submission)
                                            <tr>
                                                <td>{{$submission->created_at}}</td>
                                                <td>{{$submission->user->name}}</td>
                                                <td>Accept?</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        @else
            <div class="col-xl-8">
                @foreach ($offer->queries as $query)
                    <p>{{ $query->responses }}</p>
                @endforeach
                <form action="/offer/{{ $offer->id }}/query" method="POST">
                    @csrf
                    <textarea class="form-control" name="message"></textarea>
                    <button type="submit" class="btn btn-warning">Query Offer</button>
                </form>
            </div>
        @endif
    </div>
@endsection
