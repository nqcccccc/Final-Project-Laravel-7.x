@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
		  Liệt kê thương hiệu sản phẩm
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
				  <label class="i-checks m-b-none">
				  </label>
				</th>
				<th>Tên thương hiệu</th>
				<th>Brand Slug</th>
				<th>Hiển thị</th>
				
				<th style="width:30px;"></th>
			  </tr>
			</thead>
			<tbody>
			  @foreach($all_brand_product as $key => $brand_pro)
				<tr>
					<td></td>
					<td>{{ $brand_pro->brand_name }}</td>
					<td>{{ $brand_pro->brand_slug }}</td>
					<td>
						<span class="text-ellipsis">
						<?php
						   if($brand_pro->brand_status==1){
						?>
							<a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-power-off-styling fa fa-power-off"></span></a>
						<?php
							}else{
						?>  
							<a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-power-on-styling fa fa-power-off"></span></a>
						<?php
						   }
						?>
						</span>
					</td>
					<td>
						<a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
							<i class="fa fa-pencil-square-o text-success text-active"></i>
						</a>
						<a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này không ?')" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
							<i class="fa fa-times text-danger text"></i>
						</a>
					</td>
				</tr>
			  @endforeach
			</tbody>
		  </table>
		</div>
    <footer class="panel-footer">
		<div class="row"></div>
    </footer>
	</div>
</div>
@endsection