
@extends('layout.Backend.main')

 @section('title','Add New Category')
 
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
            <h5 class="mb-2 mb-lg-0 p-2">Add New Category</h5>
            <a href="{{ route('categorys.index') }}" class="btn btn-gry btn-mb">
                <i class="fas fa-table mr-1"></i> All Category
            </a>
        </div>
        <div class="card p-4">

            <form id="productForm" method="POST" action="{{ route('categorys.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="Category_title" class="form-control" placeholder="Enter Category name" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
</body>

</html>