@extends('layouts.app')

@section('content')
    

    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Asset</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                        {{$asset}}
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
