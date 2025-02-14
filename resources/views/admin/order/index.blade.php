@extends('admin.master')
@section('title','Manage order Page')

@section('body')

    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Order Show  Table</h6>
                        <hr/>
                        <p class="text-muted">{{session('message')}}</p>
                        <table id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                            <th>Sl</th>
                            <th>Order Id</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Customer Info</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{isset($order->customer->name)|| isset($order->customer->mobile) ? $order->customer->name.'('.$order->customer->mobile.')' : ''}}</td>
                                <td class="d-flex">
                                    <a href="{{route('order.show', $order->id)}}" class="btn btn-info btn-sm me-1" title="View Order Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('order.edit', $order->id)}}" class="btn btn-primary btn-sm me-1 {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Edit Order">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('order.invoice-show', ['id' => $order->id])}}" class="btn btn-success btn-sm me-1" title="View Order Invoice">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <a href="{{route('order.invoice-download', ['id' => $order->id])}}" target="_blank" class="btn btn-warning-gradient btn-sm me-1" title="Downlod Order Invoice">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <form action="{{route('order.destroy', $order->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm {{$order->order_status == 'Complete' ? 'disabled' : ''}}"  onclick="return confirm('Are you sure to delete this');">
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
