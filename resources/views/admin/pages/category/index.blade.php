@extends('admin.layouts.default')


@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item "><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item ">Pages</li>
                <li class="breadcrumb-item active">category</li>

            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($categories as $category)

                                <tr>
                                    <td> {{ $category->name }} </td>
                                    <td> {{ $category->description }} </td>
                                    <td> {{ $category->active ? 'Active' : 'Inactive' }} </td>



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
