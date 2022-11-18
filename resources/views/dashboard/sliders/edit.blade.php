@extends('admin.layouts.master')
@section('title')
Dashboard | Add Slider
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Admin Profile</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form class="custom-validation" action="{{route('slider.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="sliderId" value="{{$slider->id}}">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{$slider->title}}" class="form-control" placeholder="Title" />
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <div>
                                        <textarea name="description" class="form-control" rows="5">{{$slider->description}}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Video</label>
                                    <div>
                                        <input type="url" name="video" value="{{$slider->video}}" class="form-control" placeholder="Video Url" />
                                    </div>
                                    @error('video')
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
                                            <img id="showImage" class="rounded avatar-lg" src="{{(! empty($slider->image)) ? asset('storage/images/sliders/'.$slider->image ) : asset('backend/assets/images/users/no_image.jpg') }}" style="width: 8%; height:8%;" alt="Slider image">
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
@endsection
