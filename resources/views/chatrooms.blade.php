@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Chatrooms</div>
                <div class="card-body">
                    - chatroom
                    {{$chatrooms}}
                </div>
            </div>
        </div>
    </div>
@endsection
