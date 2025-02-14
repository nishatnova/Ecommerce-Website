@extends('admin.master')
@section('title', 'Add Size')
@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Size</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form action="{{route('size.store')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-2">Size Name</label>
                            <div class="col-md-7 form-group">
                                <input id="name" type="text" class="form-control" name="name"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-2">Size Code</label>
                            <div class="col-md-7 form-group">
                                <input id="code" type="text" class="form-control" name="code"/>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2">Size Description</label>
                            <div class="col-md-7 form-group">
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2">Status</label>
                            <div class="col-md-7 form-group">
                                <label class="rdiobox">
                                    <input type="radio" class="radio-primary" checked value="1" name="status"/>
                                    <span> Published</span>
                                </label>

                                <label class="rdiobox">
                                    <input type="radio" class="radio-primary" value="0" name="status"/>
                                    <span> Unpublished</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <label for="description" class="col-md-2"></label>
                            <div class="col-md-7 form-group">
                                <input type="submit" class="btn btn-primary-gradient rounded-0 float-end" value="Create New Size Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
