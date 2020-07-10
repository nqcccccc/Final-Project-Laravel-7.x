@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh Sách Đại Lý
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
                        <label class="i-checks m-b-none">
                            ID
                        </label>
                        </th>
                        <th>Tên đại lý</th>
                        <th>Địa chỉ</th>
                        <th>Quản lý</th>
                        <th>Số điện thoại</th>
                        <th>Hoạt động</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_branch as $key => $branch)
                    <tr>
                        <td><label class="i-checks m-b-none">{{ $branch->branch_id}}</label></td>
                        <td>{{ $branch->branch_name}}</td>
                        <td>{{ $branch->branch_add}}</td>
                        <td>{{ $branch->branch_admin}}</td>
                        <td>{{ $branch->branch_phone}}</td>
                        <td>
                            <span class="text-ellipsis">
                                <?php
                                    if($branch->branch_status == 1)
                                    {
                                ?>
                                        <a href="{{URL::to('/inactive-branch/'.$branch->branch_id)}}"><span class="fa-power-off-styling fa fa-power-off"></span></a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                        <a href="{{URL::to('/active-branch/'.$branch->branch_id)}}"><span class="fa-power-on-styling fa fa-power-off"></span></a>
                                <?php    
                                    }
                                ?>
                            </span>
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-branch/'.$branch->branch_id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa đại lý này ?')" href="{{URL::to('/delete-branch/'.$branch->branch_id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-trash-o text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection