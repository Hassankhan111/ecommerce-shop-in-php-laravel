
   @extends('layout.Frontend.main')
   @section('title','change password')
    
   @section('main-content')
    


   <div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-6">
            <!-- Form -->
            <form id="register_sign_up" class="signup_form" method ="post" action="{{ route('user.password',Auth::id()) }}" autocomplete="off">
                 @csrf
                 @method('PUT')

                <h2>Change Password</h2>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="fullname" class="form-control first_name" value="{{ Auth::user()->email }}" disabled/>
                </div>
                 <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="old_pass" class="form-control city" value="" requried>
                </div>
                
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_pass" class="form-control mobile" value="" requried />
                </div>
                <input type="submit" name="signup" class="btn text-white" value="Modify"/>
            </form>
            <!-- /Form -->
        </div>
    </div>
</div>

@endsection
