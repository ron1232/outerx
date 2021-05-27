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
                </tr>
            </thead>
            <tbody>
                @foreach ($last_orders as $order)
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
