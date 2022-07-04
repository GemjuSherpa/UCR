<script>
    function onChange() {
    const password = document.querySelector('input[name=password]');
    const confirm = document.querySelector('input[name=confirm]');
    if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}
</script>

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row g-3">
        <div class="col-lg-6 px-4 py-3 container">
            <h4 class="text-center">My Account Summary</h4>

            <div class="card" style="width: 100%;">
                <h5 class=" card-img-top mt-3 text-center text-primary"> Welcome {{Auth::user()->name}} !</h5>
                <div class="card-body">
                    <h5 class="card-title">{{Auth::user()->role}}</h5>
                    <ul class="list-group">
                        <li class="list-group-item card-text">Email: {{Auth::user()->email}}</li>
                        <li class="list-group-item card-text">Address: {{Auth::user()->address}}</li>
                        <li class="list-group-item card-text">Your account balance : $ {{Auth::user()->balance}}</li>
                    </ul>
                    <p class="card-text mt-3">You can top up your accound balance here!</p>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal"> Add Balance </button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 px-4 py-3 justify-content-right">
            <h4 class="test-center">Rental Summary</h4>

            <div class="card" style="width: 100%;">
                
                <div class="card-body">
                    <h5 class="card-title">Rented Computers</h5>
                    @if($bookings != null)                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Computer Name</th>
                            <th scope="col">Deposit Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($bookings as $booking)
                            
                                <tr>
                                    <th scope="row">{{$booking->created_at}}</th>
                                    <td>{{$booking->price}}</td>
                                    <td>{{$booking->return_time}}</td>
                                    <td>{{$booking->computer_name}}</td>
                                    <td>{{$booking->deposit_amt}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else

                        <li class="card-text list-group-item">You do not have any bookings currently active.</li>
                    @endif
                    <p class="card-text mt-3">Please return computer on time to avoid penalty.</p>
                    <button class="btn btn-success"> Return Computer </button>
                </div>
            </div>
        </div>
    </div> <hr>


    <div class=" container">
        <div class="col-lg-12 px-4 py-3">
            <h3 class="d-flex justify-content-center">Update Your Account Details</h3> <br>
            <form method="POST" action="{{route('update-account')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row pb-3">

                    <input id="id" type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}"> <!-- Not allow for the user to change -->

                    <div class="col-6">
                    <label for="name" class="form-label">User Name:</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col">
                    <label for="email" class="form-label">Email:</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col">
                    <label for="address" class="form-label">Address:</label>
                        <input id="address" type="text" class="form-control" name="address" value="{{Auth::user()->address}}" required>
                    </div>
                </div>
                    
                <div class="row pb-3">
                    
                    <div class="col-6">
                    <label for="balance" class="form-label">Balance:</label>
                        <input id="balance" type="text" class="form-control" name="balance" value="{{Auth::user()->balance}}" disabled> <!-- Not allow for the user to change -->
                    </div>
                    
                    <div class="col-6">
                    <label for="role" class="form-label">Role:</label>
                        <input id="role" type="text" class="form-control" name="role" value="{{Auth::user()->role}}" disabled> <!-- Not allow for the user to change -->
                    </div>
                    </div>
                    
                <br>
                <button type="submit" class="btn btn-primary">Save Change</button>
                                
                <br><br>
                <div class=" fs-5 d-flex justify-content-center">
                    <p style="font-size:10px">Account created at : </p>
                    <p style="font-size:10px">{{Auth::user()->created_at}} </p>
                    <hr>

                    <p style="font-size:10px">Account updated at : </p>
                    <p style="font-size:10px">{{Auth::user()->updated_at}} </p>
                </div>

            </form>
        </div>  
    </div>


    <div class="btn-toolbar justify-content-between">

        <div class="modal fade" id="balanceModal" aria-labelledby="balanceMLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Up Your Balance </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                
                    <div class="modal-body">
                        <form action="{{route('add-balance')}}" method="post">  
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Account Holder Name:</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="payment" class="form-label">Choose your Payment Method:</label>
                                <select id="payment" class="form-select" name="payment">
                                    <option>Visa</option>
                                    <option>Mastercard</option>
                                    <option>AMEX</option>
                                    <option>Paypel</option>
                                    <option>Apple Pay</option>
                                    <option>Google Pay</option>
                                    <option>Samsung Pay</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="account" class="form-label">Account Number:</label>
                                <input type="text" id="account" name="account" class="form-control" value="{{Auth::user()->id}}" readonly>
                            </div>
                                
                            <div class="row pb-3">
                        
                            <div class="col-6">
                                <label for="date" class="form-label">Expiration Date:</label>
                                <input type="date" id="date" name="date" class="form-control">
                            </div>
                                
                            <div class="col-6">
                                <label for="csv" class="form-label">Card Security Code:</label>
                                <input type="text" id="csv" name="csv" class="form-control">
                            </div>
                            </div>
                                
                            <div class="mb-3">
                                <label for="deposit" class="form-label">Deposit Amount:</label>
                                <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" id="deposit" name="deposit" class="form-control">
                            </div>
                            </div>
                                
                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="add">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
 
    </div>
</div>
    
                        
         

@endsection