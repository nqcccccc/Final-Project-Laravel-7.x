@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			   Thêm sản phẩm
			</header>
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
			<div class="panel-body">
				<div class="position-center">
					<form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Tên sản phẩm</label>
							<input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
						</div>
						<div class="form-group">
							<label>Slug</label>
							<input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
						</div>
							 <div class="form-group">
							<label>Giá sản phẩm</label>
							<input type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập giá sản phẩm" name="product_price" class="form-control" id="" placeholder="Giá sản phẩm">
						</div>
						  <div class="form-group">
							<label>Hình ảnh sản phẩm</label>
							<input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label>Mô tả sản phẩm</label>
							<textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
						</div>
						 <div class="form-group">
							<label for="exampleInputPassword1">Nội dung sản phẩm</label>
							<textarea style="resize: none" rows="8" class="form-control" name="product_content"  id="id4" placeholder="Nội dung sản phẩm"></textarea>
						</div>
						 <div class="form-group">
							<label for="exampleInputPassword1">Danh mục sản phẩm</label>
							<select name="product_cate" class="form-control input-sm m-bot15">
								@foreach($cate_product as $key => $cate)
									<option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
								@endforeach
							</select>
						</div>
						 <div class="form-group">
							<label for="exampleInputPassword1">Thương hiệu</label>
							  <select name="product_brand" class="form-control input-sm m-bot15">
								@foreach($brand_product as $key => $brand)
									<option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Hiển thị</label>
							<select name="product_status" class="form-control input-sm m-bot15">
								<option value="1">Hiển thị</option>
								<option value="0">Ẩn</option>
							</select>
						</div>
						<button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection