
   @extends('layout.Frontend.main')
   @section('title','profile')
   @section('main-content')
    


   <div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-6">
            <!-- Form -->
            <form id="register_sign_up" class="signup_form" method ="post" action="{{ route('profile.update',Auth::id()) }}" autocomplete="off">
                 @csrf
                 @method('PUT')

                <h2>Modify Profile</h2>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control first_name" value="{{$user->fullname}}" requried />
                </div>
                 <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control city" value="{{$user->username}}" requried>
                </div>
                
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="phone" class="form-control mobile" value="{{$user->phone}}" requried />
                </div>

                <div class="form-group">
                    <label> Email</label>
                    <input type="email" name="email" class="form-control user_name" value="{{$user->email}}" requried />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control address" value="{{$user->address}}" requried>
                </div>
                <input type="submit" name="signup" class="btn text-white" value="Modify"/>
            </form>
            <!-- /Form -->
        </div>
    </div>
</div>

@endsection
