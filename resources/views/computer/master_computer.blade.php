@extends('layouts.app')

@section('content')

<div class="container">
    <h4 class="text-center mb-3">All availabe computers</h4>
    @if(Auth::user()-> role == 'Admin')
        <a class="btn btn-primary" href="{{route('add-computer')}}">Add New Computer</a>
    @endif

    
    <!-- Computer Table -->
        <table class="table mt-3">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Description</th>
                <th scope="col">Price/Hr</th>
                <th scope="col">Operating System</th>
                @if(Auth::user()->role=='Staff')
                    <th scope="col">Action</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($computers as $computer)
                
                 <tr>
                    <td>{{$computer->name}}</td>
                    <td>{{$computer->brand}}</td>
                    <td>{{$computer->description}}</td>
                    <td>{{$computer->price_rate}}</td>
                    <td>{{$computer->os}}</td>
                    <td class="d-flex">
                        
                        <a class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editWineModal{{$computer->computer_id}}">Edit</a>
                        <form action="{{ route('destroy-computer', $computer->computer_id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                        </form>
                       
                    </td>
                    <!-- form to Edit Computer -->
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="editWineModal{{$computer->computer_id}}" tabindex="-1" aria-labelledby="editWineModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editWineModalLabel">Update details of computers</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="update" action="{{ route('update-computer') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="computer_id" id="computer_id" value="{{$computer->computer_id}}">
                                        <div class="row">
                                            <!-- left column -->
                                            <div class="col-md"> 
                                                <h4>Details</h4>
                                                <!-- Display Name -->
                                                <div class="row mb-3">
                                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $computer->name }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Brand -->
                                                <div class="row mb-3">
                                                    <label for="brand" class="col-md-4 col-form-label text-md-end">{{ __('Brand') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $computer->brand }}" required autocomplete="brand">

                                                        @error('brand')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div class="row mb-3">
                                                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="description" type="text" value="{{$computer->description}}" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">

                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Price per hour -->
                                                <div class="row mb-3">
                                                    <label for="rate" class="col-md-4 col-form-label text-md-end">{{ __('price/hr') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="rate" type="text" value="{{$computer->price_rate}}" class="form-control @error('rate') is-invalid @enderror" name="rate" required autocomplete="new-rate">

                                                        @error('rate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- upload Image -->
                                                <div class="row input-group mb-3">
                                                    <label for="computerImage" class="col-md-4 col-form-label text-md-end">{{ __('Upload image') }}</label>

                                                    <div class="custom-file col-md-6">
                                                        <input type="file" class="custom-file-input" id="computerImage" name="computerImage">
                                                        @error('computerImage')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- right column -->
                                            <div class="col-md">
                                                <h4>Specifications</h4>
                                                <!-- OS -->
                                                <div class="row mb-3">
                                                    <label for="os" class="col-md-4 col-form-label text-md-end">{{ __('Operating System') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="os" type="text" value="{{$computer->os}}" class="form-control @error('os') is-invalid @enderror" name="os" required autocomplete="new-os">

                                                        @error('os')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Display Size -->
                                                <div class="row mb-3">
                                                    <label for="display_size"  class="col-md-4 col-form-label text-md-end">{{ __('Display Size') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="display_size" type="text" value="{{$computer->display_size}}" class="form-control @error('display_size') is-invalid @enderror" name="display_size" required autocomplete="new-display_size">

                                                        @error('display_size')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- RAM -->
                                                <div class="row mb-3">
                                                    <label for="ram" class="col-md-4 col-form-label text-md-end">{{ __('RAM') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="ram" type="text" value="{{$computer->ram}}" class="form-control @error('ram') is-invalid @enderror" name="ram" required autocomplete="new-ram">

                                                        @error('ram')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- USB Port -->
                                                <div class="row mb-3">
                                                    <label for="usb_port" class="col-md-4 col-form-label text-md-end">{{ __('No. of USB Port') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="usb_port" type="text" value="{{$computer->usb_port}}" class="form-control @error('usb_port') is-invalid @enderror" name="usb_port" required autocomplete="new-usb_port">

                                                        @error('usb_port')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- HDMI Port -->
                                                <div class="row mb-3">
                                                    <label for="hdmi_port" class="col-md-4 col-form-label text-md-end">{{ __('No. of HDMI Port') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="hdmi_port" type="text" value="{{$computer->hdmi_port}}" class="form-control @error('hdmi_port') is-invalid @enderror" name="hdmi_port" required autocomplete="new-hdmi_port">

                                                        @error('hdmi_port')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="select-time">
                                                    <h4>Select Available Time</h4>

                                                    <!-- Availability -->
                                                        <div class="row mb-3">
                                                            <label for="availability" class="col-md-4 col-form-label text-md-end">{{ __('availability') }}</label>

                                                            <div class="col-md-6">
                                                                <select class="form-control form-select @error('availability') is-invalid @enderror" name="availability" required autocomplete="new-availability" aria-label="Default select example">
                                                                    <option selected>Is computer available for rent</option>
                                                
                                                                    <option {{ ($computer->availability) == '1' ? 'selected' : '' }}  value="1">Yes</option>
                                                                    <option {{ ($computer->availability) == '0' ? 'selected' : '' }}  value="0">No</option>
                                                                    
                                                        
                                                                </select>
                                                        

                                                                @error('availability')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" form-id="update">Update</button>
                                    
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End of edit modal -->
                </tr>
				@endforeach
                 {{--  End foreach--}}
            </tbody>
        </table>
</div>

@endsection