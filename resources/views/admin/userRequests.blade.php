@extends('layouts.admin')

@section('content')

    <h1>Requests</h1>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Event</th>
            <th>e-mail</th>
            <th></th>
        </tr>

        @foreach ($userRequests as $userRequest)
            <tr>
                <td>{{$userRequest->events->name}}</td>
                <td>{{$userRequest->user_name}}</td>
                <td>{{$userRequest->user_email}}</td>
                <td>
                    @if($userRequest->isNew())
                        <span class="request_processing accept_request" data-id="{{$userRequest->id}}" data-status="2">Accept</span>
                        <span class="request_processing reject_request" data-id="{{$userRequest->id}}" data-status="3">Reject</span>
                    @else
                        <span class="request_processed">{{$userRequest->status->status}}</span>
                    @endif
                </td>
            </tr>
        @endforeach
        {{ $userRequests->links() }}
    </table>

@endsection
