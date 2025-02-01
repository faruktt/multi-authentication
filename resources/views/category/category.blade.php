@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">category List</h3></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <th>SL</th>
                      <th> Category Name</th>
                    </thead>
                    <tbody>
               @foreach($categories as $sl=>$category)
                        <tr>
                          <td>{{$sl+1}} </td>
                          <td>{{$category->category_name}} </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Add Category</h3></div>
            <div class="card-body">
                <form action="{{ route('category.add') }}" method="POST">
                  @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
