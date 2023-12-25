@extends('website.master')
@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('cart.update-product')}}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <p class="text-center">{{session('message')}}</p>
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="image product-thumbnail"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="" target="_blank"></a></h5>
                                            <p class="font-xs">
                                                <span class="fw-bold"></span>  <br/>
                                                <span class="fw-bold"></span> <br/>
                                            </p>
                                        </td>
                                        <td class="price" data-title="Price"><span> </span></td>

                                        <td class="action" data-title="Remove">
                                            <a href="" onclick="return confirm('Are you sure to delete this..');" class="btn bg-danger border-0 btn-sm">
                                                <i class="fi-rs-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Wishlist</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                </div>
            </div>
        </div>
    </section>

@endsection

