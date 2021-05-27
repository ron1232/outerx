<div class="row">
    <div class="col">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Last Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($new_accounts as $account)
                <tr>
                    <td><p>{{$account->id}}</p></td>
                    <td><p>{{$account->name}}</p></td>
                    <td><p>{{$account->email}}</p></td>
                    <td><p>{{$account->country}}</p></td>
                    <td>{{date('d/m/Y H:i', strtotime($account->updated_at))}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($account->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
