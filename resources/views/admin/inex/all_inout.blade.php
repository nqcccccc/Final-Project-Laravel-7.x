@extends('admin_layout')
@section('admin_content')
@foreach($branch as $key => $bra)
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			Danh Sách Nhập Hàng Của {{$bra ->branch_name}}
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
						<th>Số lượng nhập</th>
						<th>Giá Nhập</th>
						<th>Ngày Nhập</th>
						<th style="width:20px;"></th>
					</tr>
				</thead>
				<tbody>
				@foreach($import_table as $key => $it)
					<tr class="">
						<td><i>{{$it->in_id}}</i></td>
						<td>{{$it->product_name}}</td>
						<td>{{$it->in_qty}}</td>
						<td>{{$it->in_price}}</td>
						<td>{{$it->in_date}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			Danh Sách Xuất Hàng Của {{$bra ->branch_name}}
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
						<th>Số lượng xuất</th>
						<th>Giá Nhập</th>
						<th>Ngày Xuất</th>
						<th>Lợi nhuận từng đợt xuất</th>
						<th style="width:20px;"></th>
					</tr>
				</thead>
				<tbody>
				@php
				$total_profit = 0
				@endphp
				@foreach($export_table as $key => $et)
				@php
					$total_profit += $et->sub_profit;
				@endphp
					<tr class="">
						<td><i>{{$et->out_id}}</i></td>
						<td>{{$et->product_name}}</td>
						<td>{{$et->out_qty}}</td>
						<td>{{$et->out_price}}</td>
						<td>{{$et->out_date}}</td>
						<td>{{$et->sub_profit}}</td>
					</tr>
				@endforeach
				@endforeach
					<tr>
						<td colspan="3" style="font-weight: bold; color : red ; font-size : 20px">  
						 	Tổng Doanh Thu: {{number_format($total_profit,0,',','.')}} VNĐ 
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection