@extends('welcome')

@section('content')
    <div class="page-login d-flex align-items-center justify-content-center">
        <div class="form-login">
            <form method="post" name="enter_the_site">
                <div class="regular-signup">
                    <div class="form-group input-group">
                            <label for="userName" class="input-group-addon cursor-pointer"><i class="fa fa-user"></i></label>
                            <input type="text" id="userName" name="userName" class="form-control"
                                   placeholder="Enter user name" required>
                    </div>
                    <div class="form-group input-group">
                            <label for="userPassword" class="input-group-addon cursor-pointer"><i class="fa fa-key"></i></label>
                            <input type="password" id="userPassword" name="userPassword"
                                   class="form-control"  placeholder="Enter password" required>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary cursor-pointer">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection