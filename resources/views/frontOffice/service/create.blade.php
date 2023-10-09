@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <div class="post-project-fields">
        <h3 class="text-center mb-5 fw-bold ">Post a service</h3>
        {{-- error message --}}
        @if($errors->any())

        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
        
                <li>{{ $error }}</li>
        
            @endforeach
            </ul>
        </div>
        
        @endif
        <form action="{{ route('service.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <input type="text" name="serviceName" placeholder="Title">
                </div>
                {{-- <div class="col-lg-12">
                    <input type="text" name="skills" placeholder="Skills">
                </div> --}}
                <div class="col-lg-6">
                    <div class="price-br">
                        <input type="number" name="pricePerHour" placeholder="price per hour">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inp-field">
                        <select name="type">
                            <option disabled  selected="true">--choose type</option>
                            <option value="Full time">Full Time</option>
                            <option value="Part time">Part time</option>
                            <option value="Contract">Contract</option>
                            <option value="Temporary">Temporary</option>

                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <textarea name="description" placeholder="Description"></textarea>
                </div>
                <div class="col-lg-12">
                    <ul class="d-flex  justify-content-center ">
                        <li><button class="active" type="submit" value="post">Add</button></li>
                        <li><a href="{{ route('service.index') }}" title="" >back</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection
