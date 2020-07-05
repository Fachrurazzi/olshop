@extends('application.templates.default')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                        <li class="breadcrumb-item active">Form Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="mt-0 header-title text-center">
                        <h5>Add Category</h5>
                    </div>
                    <hr>

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Category Name" autofocus/>
                            @if ($errors->has('name'))
                                <p class="text-danger mt-1">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <p class="text-danger mt-1">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    <i class="fa fa-undo"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection