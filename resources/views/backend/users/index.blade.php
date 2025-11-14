@extends('layout.Backend.main')
@section('title', 'user list')
@section('main-content')



    <div class="container-fluid px-3 py-3 m-1">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
        @endif
        </div>
          <div class="card shadow-sm border-0 mx-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
                <h5 class="mb-2 mb-lg-0"> Users</h5>
            </div>
              <div class="card-body p-0">
                <!-- ✅ Responsive Table Wrapper -->
                <div class="table-responsive">
                    <table id="productsTable" class="table table-striped table-hover table-bordered align-middle mb-0">
                        <caption class="px-3">List of Users</caption>
                        <thead class="table-light">
                            <tr>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Mobail</th>
                                <th>Email</th>
                                <th>City</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                @foreach($users as $user)
                                        <td class="text-truncate" style="max-width: 150px;">{{ $user->fullname }}</td>
                                        <td class="text-truncate" style="max-width: 150px;">{{ $user->username }}</td>

                                        <td class="text-truncate" style="max-width: 150px;">{{ $user->phone }}</td>

                                        <td class="text-truncate" style="max-width: 150px;">{{ $user->email }}</td>

                                        <td class="text-truncate" style="max-width: 150px;">{{ $user->address }}</td>


                                        <td class="text-center">
                                            <button class="btn btn-sm btn-warning user_view" data-id="{{ $user->userId }}" data-bs-toggle="modal" 
                                                data-bs-target="#exampleModal"> <a href="">
                                                    <i class="fa fa-edit"></i></a>Veiw</button>

                                            <form action="{{ route('users.delete', $user->userId) }}" method="POST"
                                                style="display:inline;">
                                                @csrf

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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">User Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- User details can be displayed here -->
                  
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection

