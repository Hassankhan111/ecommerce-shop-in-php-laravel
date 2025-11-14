@extends('layout.Backend.main')
@section('title', 'orders')
@section('main-content')

  <div class="container-fluid px-3 py-3 m-1">

     @if(session('success'))
    <div class="alert alert-success" role="alert">
       {{ session('success') }}
        @endif
    </div>
    
    <div class="card shadow-sm border-0 mx-3">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
        <h5 class="mb-2 mb-lg-0">All Orders</h5>
      </div>

      <div class="card-body p-0">
        <!-- ✅ Responsive Table Wrapper -->
        <div class="table-responsive">
          <table id="productsTable" class="table table-striped table-hover table-bordered align-middle mb-0">
            <caption class="px-3">List of Orders</caption>
            <thead class="table-light">
              <tr>
                <th>Order No</th>
                <th>Product Details</th>
                <th>QTY</th>
                <th>Totail Amount</th>
                <th>Customer Details</th>
                <th>Order Date</th>
                <th>Payment status</th>
                <th>Delivery status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td scope="row">PDO{{ str_pad($order->order_id, 3, '0', STR_PAD_LEFT) }}</td>
                  <td>
                    <b>Product Code:</b>{{ $order->product->product_code ?? 'N/A' }}
                    <b>Product Quantity:</b>{{ $order->product->product_qty ?? 'N/A' }}
                  </td>
                  <td>{{ $order->product_qty }}</td>
                  <td>{{ $order->total_amount }}</td>
                  <td>
                   <b> Name:</b>{{ $order->user->fullname ?? 'N/A' }}<br>
                    <b>Address:</b>{{ $order->user->address ?? 'N/A' }}<br>
                    <b>Phone:</b>{{ $order->user->phone ?? 'N/A' }}
                  </td>
                  <td>{{ $order->order_date }}</td>

                  @if($order->confirm == 1)
                  <td><span class="badge text-bg-success">paid</span></td>
                  @else
                  <td><span class="label label-danger">Unpaid</span></td>
                  @endif
                  
                  @if($order->delivery == 1)
                  <td><span class="label label-danger">Delivered</span></td>
                  @else
                  <td><a class="btn btn-sm btn-primary order_complete" href="" data-id="{{ $order->order_id }}">complete</a></td>
                  @endif
                  
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection