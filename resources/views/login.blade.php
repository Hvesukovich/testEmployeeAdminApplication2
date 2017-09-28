@extends('welcome')

@section('content')
    <div class="page-login d-flex align-items-center justify-content-center">
        <div class="form-login">
            <form class="enter_the_site"  name="enter_the_site">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                <div class="regular-signup">
                    <div class="form-group input-group">
                        <label for="userName" class="input-group-addon cursor-pointer">
                            <i class="fa fa-user"></i>
                        </label>
                        <input type="text" id="userName" name="userName" class="form-control"
                               placeholder="Enter user name" required>
                    </div>
                    <div class="form-group input-group">
                        <label for="userPassword" class="input-group-addon cursor-pointer">
                            <i class="fa fa-key"></i>
                        </label>
                        <input type="password" id="userPassword" name="userPassword"
                               class="form-control"  placeholder="Enter password" required>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <input type = "submit" id="forma_login_admin"
                           class="btn btn-primary cursor-pointer" value = "Войти" />
                </div>
            </form>
        </div>
    </div>
@endsection