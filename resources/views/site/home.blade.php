@extends('layouts.app')

@section('content')
    <div class="inner_wrapper">
        <h1>Events</h1>
        <div class="jcarousel" data-jcarousel="true">
            <ul class="jcarousel-list">
                @foreach($events as $event)
                    <li class="jcarousel-item">
                        <div class="event-images">
                            <img src="{{$event->picture}}">
                        </div>
                        <div class="event_title">{{$event->name}}</div>
                        <div class="event_manager">
                            <div class="event_data">
                                <div class="event_location">{{$event->locations->location}}</div>
                                <div class="event_date">{{$event->event_date->format('D, M y')}}</div>
                            </div>
                            <div class="event_button" data-id="{{$event->id}}">
                                <span>Attend</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <a class="jcarousel-prev" href="#" data-jcarouselcontrol="true"><</a>
        <a class="jcarousel-next" href="#" data-jcarouselcontrol="true">></a>
    </div>

    <div class="request_form">
        <div class="request_form_body">
            <h3 class="head_text"></h3>
            <div class="form-group center">
                <div class="col-sm-12">
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Your name']) }}
                </div>
            </div>
            <div class="form-group center">
                <div class="col-sm-12">
                    {{ Form::email('name', null, ['class' => 'form-control', 'id' => 'e_mail', 'placeholder' => 'E-Mail']) }}
                </div>
            </div>
            <div class="request_button" data-id="">
                <span>Attend</span>
            </div>
        </div>
    </div>
@endsection
