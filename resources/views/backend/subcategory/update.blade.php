
@extends('layout.Backend.main')

 @section('title','Edite sub-category')
 
@section('main-content')

    <style>
        .content {
            padding: 30px;
        }

        .btn-submit {
            background-color: #ff4500;
            color: white;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #e03e00;
        }
    </style>

    <div class="content">
        <div class="card-header bg-primary text-white d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="mb-2 mb-lg-0 p-2">Update Sub-Category</h5>
        </div>
        <div class="card p-4">

            <form id="productForm" method="POST" action="{{ route('subcategorys.update', $subcategory->sub_cat_id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                

                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="category_title" class="form-control" value="{{ $subcategory->sub_cat_title}}" required>
                        </div>

                        
                        <div class="mb-3">
                                <label class="form-label"> Category</label>
                                <select class="form-select" name="category">
                                     <option>Select Category</option>
                                      @foreach($category as $cat)
                                      @if($subcategory->cat_parent == $cat->category_id)
                                       <option selected value="{{ $cat->cat_id }}"> {{ $cat->cat_title }}</option>
                                       @else
                                        <option value="{{ $cat->cat_id }}"> {{ $cat->cat_title }}</option>
                                       @endif
                                     @endforeach
                                </select>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-submit">UPDATE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
</body>

</html>