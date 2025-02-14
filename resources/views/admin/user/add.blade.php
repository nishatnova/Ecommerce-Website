@extends('admin.master')
@section('title','Add User Page')
@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add User Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="userName" class="col-md-3 form-label">User Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" id="userName" placeholder="User Name" type="text"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email"  class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" name="email" id="email" placeholder="User Email" type="email"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile"  class="col-md-3 form-label">Mobile No</label>
                            <div class="col-md-9">
                                <input class="form-control" name="mobile" id="mobile" placeholder="User Mobile No." type="number"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password"  class="col-md-3 form-label">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" name="password" id="password" placeholder="User password" type="password"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="roleName" class="col-md-3 form-label">Select Role</label>
                            <div class="col-md-9">
                                <select class="form-control" name="role" required>
                                    <option value="" disabled selected> -- Select Role -- </option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Executive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">User Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image"  type="file"/>
                                <img src="" id="categoryImage" alt="" />
                            </div>
                        </div>
                        <button class="btn btn-primary-gradient rounded-0 float-end" type="submit">Create New User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

