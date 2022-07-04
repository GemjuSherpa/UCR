@extends('layouts.app')

@section('content')

   

    <div class="browse container">
        <h1 class="title mt-3 text-center">Browse any computer you like.</h1> <hr>
        <h5 class="mt-5 text-center">Sort by brand or preffered date</h5>
        <!-- Search bar -->
        <div class="search-computer">
            <form method="POST" class="d-flex justify-content-center mt-3 flex-wrap" action="{{route('sort-computer')}}">
                @csrf
                @method('POST')
                <div class="brand-selector form-group d-flex m-3">
                    <label  for="brand">Select Brand</label>
                    <select class="form-control" id="brand" name="brand" onchange="this.form.submit()">
                        <option value="Apple">Apple</option>
                        <option value="Microsoft">Microsoft</option>
                        <option value="HP">HP</option>
                        <option value="Dell">Dell</option>
                        <option value="Asus">Asus</option>
                    </select>
                </div>
            </form>
        </div> <hr>

        <!-- Result lists -->

    
        <div class="lists d-flex justify-content-center flex-wrap mt-3">
           @foreach ($computers as $computer)

                <div class="card card-box m-2" >
                    <img class="card-img-top" src="{{ asset('img/'.$computer->file_path) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="name">{{$computer->name}}</h5>
                        
                        <p class="brand"><b>Brand</b>: {{$computer->brand}}</p>
                        <p class="price"><b>Price</b>: ${{$computer->price_rate}}/hr</p>
                        <a class="btn btn-warning m-1" href="{{route('detail', "$computer->computer_id") }}">View details</a>
                    </div>
                    
                </div>
            @endforeach
                   
        </div>
        <nav aria-label="Page navigation" class="mt-1">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
       
        <!-- End of result lists -->
    </div>

    
    <script src="{{ asset('js/masterList.js') }}"></script>
@endsection
