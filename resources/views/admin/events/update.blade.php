@extends('layouts.admin')

@section('content')

    <div class="panel-body">

        <p><a href="<?= URL::to('admin').'/events' ?>">< To Events</a></p>

        {{ Form::open(['action' => ['Admin\EventsController@update', $currentEvent->id], 'class' => 'form-horizontal', 'method' => 'POST', 'files' => true, ]) }}
        {{ csrf_field() }}

        <div class="form-group">
            {{ Form::label('event', 'Event', ['class' => 'col-sm-1 control-label',]) }}

            <div class="col-sm-6">
                {{ Form::text('name', $currentEvent->name, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('event_date', 'Event date', ['class' => 'col-sm-1 control-label',]) }}
            <div class="col-sm-3">
                {{ Form::date('event_date', $currentEvent->event_date, ['class' => 'form-control']) }}
            </div>

            @if(count($locations_selector)>0)
                {{ Form::label('location_id', 'Event location', ['class' => 'col-sm-1 control-label',]) }}
                <div class="col-sm-3">
                    {{ Form::select('location_id', $locations_selector, $currentEvent->location_id) }}
                </div>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('picture', 'Picture', ['class' => 'col-sm-1 control-label',]) }}

            <div class="col-sm-3">
                <img src="{{$currentEvent->picture}}">
                {{ Form::file('picture') }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Update event') }}
            </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection

