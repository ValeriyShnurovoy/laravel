@extends('layouts.admin')

@section('content')

    <div class="panel-body">

        <p><a href="<?= URL::to('admin').'/events' ?>">< To Events</a></p>

        {{ Form::open(['action' => 'Admin\EventsController@store', 'class' => 'form-horizontal', 'method' => 'POST', 'files' => true, ]) }}
        {{ csrf_field() }}

            <div class="form-group">
                {{ Form::label('event', 'Event', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-6">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('event_date', 'Event date', ['class' => 'col-sm-1 control-label',]) }}
                <div class="col-sm-3">
                    {{ Form::date('event_date', null, ['class' => 'form-control']) }}
                </div>

                @if(count($locations_selector)>0)
                    {{ Form::label('location_id', 'Event location', ['class' => 'col-sm-1 control-label',]) }}
                    <div class="col-sm-3">
                        {{ Form::select('location_id', $locations_selector, 1) }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('picture', 'Picture', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-3">
                    {{ Form::file('picture') }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {{ Form::submit('Create event') }}
                </div>
            </div>
        {{ Form::close() }}
    </div>

@endsection

