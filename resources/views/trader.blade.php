@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Trader: {{$trader->public_name}}</div>
                <div class="card-body">
                    - chat button
                    - if relationship exists...
                    - request credit
                    - able to see peer offers if decided to be friend..
                </div>
            </div>
        </div>
    </div>
@endsection
