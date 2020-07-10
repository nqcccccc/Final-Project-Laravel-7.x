@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm ảnh sản phẩm
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
                    <form role="form" action="{{URL::to('/save-product-images')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select name="pro_name" class="form-control input-sm m-bot15">
                            @foreach($product as $key => $product)
                                <option value="{{$product -> product_id}}">{{$product -> product_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh chi tiết</label>
                            <input type="file" name="filename[]" multiple class="form-control" placeholder="Hình ảnh chi tiết">
                        </div>
                        <button type="submit" name="add_product_images" class="btn btn-info">Thêm ảnh sản phẩm</button>
                    </form>
                    <?php
                        if (isset($_FILES['filename'])) {
                            $myFile = $_FILES['filename'];
                            $fileCount = count($myFile["name"]);

                            for ($i = 0; $i < $fileCount; $i++) {
                                ?>
                                    <p>Images #<?= $i+1 ?>:</p>
                                    <p>
                                        Name: <?= $myFile["name"][$i] ?><br>
                                        Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
                                        Type: <?= $myFile["type"][$i] ?><br>
                                        Size: <?= $myFile["size"][$i] ?><br>
                                        Error: <?= $myFile["error"][$i] ?><br>
                                    </p>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection