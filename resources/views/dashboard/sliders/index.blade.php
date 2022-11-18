@extends('admin.layouts.master')
@section('title')
Dashboard | Sliders
@endsection
@section('css')
<link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Slider Table</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Slider Table</li>
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
                            <h4>Sliders
                            <a href="{{route('slider.create')}}" class="btn btn-primary waves-effect waves-light float-end mb-4">Add Slider</a>
                            </h4><br><br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Video</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse($sliders as $slider)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td> <img class="rounded avatar-lg" src="{{(! empty($slider->image)) ? asset('storage/images/sliders/'.$slider->image ) : asset('backend/assets/images/users/no_image.jpg') }}" alt="Slider image">
                                        </td>
                                        <td>{{$slider->video}}</td>
                                        <td>
                                            <a href="{{route('slider.edit', $slider->id)}}" class="btn btn-warning waves-effect waves-light">Edit</a>
                                            <a href="{{route('slider.destroy')}}" class="btn btn-danger waves-effect waves-light">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <div colspan="6" class="text-danger">No Sliders Found</div>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
</div>

@endsection
@section('js')
<!-- Datatable init js -->
<script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

<script src="{{asset('backend/assets/js/app.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
@endsection
