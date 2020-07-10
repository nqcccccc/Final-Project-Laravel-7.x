@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
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
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Điều kiện giảm giá</th>
            <th>Số giảm</th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            <td>
              <span class="text-ellipsis">
                <?php
                  if($cou->coupon_condition==1){
                ?>
                  Giảm theo %
                <?php
                  }else{
                ?>  
                  Giảm theo tiền
                <?php
                  }
                ?>
              </span>
            </td>
            <td>
              <span class="text-ellipsis">
                <?php
                  if($cou->coupon_condition==1){
                ?>
                  Giảm {{$cou->coupon_number}} %
                <?php
                  }else{
                ?>  
                  Giảm {{$cou->coupon_number}} k
                <?php
                  }
                ?>
              </span>
            </td>
            <td>
              <a onclick="return confirm('Bạn có chắc là muốn xóa mã này không ?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
      </div>
    </footer>
  </div>
</div>
@endsection