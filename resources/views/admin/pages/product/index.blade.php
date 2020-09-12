@extends('admin.layouts.default')


@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item "><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item ">Pages</li>
                <li class="breadcrumb-item active"> <a href="{{ route('dashboard.product.index') }}">product</a> </li>

            </ol>
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            <strong> {{ Session::get('success') }} </strong>
            </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $product)

                                <tr>
                                    <td> {{ $product->name }} </td>
                                    <td> {{ $product->description }} </td>
                                    <td> {{ $product->category->name }} </td>
                                    <td> {{ $product->price }} </td>
                                
                                    <td> 
                                        <a href="{{ route('dashboard.product.edit', $product->id) }}"><button type="button" class="btn btn-outline-primary">Edit</button></a>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#cat{{ $product->id }}">Delete</button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="cat{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                             <p>Are you sure you want to delete <strong>{{ $product->name }}</strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href=" {{ route('dashboard.product.delete',$product->id) }} "><button type="button" class="btn btn-success"> Yes</button></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>


                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

        </div>
    </main>
@endsection
