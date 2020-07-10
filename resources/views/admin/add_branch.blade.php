@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm đại lý
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
                    <form role="form" action="{{URL::to('/save-branch')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên đại lý</label>
                            <input type="text" name="branch_name" class="form-control" placeholder="Tên đại lý">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="branch_add" class="form-control" placeholder="Địa chỉ đại lý">
                        </div>
                        <div class="form-group">
                            <label>Quản lý</label>
                            <input type="text" name="branch_admin" class="form-control" placeholder="Tên quản lý">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="branch_phone" class="form-control" placeholder="Số điện thoại đại lý">
                        </div>
                        <div class="form-group">
                            <label>Hoạt động</label>
                            <select name="branch_status" class="form-control input-sm m-bot15">
                                <option value="1">Hoạt động</option>
                                <option value="0">Tạm dừng hoạt động</option>
                            </select>
                        </div>
                        <button type="submit" name="add_branch" class="btn btn-info">Thêm đại lý</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection