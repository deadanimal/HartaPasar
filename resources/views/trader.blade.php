@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Trader: {{ $trader->public_name }}</div>
                <div class="card-body">
                    - chat button
                    - if relationship exists...
                    - request credit
                    - able to see peer offers if decided to be friend..
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Credit Line</div>
                <div class="card-body">
                    - request credit
                    - able to see peer offers if decided to be friend..
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-12">
                    @if ($chatroom_exists)
                        <form action="/chatroom/{{ $chatroom->id }}" method="POST">
                            @csrf
                            <textarea class="form-control" name="message"></textarea>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    @else
                        <form action="/trader/{{ $trader->id }}/create-chatroom" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Create Chatroom</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="row">
                peer offers
            </div>
        </div>
    </div>
@endsection
