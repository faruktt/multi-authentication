@extends('admin.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card mt-2">
                    <div class="card-header bg-success">
                        <h3 class="text-center">Order List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive text-center">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($total_order)
                                    <div class="alert-success alert">{{ $total_order }} orders are running!</div>
                                @endif
                                @if(session()->has('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @forelse ($orders as $sl=>$order)
                                <tr>
                                    <td>{{ ++$sl }}</td>
                                    <td>{{ $order->rel_to_product->name }}</td>
                                    <td>{{ $order->rel_to_product->category_name }}</td>
                                    <td >{{ $order->quantity }}</td>
                                    <td>{{ $order->rel_to_product->price }}</td>
                                    <td>
                                        <a href="{{ route('cart.delete', $order->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="{{ route('confirm.order', $order->id) }}" class="btn btn-primary btn-sm">Comfirm</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Prodcut found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>
</html>
@endsection
