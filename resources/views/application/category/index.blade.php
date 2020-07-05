@extends('application.templates.default')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
                <h4 class="page-title">Categories</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    @include('application.templates.partials._alerts')

                    <h4 class="mb-4 header-title">
                        Data Categories
                        <a href="{{ route('category.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus-circle"></i> Add Category</a>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 2px;">No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 1;
                                    $no =1;
                                    if(request()->has('page')) {
                                        $page = request('page');

                                        $no = config('olshop.pagination') * $page - (config('olshop.pagination') - 1);
                                    }
                                @endphp
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('category.edit', $category) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                            <button id="delete" data-title="{{ $category->name }}" href="{{ route('category.destroy', $category) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>

                                    <form action="" method="post" id="deleteForm">
                                        @csrf
                                        @method("DELETE")
                                        <input type="submit" value="" style="display: none">
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="body-footer mt-4">
                        {{ $categories->links('vendor.pagination._admin') }}
                    </div>
                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@push('css')
    <link href="{{ asset('admin-assets/assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <!-- Sweet-Alert  -->
    <script src="{{ asset('admin-assets/assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/pages/sweet-alert.init.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('button#delete').click(function () {
                var title = $(this).data('title');
                var href = $(this).attr('href');
                swal({
                    title: 'Are you sure to delete '+ title +' category ?',
                    text: "Once deleted! you will not be able to recover this category",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    swal(
                        'Deleted!',
                        'Your '+ title +' category has been deleted.',
                        'success'
                    )
                })
            });
        });
    </script>
@endpush