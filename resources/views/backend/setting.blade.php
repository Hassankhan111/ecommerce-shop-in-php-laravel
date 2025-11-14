

@extends('layout.Backend.main')

 @section('title','SETTINGS')
 
@section('main-content')

 <div class="container-fluid px-5 py-3 m-1">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
        @endif
           </div>

          <div class="card shadow-sm border-3 mx-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
                <h5 class="mb-2 mb-lg-0">SETTINGS</h5>
            </div>

            @foreach ($options as $option)
            <form id="updateOptions" class="add-post-form row" method="POST" action="{{ route('settings.update',$option->s_id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                <div class="col-md-6">
                    <div class="form-group m-1">
                        <label for="" class="form-label">Site Name</label>
                        <input type="text" class="form-control site_name" name="site_name"
                               value="{{ $option->site_name }}" placeholder="Site Name"/>
                        <input type="hidden" name="s_no" value="{{ $option->s_id}}" />
                    </div>
                    <div class="form-group m-1">
                        <label for="">Site Title</label>
                        <input type="text" class="form-control site_title" name="site_title"
                               value="{{ $option->site_title }}" placeholder="Site Title"/>
                    </div>
                    <div class="form-group m-1">
                        <label>Site Description</label>
                        <textarea name="site_desc" class="form-control site_desc" cols="30" rows="3"> {{ $option->site_desc }}</textarea>
                    </div>
                    <div class="form-group m-1">
                        <label>Contact Email</label>
                        <input type="email" class="form-control email" name="contect_email" value="{{ $option->contect_email }}">
                    </div>
                    <div class="form-group m-1">
                        <label>Contact Phone Number</label>
                        <input type="text" class="form-control phone" name="contect_phone" value="{{ $option->contect_phone }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-1">
                        <label for="">Site Logo</label>
                        <input type="file" class="new_logo" name="site_logo" />
                        <input type="hidden" class="old_logo" name="old_logo" value="">
                        <img id="image" src="{{ asset('storage/' . $option->site_logo) }}" alt="{{ $option->site_logo }}" width="100px"/>
                    </div>
                    <div class="form-group m-1">
                        <label for="">Footer Text</label>
                        <input type="text" class="form-control footer_text" name="footer_text" value="{{ $option->footer_text }}">
                    </div>
                    <div class="form-group m-1">
                        <label>Currency Format</label>
                        <input type="text" class="form-control currency" name="currency_format" value="{{ $option->currency_format }}">
                    </div>
                    <div class="form-group m-1">
                        <label>Contact Address</label>
                        <textarea name="contect_address" class="form-control address" cols="30" rows="3"> {{ $option->contect_address}} </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group m-1">
                        <input type="submit" class="btn btn-danger add-new" name="submit" value="Update">
                    </div>
                </div>
            </form>
             @endforeach
        </div>
</div>

@endsection

