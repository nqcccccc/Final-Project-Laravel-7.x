@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Banner
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
            <th>Tên slide</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Tình trạng</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_slide as $key => $slide)
          <tr>
            <td></td>
            <td>{{ $slide->slider_name }}</td>
            <td><img src="public/uploads/slider/{{ $slide->slider_image }}" height="120" width="500"></td>
            <td>{{ $slide->slider_desc }}</td>
            <td>
              <span class="text-ellipsis">
                <?php
                  if($slide->slider_status==1){
                ?>
                <a href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}"><span class="fa-power-off-styling fa fa-power-off"></span></a>
                <?php
                  }else{
                ?>  
                <a href="{{URL::to('/active-slide/'.$slide->slider_id)}}"><span class="fa-power-on-styling fa fa-power-off"></span></a>
                <?php
                  }
                ?>
              </span>
            </td>
            <td>
             
              <a onclick="return confirm('Bạn có chắc là muốn xóa slide này không ?')" href="{{URL::to('/delete-slide/'.$slide->slider_id)}}" class="active styling-edit" ui-toggle-class="">
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