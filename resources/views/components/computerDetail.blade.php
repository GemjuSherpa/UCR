@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col image">
                <img src="{{ asset('img/'.$computer->file_path) }}" alt="">
            </div>
            <div class="col m-4">
                <h5 class="">{{$computer->name}}</h5><hr>
                <p class="description">{{$computer->description}}</p>
                <b>OS</b> : {{$computer->os}} <br>
                <b>RAM</b>: {{$computer->ram}} <br>
                <b>No. of USB ports</b>: {{$computer->usb_port}} <br>
                <b>No. of HDMI ports</b>: {{$computer->hdmi_port}} <br>
                <b>Price/hr</b>: {{$computer->price_rate}} <br>
                <b>Availability</b>: Yes <br>

                <div class="calander">
                    <b class="text-center">Availability</b>
                    <iframe
                        src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%2333B679&ctz=Australia%2FHobart&showTitle=0&showTz=0&showPrint=0&showCalendars=0&src=ZG52bzM0Y3NuN3JhMWFjMHRsdXJpbGZqNDhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%237CB342"
                        style="border-width:0" width="100%" height="300" frameborder="0" scrolling="no">
                    </iframe>
                </div>
                <div class="btn-group mt-5" role="group">
                    <a href="{{route('browse')}}" class="btn btn-secondary m-1">Browse Other</a>
            
                    <a href="{{route('booking', "$computer->computer_id") }}" class="btn btn-warning m-1">Make Booking</a>
                </div>
            </div>
        </div>
       
    </div>
@endsection