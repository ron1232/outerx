@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Dashboard'])
<h4>Last Orders</h4>
@include('cms.last_orders')
<h4>New Products</h4>
@include('cms.new_products')
<h4>Last Registered Accounts</h4>
@include('cms.last_registered_accounts')
@endsection
