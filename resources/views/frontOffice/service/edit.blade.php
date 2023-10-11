@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <div class="post-project-fields">
        <h3 class="text-center mb-5 fw-bold ">Update a service</h3>
        {{-- error message --}}
        {{-- @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> --}}

            <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="serviceName" value="{{ $service->serviceName }}" placeholder="Title">
                    </div>
                    {{-- <div class="col-lg-12">
                    <input type="text" name="skills" placeholder="Skills">
                </div> --}}
                    <div class="col-lg-6">
                        <div class="price-br">
                            <input type="text" name="pricePerHour" value="{{ $service->pricePerHour }}"
                                placeholder="price per hour">
                            <i class="la la-dollar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp-field">
                            <select name="type">
                                <option value="Full time" @if($service->type == "Full time") selected @endif>Full Time</option>
                                <option value="Part time" @if($service->type == "Part time") selected @endif>Part Time</option>
                                <option value="Contract" @if($service->type == "Contract") selected @endif>Contract</option>
                                <option value="Temporary" @if($service->type == "Temporary") selected @endif>Temporary</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description">{{ $service->description }}</textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul class="d-flex  justify-content-center ">
                            <li><button class="active" type="submit" value="post">Update</button></li>
                            <li><a href="{{ route('service.index') }}" title="">back</a></li>
                        </ul>
                    </div>
                </div>
            </form>
    </div>
@endsection
