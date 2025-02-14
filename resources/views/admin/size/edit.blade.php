@extends('admin.master')
@section('title', 'Edit Size')
@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Size</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form action="{{ route('size.update', $size->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-2">Size Name</label>
                            <div class="col-md-7 form-group">
                                <input id="name" type="text" value="{{ $size->name }}" class="form-control" name="name"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-2">Size Code</label>
                            <div class="col-md-7 form-group">
                                <input id="code" type="text" value="{{ $size->code }}" class="form-control" name="code"/>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2">Size Description</label>
                            <div class="col-md-7 form-group">
                                <textarea id="description" name="description" class="form-control">{{ $size->description }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2">Status</label>
                            <div class="col-md-7 form-group">
                                <label class="rdiobox">
                                    <input type="radio" class="radio-primary" {{$size->status == 1 ? 'checked' : ''}} value="1" name="status"/>
                                    <span> Published</span>
                                </label>

                                <label class="rdiobox">
                                    <input type="radio" class="radio-primary" {{$size->status == 0 ? 'checked' : ''}} value="0" name="status"/>
                                    <span> Unpublished</span>
                                </label>
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
