@extends('layouts.main')

@section('page-content')
<div class="row">
	<div class="col-3">
		@include('user.layouts.menu')
	</div>
	<div class="col-9">
		<h1>History Orders</h1>
		<p>Tu tao data table hien lich su order cua user, click vao route to detail of order truyen id order vao lay order details </p>
	</div>
</div>
@endsection