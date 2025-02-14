
@extends('admin.master')
@section('title','Edit Category Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <label for="CategoryName" class="col-md-3 form-label">Category Name</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{ $category->name }}" id="CategoryName" name="name" class="form-control"/>
                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="description" class="col-md-3 form-label">Category Description </label>
                                <div class="col-md-9">
                                    <textarea name="description" id="description" class="form-control" >{{ $category->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="imgInp" class="col-md-3 form-label">Category Image  </label>
                                <div class="col-md-9">
                                    <input type="file" id="imgInp" name="image" class="form-control"/>
                                    <img src="{{ asset($category->image) }}" height="120" width="100" alt="" id="categoryImage" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Publication Status</label>
                                <div class="col-md-9 pt-3">
                                    <label> <input type="radio" value="1" {{$category->status == 1 ? 'checked' : ''}} name="status"><span> Published</span> </label>
                                    <label> <input type="radio" value="0" {{$category->status == 0 ? 'checked' : ''}} name="status"><span> Unpublished</span> </label>

                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary-gradient rounded-0 float-end">Update Category Info</button>

                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

