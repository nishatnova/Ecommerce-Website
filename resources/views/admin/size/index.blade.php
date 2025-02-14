@extends('admin.master')
@section('title', 'Manage Color')
@section('body')

    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Color</li>
            </ol>
        </div>
    </div>

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Colors</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Serial No</th>
                                <th class="wd-15p border-bottom-0">Size name</th>
                                <th class="wd-15p border-bottom-0">Size Code</th>
                                <th class="wd-20p border-bottom-0">Description</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $size)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$size->name}}</td>
                                    <td>{{$size->code}}</td>
                                    <td>{{$size->description}}</td>
                                    <td>{{$size->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td class="text-center">
                                        <div class="row justify-content-center">
                                            <div class="col-2 me-2">
                                                <a href="{{ route('size.edit', $size->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <div class="col-2">
                                                <form action="{{ route('size.destroy', $size->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
