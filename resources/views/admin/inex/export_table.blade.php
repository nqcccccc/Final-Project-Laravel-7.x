@extends('admin_layout')
@section('admin_content')
@foreach($branch as $key => $bra)
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			Bảng Xuất Hàng Của {{$bra ->branch_name}}
		</div>
		<div class="table-responsive">
			<?php
				$message = Session::get('message');
				if($message)
				{
					echo '<script language="javascript">';
					echo 'alert("'.$message.'")';
					echo '</script>';
					Session::put('message',null);
				}
			?>
			<table class="table table-striped b-t b-light">
				<thead>
					<tr>
						<th style="width:20px;">
						</th>
						<th>Tên sản phẩm</th>
						<th>Số lượng tồn</th>
						<th>Giá nhập vào</th>
						<th>Giá bán ra</th>
						<th>Số lượng xuất</th>
						<th>Ngày xuất</th>
						<th style="width:30px;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($import_table as $key => $it)
					<tr class="">
						<td><i>{{$it->in_id}}</i></td>
						<td>{{$it->product_name}}</td>
						<td>{{$it->in_inventory}}</td>
						<td>{{$it->in_price}}</td>
						<td>{{$it->product_price}}</td>
						<form action="{{URL::to('/export-product')}}" method="post">
						@csrf
							<td>
								<input type="number" min="1" max="{{$it->in_inventory}}" name="ex_qty">
								<input type="hidden" name="product_id" value="{{$it->product_id}}">
								<input type="hidden" name="branch_id" value="{{$bra ->branch_id}}">
								<input type="hidden" name="in_inventory" value="{{$it->in_inventory}}">
								<input type="hidden" name="ex_price" value="{{$it->product_price}}">
								<input type="hidden" name="in_price" value="{{$it->in_price}}">
								<input type="hidden" name="in_id" value="{{$it->in_id}}">
							</td>
							<td>
								<input type="datetime-local" name="ex_date">
							</td>
							<td>
								<button type="submit" name="export" class="btn btn-info">Xuất hàng</button>
							</td>
						</form>
					</tr>
					@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection