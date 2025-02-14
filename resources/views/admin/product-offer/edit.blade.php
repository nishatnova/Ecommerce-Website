@extends('admin.master')

@section('title', 'Edit Product Offer')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Offer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product Offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Product Offer Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product-offer.update', $productOffer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <select class="form-control select2-show-search form-select"  name="product_id" required>
                                    <option  value=""></option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}" {{$productOffer->product_id == $product->id ? 'selected' : ' '}}> {{$product->name}} </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="title_one" class="col-md-3 form-label">Product Offer Title One</label>
                            <div class="col-md-9">
                                <input class="form-control" id="title_one" name="title_one" value="{{$productOffer->title_one}}" type="text"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="title_two" class="col-md-3 form-label">Offer Title Two</label>
                            <div class="col-md-9">
                                <input class="form-control" id="title_two" name="title_two" value="{{$productOffer->title_two}}"  type="text"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="title_three" class="col-md-3 form-label">Offer Title Three</label>
                            <div class="col-md-9">
                                <input class="form-control" id="title_three" name="title_three" value="{{$productOffer->title_three}}" type="text"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description" name="description">{{$productOffer->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label"> Image</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="image" data-height="200"/>
                                <img src="{{asset($productOffer->image)}}" alt="" height="100" width="100"/>
                            </div>
                        </div>
                        <button class="btn btn-primary-gradient rounded-0 float-end" type="submit">Update New Product Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


