@extends('layouts.app')


@section('content')

    <script src="{{asset('js/booking.js')}}"></script>

    @if($errors->any())
        <h4 class="text-danger">{{$errors->first()}}</h4>
    @endif

    <div class="booking container">
        <h2 class="text-center mt-5">Make a booking</h2> <hr>
        <div class="d-flex justify-content-between">
            <div class="computer m-1">
               <div class="d-flex">
                    <div class="image">
                        <img src="{{ asset('img/'.$computer->file_path) }}" alt="">
                    </div>
                    <div class="container">
                        <h5 class="mt-5">{{$computer->name}}</h5>
                        <hr>
                        
                        <div class="confirm">
                            <p>{{$computer->description}}</p>
                            <p class="btn-warning">Price per Hour: ${{$computer->price_rate}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking m-1">
                <form mothod="POST" action="{{route('booking-summary', "$computer->computer_id")}}">
                    @csrf
                    @method('POST')
                    
                    <input type="hidden" name ="computer_id" value="{{$computer->computer_id}}" >
                    <input type="hidden" name="price_rate" value="{{$computer->price_rate}}" >
                    <div class="d-flex justify-content-center">
                        <div class="details d-flex flex-wrap justify-content-center">
                            <div class="customerDetails m-1">
                                <h3>Details</h3>
                                <p>Confirm your detail</p>
                                <div class="mb-3 row">
                                    <label for="fullName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fullName" class="form-control" id="fullName" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}">
                                    </div>
                                </div>
                                
                            </div> <hr>
                            
                        </div>

                        <!-- Select date time -->
                        <div class="timeSection justify-content-center">
                            
                            <h5 class="mt-3">Select Date and Time</h5>
                            <div class="startTime m-3">
                                <label for="startDateTime">Start Time</label>
                                <input type="startDateTime" name="timeFrom" id="timeFrom" class="time">
                                <div class="err text-danger" ></div>

                                <script>
                                    $('#timeFrom').datetimepicker({
                                        uiLibrary: 'bootstrap4',
                                        modal: true,
                                        footer: true,
                                        format: 'dd-mm-yyyy HH:mm'
                                    });
                                </script>
                            </div>
                            <div class="endTime m-3">
                                <label for="endDateTime">End Time</label>
                                <input type="endDateTime" name="timeTo" id="timeTo" class="time">
                                <script>
                                    $('#timeTo').datetimepicker({
                                        uiLibrary: 'bootstrap4',
                                        modal: true,
                                        footer: true,
                                        format: 'dd-mm-yyyy HH:mm'
                                    });
                                </script>
                            </div> 
                           
                            <button type="submit" class="btn btn-success m-3">
                            {{ __('Next') }}
                            </button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
