@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <div class="post-project-fields">
        <h3 class="text-center mb-5 fw-bold ">Post a service</h3>

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
                        <input type="text" name="pricePerHour" placeholder="price per hour">
                        <i class="la la-dollar"></i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inp-field">
                        <select name="type">
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
                        <li><button class="active" type="submit" value="post">Post</button></li>
                        <li><a href="{{ route('service.index') }}" title="" >back</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection
