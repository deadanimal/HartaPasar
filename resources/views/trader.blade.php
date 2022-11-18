@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Offer Detail</div>
                <div class="card-body">
                    {{$trader}}
                </div>
            </div>
        </div>
    </div>
@endsection
