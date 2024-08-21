@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Notifications</h1>
    <ul class="list-group">
        @foreach($notifications as $notification)
            <li class="list-group-item">
                {{ $notification->data['message'] }} - <small>{{ $notification->created_at->diffForHumans() }}</small>
            </li>
        @endforeach
    </ul>
</div>
@endsection
