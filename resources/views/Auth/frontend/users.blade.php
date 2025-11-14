
   @extends('layout.Frontend.main')

   @section('main-content')
    


   <div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-6">
            <!-- Form -->
            <form id="register_sign_up" class="signup_form" method ="POST" action="{{ route('users.create') }}" autocomplete="off">
                @csrf
                
                <h2>Register here</h2>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control first_name" placeholder="Full Name" requried />
                </div>
                 <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control city" placeholder="username" requried>
                </div>
                
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="phone" class="form-control mobile" placeholder="phone" requried />
                </div>

                <div class="form-group">
                    <label> Email</label>
                    <input type="email" name="email" class="form-control user_name" placeholder="Email Address" requried />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control pass_word" placeholder="password" requried />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control address" placeholder="Address" requried>
                </div>
                <input type="submit" name="signup" class="btn" value="sign up"/>
            </form>
            <!-- /Form -->
        </div>
    </div>
</div>

@endsection
