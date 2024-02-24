@extends('layouts.backend')

@section('title') Add Category @endsection

@section('main')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Category</a></li>
                        <li class="breadcrumb-item active">All Category</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <h4 class="card-title mb-3">All Category</h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end">
                                <a href="{{route('category.create')}}" class="btn btn-primary btn-rounded"><i class="mdi mdi-plus me-1"></i> Add Category</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table  table-nowrap nowrap align-middle dt-responsive  nowrap w-100 table-check" id="category_table">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($categories as $category)
                                    <tr class="odd">
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            <img src="{{asset($category->image??'upload/default.jpg')}}" height="50" alt="{{$category->name}}">
                                        </td>
                                        <td>{{ Str::limit($category->details, 30) }}</td>
                                        <td>
                                            <span class="badge rounded-pill
                                             @if("active"==$category->status)
                                             badge-soft-success
                                             @else
                                             badge-soft-warning
                                             @endif

                                             font-size-12">{{$category->status}}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="{{route('category.edit', $category->id)}}" class="text-success edit-list"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <form action="{{route('category.destroy', $category->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete border-0 bg-white remove-list" ><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection

@push('script')
    <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('backend')}}/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script>
        new DataTable('#category_table');

        $(".delete").click(function (e){
            e.preventDefault();
            let form = $(this).closest("form");
            Swal.fire({
                title:"Are you sure to delete?",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonText:"Yes, delete it!",
                cancelButtonText:"No, cancel!",
                customClass:{
                    confirmButton:"btn btn-success mt-2",
                    cancelButton:"btn btn-danger ms-2 mt-2"},
                buttonsStyling:!1
            }).
            then(function(t){
                if(t.value){
                    $res = form.submit();
                    Swal.fire({
                        title:"Deleted!",
                        icon:"success"
                    });
                }
            });
        });
    </script>
@endpush

@section('style')
    <!-- DataTables -->
    <link href="{{asset('backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /><!-- Sweet Alert-->
    <link href="{{asset('backend')}}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


@endsection
