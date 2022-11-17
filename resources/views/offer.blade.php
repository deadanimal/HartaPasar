@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Offer Detail</div>
                <div class="card-body">
                    {{ $offer }}
                </div>
                @if (Auth::user()->id != $offer->user_id)
                    <div class="card-footer">
                        <button type="submit" name="tosell" value=0 class="btn btn-warning">Query Offer</button>
                        <button type="submit" name="tosell" value=0 class="btn btn-success">Submit Offer</button>
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

                                    <tr>
                                        <th scope="row">1</th>

                                    </tr>

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

                                    <tr>
                                        <th scope="row">1</th>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
