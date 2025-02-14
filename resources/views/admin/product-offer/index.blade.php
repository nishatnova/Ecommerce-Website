@extends('admin.master')

@section('title', 'Manage Product Offer')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Offer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product Offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Offer Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Product Name</th>
                                <th class="border-bottom-0">Offer Title 1</th>
                                <th class="border-bottom-0">Title 2</th>
                                <th class="border-bottom-0">Title 3</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productOffers as $productOffer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$productOffer->product->name}}</td>
                                    <td>{{$productOffer->title_one}}</td>
                                    <td>{{$productOffer->title_two}}</td>
                                    <td>{{$productOffer->title_three}}</td>
                                    <td>{{$productOffer->description}}</td>
                                    <td><img src="{{asset($productOffer->image)}}" alt="" height="40" width="60"/></td>
                                    <td class="d-flex">
                                        <a href="{{route('product-offer.edit', $productOffer->id)}}" class="btn btn-primary btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('product-offer.destroy', $productOffer->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
@endsection



