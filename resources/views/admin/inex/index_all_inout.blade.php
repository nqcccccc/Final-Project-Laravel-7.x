@extends('admin_layout')
@section('admin_content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			   Thống kê doanh thu của chi nhánh
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
					<form role="form" action="{{URL::to('/all-inout')}}" method="get" enctype="multipart/form-data">
						{{ csrf_field() }}
                        <div class="form-group">
                            <label>Đại lý</label>
                            <select name="brch_name" class="form-control input-sm m-bot15">
				            @foreach($branch as $key => $branch)
                                <option value="{{$branch -> branch_id}}">{{$branch -> branch_name}}</option>
				            @endforeach
                            </select>
                        </div>
						<button type="submit" name="import" class="btn btn-info">Chọn chi nhánh</button>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection