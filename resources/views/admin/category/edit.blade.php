@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::to('admin/category')}}">{{trans('labels.category')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.edit_category')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form action="{{URL::to('admin/category/update-'.$catdata->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.category')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="category_name" placeholder="{{trans('labels.category')}}" value="{{$catdata->category_name}}">
                                    @error('category_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="">{{trans('labels.image')}} (250x250) <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                    <img src="{{Helper::image_path($catdata->image)}}" alt="" class="img-fluid pt-2" style="max-height: 50px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{trans('labels.save')}}</button>
                                    <a href="{{URL::to('admin/category')}}" class="btn btn-dark">{{trans('labels.cancel')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection