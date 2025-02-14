@extends('admin.master')
@section('title', 'Edit Color')
@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Color</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form action="{{route('color.update', $color->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-2">Color Name</label>
                            <div class="col-md-7 form-group">
                                <input id="name" type="text" value="{{$color->name}}" class="form-control" name="name"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-2">Color Code</label>
                            <div class="col-md-7 form-group">
                                <input id="code" type="color" class="form-control" value="{{$color->code}}" name="code"/>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2">Color Description</label>
                            <div class="col-md-7 form-group">
                                <textarea id="description" name="description" class="form-control">{{$color->description}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2">Status</label>
                            <div class="col-md-7 form-group">
                                <label> <input type="radio" value="1" {{$color->status == 1 ? 'checked' : ''}} name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" {{$color->status == 0 ? 'checked' : ''}} name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2"></label>
                            <div class="col-md-7 form-group">
                                <input type="submit" class="btn btn-primary-gradient rounded-0 float-end" value="Update Size Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
