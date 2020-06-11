@extends('layouts.admin')

@section('content')

    <h1>Events</h1>

    <p><a href="<?= URL::to('admin').'/events/create' ?>">Create new event</a></p>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Event location</th>
            <th>Date</th>
            <th></th>
        </tr>
        @foreach ($events as $event)
            <tr>
                <td>{{$event->name}}</td>
                <td>{{$event->locations->location}}</td>
                <td>{{$event->event_date}}</td>
                <td><a href="<?= URL::to('admin').'/events/edit/'.$event->id ?>">Update</a><a href="<?= URL::to('admin').'/events/delete/'.$event->id ?>">Delete</a></td>
            </tr>
        @endforeach
        {{ $events->links() }}
    </table>

@endsection

