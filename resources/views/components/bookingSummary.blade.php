@extends('layouts.app')


@section('content')

    <script src="{{asset('js/booking.js')}}"></script>

    
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
                        <a href="{{ url()->previous() }}" class="btn btn-success m-3">
                            {{ __('Back') }}
                            </a>
                    </div>
                </div>
            </div>
            <div class="booking m-1">
                <form mothod="POST" action="{{route('booking-create', "$computer->computer_id")}}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name ="computer_id" value="{{$computer->computer_id}}" >
                    <input type="hidden" name ="computer_name" value="{{$computer->name}}" >
                    
                    <input type="hidden" name ="user_id" value="{{Auth::user()->id}}" >
                    <div class="d-flex justify-content-center">
                        <div class="details d-flex flex-wrap justify-content-center">
                            <div class="customerDetails m-1">
                                <h3>Details and Payment Info</h3>
                                <p>Confirm your detail</p>
                                <div class="mb-3 row">
                                    <label for="fullName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fullName" class="form-control" id="fullName" value="{{Auth::user()->name}}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" readonly>
                                    </div>
                                </div>
                                
                            </div> <hr>
                            <!-- Payment details -->
                            <div class="paymentDetails m-1">
                                <p>Payment Info</p>
                                <div class="mb-1 row">
                                    <label for="availableBalance" class="col-sm-2 col-form-label">Available Balance</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="availableBalance" class="form-control" id="availableBalance" value="{{Auth::user()->balance}}" readonly>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label for="bookingPrice" class="col-sm-2 col-form-label">Booking Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="bookingPrice" id="bookingPrice" value="{{$form_data['total_price']}}" readonly>
                                    </div>
                                </div>      
                            </div>
                        </div>

                        <!-- Select date time -->
                        <div class="timeSection justify-content-center">     
                            <div class="m-3">
                                <label for="duration">Selected Duration</label>
                                
                                <input type="text" name="duration" class="form-control" id="duration" value="{{$form_data['duration']}}" readonly>
                                    
                            </div> 
                            <div class="m-3">
                                <label for="start_date">Selected start_date</label>
                                
                                <input type="text" name="start_date" class="form-control" id="start_date" value="{{$form_data['start_date']}}" readonly>
                                    
                            </div> 
                            <div class="m-3">
                                <label for="end_date">Selected Duration</label>
                                
                                <input type="text" name="end_date" class="form-control" id="end_date" value="{{$form_data['end_date']}}" readonly>
                                    
                            </div> 
                            <div class="m-3">
                                <label for="deposit">Deposit Amount</label>
                                
                                <input type="text" name="deposit" class="form-control" id="deposit" value="{{$form_data['deposit']}}" readonly>
                                    
                            </div> 
                           
                            <button type="submit" class="btn btn-success m-3">
                            {{ __('Confirm Booking') }}
                            </button>
                            
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
