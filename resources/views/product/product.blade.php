@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Add product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-1">
                        <label class="form-label" >category</label>
                        <select name="category_id" class="form-control">
                            <option value="">select category</option>
                            @foreach (App\Models\Category::all() as $category)
                            <option value="{{  $category->id }}">{{  $category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                    <div class="mb-1">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Show product</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>product name</th>
                            <th>price</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach (App\Models\Product::all() as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
