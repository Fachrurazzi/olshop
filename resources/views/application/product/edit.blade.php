@extends('application.templates.default')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                        <li class="breadcrumb-item active">Form Product</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="mt-0 header-title text-center">
                        <h5>Edit Product</h5>
                    </div>
                    <hr>

                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ?? $product->name }}" placeholder="Product Name" autofocus/>
                            @if ($errors->has('name'))
                                <p class="text-danger mt-1">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" placeholder="Product Description">{{ old('description') ?? $product->description }}</textarea>
                                @if ($errors->has('description'))
                                    <p class="text-danger mt-1">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" id="price" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') ?? $product->price }}" placeholder="Product Price"/>
                            @if ($errors->has('price'))
                                <p class="text-danger mt-1">{{ $errors->first('price') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" value="{{ old('image') ?? $product->image }}"/>
                            @if ($errors->has('image'))
                                <p class="text-danger mt-1">{{ $errors->first('image') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category[]" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }} select2" multiple="multiple" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($product->categories->contains($category))
                                            selected
                                        @endif
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <p class="text-danger mt-1">{{ $errors->first('category') }}</p>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-save"></i> Update
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    <i class="fa fa-undo"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end col -->
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/select2/css/select2.css') }}">
@endpush

@push('scripts')

    <script src="{{ asset('admin-assets/assets/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/plugins/select2/js/select2.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('input#price').mask('0,000,000,000', {reverse:true});
            $('.select2').select2({
                closeOnSelect: false
            });

        });
    </script>
@endpush