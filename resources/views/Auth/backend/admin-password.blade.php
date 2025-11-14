

@extends('layout.Backend.main')

 @section('title','change-password')
 
@section('main-content')

 <div class="container-fluid px-5 py-3 m-1">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
        @endif
           </div>

          <div class="card shadow-sm border-3 mx-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
                <h5 class="mb-2 mb-lg-0">SET NEW PASSWORD</h5>
            </div>

           <form id="updatepassword" class="row g-3" method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="admin_id" value="">
  
                    <div class="col-md-8">
                        <div class="form-group m-3">
                            <label class="form-label fw-semibold">Old Password</label>
                            <input type="password" name="old_pass" class="form-control old_pass" placeholder="Old Password"  required/>
                        </div>
                         <div class="form-group m-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="new_pass" class="form-control new_pass" placeholder="New Password"  required/>
                        </div>
                    <div class="col-3 text-center mt-2">
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm m-2">
                            <i class="bi bi-save me-1"></i> SUBMIT
                        </button>
                    </div>
                </form>
        </div>
</div>

@endsection

