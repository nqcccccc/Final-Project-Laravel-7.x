@extends('admin_layout')
@section('admin_content')
<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-4 market-update-right">
                <i style="font-size: 3em;color: #fff;text-align: left;" class="fa fa-tags"> </i>
            </div>
            <div class="col-md-8 market-update-left">
            <h4>Sản phẩm</h4>
                <h3>{{ $countp}}</h3>
                <p>CT-accessories</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i style="font-size: 3em;color: #fff;text-align: left;" class="fa fa-map-marker" ></i>
            </div>
            <div class="col-md-8 market-update-left">
            <h4>Đại lý</h4>
                <h3>{{$countb}}</h3>
                <p>CT-accessories</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-usd"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Lợi nhuận</h4>
                <h3 style="font-size:17px">{{number_format($profit,0,',','.')}} VNĐ</h3>
                <p>CT-accessories</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Đơn hàng</h4>
                <h3>{{ $counto }}</h3>
                <p>CT-accessories</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection