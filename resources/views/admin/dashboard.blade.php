@extends('layouts.app')

@section('content')

<div class="container-fluid p-2 g-2">
    <h4 class="text-center">Admin Dashboard</h4><hr>
	<div class="row g-3">
    
         <div class="col-lg-3 px-4 py-3 border ">
				<h3 class="d-flex justify-content-center">Users Information</h3> <br>
                 
				<div class=" fs-5 d-flex justify-content-center">
				<label class="form-label fs-5" style="font-weight:bold">Total number of users in system: </label>
       			<label class="form-label fs-5" style="font-weight:bold">  {{count($users)}} </label>
				</div>
                
                <br>
                <!-- Admins -->
                <h4 class="text-left">Admins</h4>
                <table class="table table-bordered table-success table-striped">
 				 	<thead>
    					<tr class="text-center">
      						<th scope="col">ID</th>
                			<th scope="col">Role</th>
                        	<th scope="col">Name</th>
      						<th scope="col">Email</th>
      						<th scope="col">Balance</th>
      						<th scope="col">UTAS student</th>
    					</tr>
 					</thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if($user->role == 'Admin')
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->balance}}</td>

                                    @if($user->utas_student == 1)
                                        <td>Yes</td>
                                    @elseif($user->utas_student == 0)
                                        <td>No</td>    
                                    @endif
                                    
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <!-- Staff -->
                <h4 class="text-left">Staff</h4>
                <table class="table table-bordered table-primary table-striped">
 				 	<thead>
    					<tr class="text-center">
      						<th scope="col">ID</th>
                			<th scope="col">Role</th>
                        	<th scope="col">Name</th>
      						<th scope="col">Email</th>
      						<th scope="col">Balance</th>
      						<th scope="col">UTAS student</th>
    					</tr>
 					</thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if($user->role == 'Staff')
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->balance}}</td>

                                    @if($user->utas_student == 1)
                                        <td>Yes</td>
                                    @elseif($user->utas_student == 0)
                                        <td>No</td>    
                                    @endif
                                    
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <!-- Customer User -->
                <h4 class="text-left">Customer User</h4>
                <table class="table table-bordered table-dark table-striped">
 				 	<thead>
    					<tr class="text-center">
      						<th scope="col">ID</th>
                			<th scope="col">Role</th>
                        	<th scope="col">Name</th>
      						<th scope="col">Email</th>
      						<th scope="col">Balance</th>
      						<th scope="col">UTAS student</th>
    					</tr>
 					</thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if($user->role == 'User')
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->balance}}</td>

                                    @if($user->utas_student == 1)
                                        <td>Yes</td>
                                    @elseif($user->utas_student == 0)
                                        <td>No</td>    
                                    @endif
                                    
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
         </div>
                            
         <div class="col-lg-6 px-4 py-3 border">
				<h3 class= "d-flex justify-content-center">Computers Information</h3> <br>
                
                <div class=" fs-5 d-flex justify-content-center">
                <label class="form-label fs-5 d-flex justify-content-center" style="font-weight:bold">Total number of computers in system: </label>
       			<label class="form-label fs-5 d-flex justify-content-center" style="font-weight:bold"> {{count($computers)}} </label>
                </div>
                
                <br>
                <!-- Create brands array -->
                @php ($brands = [])

                @foreach ($computers as $computer)
                    @if(in_array($computer->brand, $brands))
                        return
                    @else
                        @php ($brands[] = $computer->brand)
                    @endif
                @endforeach

                {{ implode(', ', $brands) }}
                
                <!-- Looping through brand array -->
                @foreach ($brands as $brand)
                    <h4 class="text-left">{{$brand}}</h4>
                    <table class="table table-bordered table-warning table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Operating System</th>
                                <th scope="col">Display Size</th>
                                <th scope="col">RAM</th>
                                <th scope="col">USB</th>
                                <th scope="col">HDMI</th>
                                <th scope="col">Price/Hr</th>
                                <th scope="col">Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($computers as $computer)
                                @if($computer->brand == $brand)
                                    <tr>
                                        <th scope="row">{{$computer->name}}</th>
                                        <td>{{$computer->brand}}</td>
                                        <td>{{$computer->os}}</td>
                                        <td>{{$computer->display_size}}</td>
                                        <td>{{$computer->ram}}</td>
                                        <td>{{$computer->hdmi_port}}</td>
                                        <td>{{$computer->usb_port}}</td>
                                        <td>{{$computer->price_rate}}</td>
                                    

                                        @if($computer->availability == 1)
                                            <td>Yes</td>
                                        @else
                                            <td>No</td>    
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endforeach


         </div>
                            
         <div class="col-lg-3 px-4 py-3 border">
					<h3 class= "d-flex justify-content-center">Current Rental Status</h3> <br>
                
                <div class=" fs-5 d-flex justify-content-center">
                <label class="form-label" style="font-weight:bold">Total number of  Bookings : </label>
        
       			<label class="form-label" style="font-weight:bold"> {{count($bookings)}}</label>
                </div>
                
                <br>
                
                <table class="table table-bordered table-dark table-striped">
            		<thead>
               			<tr class="text-center">
                			<th scope="col">Booking ID</th>
                			<th scope="col">Booking Date</th>
                			<th scope="col">Status</th>
                    		<th scope="col">Duration (hours)</th>
                		</tr>
            		</thead>
                    <tbody>
                            @foreach ($bookings as $booking)
                                
                                    <tr>
                                        <th scope="row">{{$booking->booking_id}}</th>
                                        <td>{{$booking->created_at}}</td>
                                        <td>{{$booking->status}}</td>
                                        <td>{{$booking->duration}}</td>
                                                    
                                    </tr>
                                
                            @endforeach
                        </tbody>
                </table>
         </div>
    </div>
</div>
                        
         

@endsection