@extends('layout.Backend.main')
@section('title', 'All category')
@section('main-content')

  <div class="container-fluid px-3 py-3 m-1">

     @if(session('success'))
    <div class="alert alert-success" role="alert">
       {{ session('success') }}
        @endif
    </div>
    
    <div class="card shadow-sm border-0 mx-3">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
        <h5 class="mb-2 mb-lg-0">Category</h5>
        <a href="{{ route('categorys.create') }}" class="btn btn-light btn-sm">
          <i class="fa fa-plus me-1"></i> Add New category
        </a>
      </div>

      <div class="card-body p-0">
        <!-- ✅ Responsive Table Wrapper -->
        <div class="table-responsive">
          <table id="productsTable" class="table table-striped table-hover table-bordered align-middle mb-0">
            <caption class="px-3">List of Category</caption>
            <thead class="table-light">
              <tr>
                <th>Title</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($category as $Cat)
                <tr>
                  <td class="text-truncate" style="max-width: 150px;">{{ $Cat->cat_title }}</td>

                  <td class="text-center">
                    <button class="btn btn-sm btn-warning"><a href="{{ route('categorys.edit',$Cat->cat_id) }}">
                     <i class="fa fa-edit"></i></a></button>

                    <form action="{{ route('categorys.destroy', $Cat->cat_id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                    </form>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
@endsection