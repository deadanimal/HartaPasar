@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">Summary</div>
            <div class="card-body">
            
            </div>
        </div>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>        
    </div>       
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">list of friend request</div>
            <div class="card-body">
            
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">list of credit asks</div>
            <div class="card-body">
            
            </div>
        </div>
    </div> 
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">list of offers, peer offers</div>
            <div class="card-body">
            
            </div>
        </div>
    </div>         
</div>

@endsection
