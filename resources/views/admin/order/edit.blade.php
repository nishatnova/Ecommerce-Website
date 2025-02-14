@extends('admin.master')
@section('title','Edit order Page')

@section('body')

    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Order Edit Info</h6>
                        <hr/>
                        <p class="text-muted">{{session('message')}}</p>
                        <div class="table-responsive">
                            <form action="{{route('order.update', $order->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label class="col-lg-3">Customer Info</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{isset($order->customer->name) ? $order->customer->name : ''}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-3">Order Total</label>
                                    <div class="col-md-9">
                                        <input type="number" value="{{$order->order_total}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-3">Payment Method</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$order->payment_method}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-3">Select Courier</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="courier_id">
                                            <option value="1" @selected($order->courier_id == 1)> Pathao</option>
                                            <option value="2" @selected($order->courier_id == 2)> SA Poribahan</option>
                                            <option value="3" @selected($order->courier_id == 3)>Sundarban</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-3">Delivery Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-3">Order Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="order_status">
                                            <option value="Pending" @selected($order->order_status == 'Pending')>Pending</option>
                                            <option value="Processing" @selected($order->order_status == 'Processing')>Processing</option>
                                            <option value="Complete" @selected($order->order_status == 'Complete')>Complete</option>
                                            <option value="Cancel" @selected($order->order_status == 'Cancel')>Cancel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary-gradient rounded-0 float-end" value="Update Order Info"/>
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
