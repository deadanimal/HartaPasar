@extends('layouts.app')

@section('content')

<div class="row">
    <h3>Promoted Trader</h3>
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Public Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promoted_traders as $trader)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{$trader->name}}</td>
                            <td>{{$trader->public_name}}</td>
                            <td><a href="/trader/{{$trader->public_name}}"><button type="button" class="btn btn-info px-4 me-sm-3">View</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-3">
    <h3>High Value Trader</h3>
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Public Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promoted_traders as $trader)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{$trader->name}}</td>
                            <td>{{$trader->public_name}}</td>
                            <td><a href="/trader/{{$trader->public_name}}"><button type="button" class="btn btn-info px-4 me-sm-3">View</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
