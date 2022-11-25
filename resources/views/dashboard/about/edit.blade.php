@extends('admin.layouts.master')
@section('title')
Dashboard | Edit About
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit About</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form class="custom-validation" action="{{route('about.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="aboutId" value="{{$about->id}}">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{$about->title}}" class="form-control" placeholder="Title" />
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Short Title</label>
                                    <input type="text" name="short_title" value="{{$about->short_title}}" class="form-control" placeholder="Title" />
                                    @error('short_title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Short Description</label>
                                    <div>
                                        <textarea name="short_description" class="form-control" rows="5">{{$about->short_description}}</textarea>
                                    </div>
                                    @error('short_description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <div>
                                        <textarea id="elm1" name="description" class="form-control" rows="5">{{$about->description}}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <div class="col-lg-12">
                                        <div class="input-group">

                                            <input type="file" name="image" class="form-control" id="image">
                                            <img id="showImage" class="rounded avatar-lg" src="{{(! empty($about->image)) ? asset('storage/images/about/'.$about->image ) : asset('backend/assets/images/users/no_image.jpg') }}" style="width: 8%; height:8%;" alt="Slider image">
                                            @error('image')
                                            <span class="text-danger" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Update
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/form-validation.init.js')}}"></script>
<!--tinymce js-->
<script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
@endsection
