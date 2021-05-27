@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Orders'])
<div class="row">
    <div class="col-12 mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>User</th>
                    <th>Order</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>
                        <ul>
                            @foreach(unserialize($order->data) as $item)
                            <li>
                                {{$item['name']}},
                                Quantity: {{$item['quantity']}},
                                Price: ${{$item['price']}}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>${{$order->total}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($order->created_at))}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#deleteLink"
                            data-url="{{ url('cms/orders/'. $order->id)}}" data-title="{{$order->name}}'s order"
                            class="ml-3 btn btn-outline-danger delete-link-btn">Delete
                            <x-heroicon-s-trash class="x-icon" />
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        {{$orders->links('pagination::bootstrap-4')}}
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="deleteLink">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Action can't be undone
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-loc="" class="to-delete btn btn-danger">Delete</button>
            </div>

        </div>
    </div>
</div>

@endsection
