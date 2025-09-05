
@extends('layout.backend.main')

@section('main-content')
 <div class="container mt-4">
        <h4 class="text-center fw-bold">Admin Profile</h4>
    </div>

    <div class="container-fluid mt-5 bg-light py-5">
        <div class="row justify-content-center align-items-center">

            <!-- Image Column -->
            <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                <img src="{{ asset('admin/images/login1.png.jpg') }}" alt="logo1" class="img-fluid rounded shadow-sm">
            </div>

            <!-- Form Column -->
            <div class="col-12 col-md-6">
                 @if(session('success'))
                  <div class="alert alert-success text-center">
                     {{ session('success') }}
                 </div>
                @endif

                @foreach ($user as $users )
                <form method="post" action="{{ route('admin.update',$users->adminId) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="{{$users->fullname}}">
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{$users->phone}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"  value="{{$users->email}}">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">UserName</label>
                        <input type="text" class="form-control" name="username" value="{{$users->username}}">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password"  value="{{$users->password}}">
                    </div>


                    <div class="mt-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value= "{{$users->address}}">
                    </div>

                      <div class="mt-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" name="address" value="{{$users->admin_role}}">
                    </div>


                    <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection

</html>