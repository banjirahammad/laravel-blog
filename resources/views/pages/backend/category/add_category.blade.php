@extends('layouts.backend')

@section('title') Add Category @endsection

@section('main')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title mb-3">Category Info</h4>
                        </div>
                        <div class="col-6">
                            <div class="text-sm-end">
                                <a href="{{route('category.index')}}" class="btn btn-primary btn-rounded">All Category</a>
                            </div>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger font-size-10 mt-1">*</span></label>
                                    <input type="text" onkeyup="slugGenerate()" value="{{old('name')}}" required name="name" class="form-control" id="name"
                                           placeholder="Enter category name" >
                                    @error('name')
                                    <div class="text-danger font-size-10 mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug <span class="text-danger font-size-10 mt-1">*</span></label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                           placeholder="Enter category slug" value="{{old('slug')}}" required>
                                    @error('slug')
                                    <div class="text-danger font-size-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="details" class="form-label">Details </label>
                                    <div>
                                        <textarea id="details" name="details" class="form-control" rows="3">{{ old('details') }}</textarea>
                                    </div>
                                    @error('details')
                                    <div class="text-danger font-size-10 mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" id="image">
                                    @error('image')
                                    <div class="text-danger font-size-10 mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit">Save <i class="fab fa-telegram-plane ms-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
    <!-- end row -->

@endsection

@push('script')
    <script src="{{asset('backend')}}/assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/pages/form-validation.init.js"></script>
    <script>
        function slugGenerate() {
            let name = $('#name').val();
            name = name.toLowerCase();
            // Text = Text.replace('/\s/g', '_');
            name = name.replace(/[^a-z0-9 -]/g, '_') // remove invalid chars
                .replace(/\s+/g, '_') // collapse whitespace and replace by -
                .replace(/-+/g, '_') // collapse dashes
                .replace(/_+/g, '_'); // collapse dashes
            $("#slug").val(name);
        }
    </script>
@endpush
