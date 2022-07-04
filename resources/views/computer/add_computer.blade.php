@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Computer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-computer') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md"> 
                                <h4>Details</h4>
                                <!-- Display Name -->
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required autocomplete="brand">

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
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">

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
                                        <input id="rate" type="text" class="form-control @error('rate') is-invalid @enderror" name="rate" required autocomplete="new-rate">

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
                                        <input id="os" type="text" class="form-control @error('os') is-invalid @enderror" name="os" required autocomplete="new-os">

                                        @error('os')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Display Size -->
                                <div class="row mb-3">
                                    <label for="display_size" class="col-md-4 col-form-label text-md-end">{{ __('Display Size') }}</label>

                                    <div class="col-md-6">
                                        <input id="display_size" type="text" class="form-control @error('display_size') is-invalid @enderror" name="display_size" required autocomplete="new-display_size">

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
                                        <input id="ram" type="text" class="form-control @error('ram') is-invalid @enderror" name="ram" required autocomplete="new-ram">

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
                                        <input id="usb_port" type="text" class="form-control @error('usb_port') is-invalid @enderror" name="usb_port" required autocomplete="new-usb_port">

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
                                        <input id="hdmi_port" type="text" class="form-control @error('hdmi_port') is-invalid @enderror" name="hdmi_port" required autocomplete="new-hdmi_port">

                                        @error('hdmi_port')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="select-time">
                            <h4>Select Available Time</h4>

                            <!-- Availability -->
                                <div class="row mb-3">
                                    <label for="availability" class="col-md-4 col-form-label text-md-end">{{ __('Availability') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control form-select @error('availability') is-invalid @enderror" name="availability" required autocomplete="new-availability" aria-label="Default select example">
                                            <option selected value="0">Is computer available for rent</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                
                                        </select>
                                

                                        @error('availability')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection