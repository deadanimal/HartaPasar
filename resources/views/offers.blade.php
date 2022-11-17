@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">Create Offer</div>
                <div class="card-body">
                    <form action="/offer" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Asset</label>
                            <select class="form-select" name="asset_id" id="asset_id">
                                @foreach($assets as $asset)
                                    <option value={{$asset->id}}>{{ $asset->name}}</option>
                                @endforeach
                            </select>
                        </div>     
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-select" name="currency" id="currency">
                                <option value="USD" selected>US Dollar</option>
                                <option value="EUR">Euro</option>
                            </select>
                        </div>                         
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input class="form-control" type="number" name="price" id="price">
                        </div>      
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input class="form-control" type="number" name="amount" id="amount">
                        </div>                            
                        <button type="submit" name="tosell" value=0 class="btn btn-success">Buy Offer</button>
                        <button type="submit" name="tosell" value=1 class="btn btn-danger">Sell Offer</button>
                    </form>
                </div>
                {{-- <div class="card-footer"></div> --}}
            </div>
        </div>
        <div class="col-xl-9">
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
                        @foreach ($offers as $offer)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$offer->asset->name}}</td>
                                <td>{{$offer->currency }} </td>
                                <td>{{$offer->tosell}}</td>
                                <td>{{$offer->amount}}</td>
                                <td>{{$offer->price}}</td>
                                <td><a href="/offer/{{$offer->id}}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
@endsection
