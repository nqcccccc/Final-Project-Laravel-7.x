@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
	<div class="panel panel-default">
		<div class="panel-heading">
			Liệt kê danh mục sản phẩm
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
						ID
					  </label>
					</th>
					<th>Tên danh mục</th>
					<th>Slug</th>
					<th>Hiển thị</th>
					<th style="width:30px;"></th>
				  </tr>
				</thead>
				<tbody>
					@foreach($all_category_product as $key => $cate_pro)
					<tr>
						<td>{{ $cate_pro->category_id }}</td>
						<td>{{ $cate_pro->category_name }}</td>
						<td>{{ $cate_pro->slug_category_product }}</td>
						<td><span class="text-ellipsis">
						  <?php
						   if($cate_pro->category_status==1){
							?>
							<a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-power-off-styling fa fa-power-off"></span></a>
							<?php
							 }else{
							?>  
							 <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-power-on-styling fa fa-power-off"></span></a>
							<?php
						   }
						  ?>
						</span></td>
					   
						<td>
						  <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
							<i class="fa fa-pencil-square-o text-success text-active"></i></a>
						  <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không ?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
							<i class="fa fa-times text-danger text"></i>
						  </a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="file" name="file" accept=".xlsx"><br>
				<input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
			</form>
			<form action="{{url('export-csv')}}" method="POST">
				@csrf
				<input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
			</form>
		</div>
		<footer class="panel-footer">
			<div class="row"></div>
		</footer>
	</div>
</div>
@endsection