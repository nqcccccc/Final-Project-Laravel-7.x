@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê ảnh sản phẩm
        </div>
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
    </div>
    <div class="table-responsive">
		<table class="table table-striped b-t b-light">
			<thead>
				<tr>
					<th style="width:20px;">
                        <label class="i-checks m-b-none">ID</label>
					</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình sản phẩm</th>
					<th style="width:30px;"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($img as $key => $a)
				<tr>
					<td>{{ $a->id }}</td>
					<td>{{ $a->product_name }}</td>
					<td><img src="public/uploads/product/details/{{ $a->filename }}" height="100" width="100"></td>
					<td>
						<a onclick="return confirm('Bạn có chắc là muốn xóa ảnh sản phẩm này không ?')" href="{{URL::to('/delete-product-images/'.$a->id)}}" class="active styling-edit" ui-toggle-class="">
							<i class="fa fa-times text-danger text"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection