@extends('welcome')

@section('content')
    @if(isset($user))
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-5 text-center form-group">
                    <img id="ImgPhoto" class="img-fluid"
                         src="{{ $user['img'] }}"
                         alt="{{ $user['firstName'] }} {{ $user['lastName'] }}"
                         title="{{ $user['firstName'] }} {{ $user['lastName'] }}">
                </div>
                <div class="col-12 col-sm-7">
                    <div class="form-group">
                        <h5 class="">{{ $user['firstName'] }} {{ $user['lastName'] }}</h5>
                    </div>
                    <div class="form-group">
                        <h5 class="">Date of birth: {{ $user['DateOfBirth'] }}</h5>
                    </div>
                    <div class="form-group">
                        <h5 class="">Adres: {{ $user['address'] }}</h5>
                    </div>
                    <div class="form-group">
                        <h5 class="">Email: {{ $user['email'] }}</h5>
                    </div>
                    <div class="form-group">
                        <h5 class="">Password: {{ $user['password'] }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection