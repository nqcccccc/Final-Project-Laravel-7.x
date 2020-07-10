@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Danh Mục Sản Phẩm
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
                @foreach($edit_branch as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-branch/'.$edit_value->branch_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên đại lý</label>
                            <input type="text" value="{{$edit_value->branch_name}}" name="branch_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" value="{{$edit_value->branch_add}}" name="branch_add" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Quản lý</label>
                            <input type="text" value="{{$edit_value->branch_admin}}" name="branch_admin" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" value="{{$edit_value->branch_phone}}" name="branch_phone" class="form-control">
                        </div>
                    <button type="submit" name="update_branch" class="btn btn-info">Cập nhật đại lý</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection