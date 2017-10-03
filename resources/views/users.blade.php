@extends('welcome')

@section('content')
    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
    <div class="container">
        <div class="row text-center">
            <div class="col-8 form-group">
                <h3>All admins</h3>
            </div>
            <div class="col-4 form-group">
                <button id="userAdd" class="btn btn-success cursor-pointer" title='User add' data-toggle='modal'
                        data-target='#userEditModal'>Add admin
                </button>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Of Birth</th>
                    <th>Editing</th>
                </tr>
                </thead>
                <tbody class="users-table">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="userEditModalLabel"
         aria-hidden="true">
        <div id="" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="saveUser" enctype="multipart/form-data">
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>--}}

                    <div class="modal-header text-center">
                        <div class="text-center width_100">
                            <h5 class="modal-title" id="userEditModalLabel">User edit</h5>
                        </div>
                        <button type="button" class="close cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <input type="hidden" name="id" id="UserId"/>
                                <div class="col-12 col-sm-5 text-center form-group">
                                    <label for="upload" class="cursor-pointer">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="text-center">
                                                    <img id="editImgPhoto" class="img-fluid"
                                                         alt="Click to select a photo">
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    <input hidden name="upload" id="upload" type="file"
                                           onchange="document.getElementById('editImgPhoto').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="col-12 col-sm-7">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="firstName" class="input-group-addon cursor-pointer">First
                                                Name</label>
                                            <input name="firstName" id="firstName" type="text" class="form-control"
                                                   placeholder="First Name" required
                                                   onchange="document.getElementById('editImgPhoto').title = this.value + ' ' + document.getElementById('lastName').value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="lastName" class="input-group-addon cursor-pointer">Last
                                                Name</label>
                                            <input name="lastName" id="lastName" type="text" class="form-control"
                                                   placeholder="Last Name" required
                                                   onchange="document.getElementById('editImgPhoto').title = document.getElementById('firstName').value + ' ' + this.value">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="dateOfBirth" class="input-group-addon cursor-pointer">Date of
                                                birth</label>
                                            <input name="dateOfBirth" id="dateOfBirth" type="text" class="form-control"
                                                   placeholder="Date of birth" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="email" class="input-group-addon cursor-pointer">Email</label>
                                            <input name="email" id="email" type="email" class="form-control"
                                                   placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label for="password"
                                                   class="input-group-addon cursor-pointer">Password</label>
                                            <input name="password" id="password" type="text" class="form-control"
                                                   placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="address"
                                                   class="adres-label text-center cursor-pointer">Address:</label>
                                            <textarea name="address" id="address" class="form-control" rows="3"
                                                      placeholder="Address" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-secondary cursor-pointer" data-dismiss="modal">Close
                            </button>
                            <input type="submit" class="btn btn-success cursor-pointer"
                                   value="Save changes"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection