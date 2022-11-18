@extends('layouts.app')

@section('content')
    

    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">Type</th>
                            <th scope="col">Denominator</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{$asset->name}}</td>
                                <td>{{$asset->symbol}}</td>
                                <td>{{$asset->asset_type}}</td>
                                <td>
                                    {{$asset->denominator}} 
                                </td>
                                <td><a href="/asset/{{$asset->id}}"><button type="button" class="btn btn-info px-4 me-sm-3">View</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection
