@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			   Nhập hàng về đại lý
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
					<form role="form" action="{{URL::to('/import-product')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select name="pro_name" class="form-control input-sm m-bot15">
                            @foreach($product as $key => $product)
                                <option value="{{$product -> product_id}}">{{$product -> product_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đại lý</label>
                            <select name="brch_name" class="form-control input-sm m-bot15">
                            @foreach($branch as $key => $branch)
                                <option value="{{$branch -> branch_id}}">{{$branch -> branch_name}}</option>
                            @endforeach
                            </select>
                        </div>
						<div class="form-group">
							<label>Giá nhập vào</label>
							<input type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập giá nhập" name="in_price" class="form-control" id="" placeholder="Giá nhập vào">
                        </div>
                        <div class="form-group">
							<label>Số lượng nhập vào</label>
							<input type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập số lượng" name="in_qty" class="form-control" id="" placeholder="Số lượng nhập vào">
                        </div>
                        <div class="form-group">
							<label>Ngày nhập hàng</label>
							<input type="date"  name="in_date" class="form-control" id="" placeholder="Ngày nhập hàng">
						</div>
						<button type="submit" name="import" class="btn btn-info">Nhập hàng</button>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection