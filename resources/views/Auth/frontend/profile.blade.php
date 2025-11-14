@extends('layout.Frontend.main')

@section('main-content')



    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-6">
                <div id="register_sign_up">
                 <h4 class="modal-title b-2" id="exampleModalLabel"><b>USER PROFILE</b></h4>
                <table class="table table-bordered table-responsive signup_form mb-2">
                    <tr>
                        <td><b>Name </b></td>
                        <td>{{ $users->fullname }}</td>
                    </tr>
                    <tr>
                        <td><b>Username </b></td>
                        <td>{{ $users->username }}</td>
                    </tr>
                    <tr>
                        <td><b>Phone </b></td>
                        <td>{{ $users->phone }}</td>
                    </tr>
                    <tr>
                        <td><b>Email </b></td>
                        <td>{{ $users->email }}</td>
                    </tr>
                    <tr>
                        <td><b>Address </b></td>
                        <td>{{ $users->address }}</td>
                    </tr>
                </table>
                  <a class="modify-btn btn text-white" href="{{route('profile.user',Auth::id()) }}">Modify Details</a>
                  <a class="modify-btn btn text-white" href="{{ url('change-password',Auth::id()) }}">Change Password</a>
               
                </div>
            </div>
        </div>
    </div>

@endsection