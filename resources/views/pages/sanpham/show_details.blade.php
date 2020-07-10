@extends('layout')
@section('content')
<style>
    body {  
    font-family:Arial, Helvetica, sans-serif;   
    overflow-x: hidden;
    }
        
    img {   
    max-width: 100%;
    }
        
    .preview {  
    display: -webkit-box;   
    display: -webkit-flex;  
    display: -ms-flexbox;   
    display: flex;  
    -webkit-box-orient: vertical;   
    -webkit-box-direction: normal;  
    -webkit-flex-direction: column; 
    -ms-flex-direction: column; 
    flex-direction: column;
    } 
        
    @media screen and (max-width: 996px) { 
    .preview { 
    margin-bottom: 20px;
    }
    }
        
    .preview-pic {  
    -webkit-box-flex: 1;    
    -webkit-flex-grow: 1;   
    -ms-flex-positive: 1;   
    flex-grow: 1;
    }
        
    .preview-thumbnail.nav-tabs {   
    border: none;   
    margin-top: 15px;
    }
        
    .preview-thumbnail.nav-tabs li {    
    width: 15%; 
    margin-right: 2.5%;
    }
        
    .preview-thumbnail.nav-tabs li img {    
    max-width: 70%;    
    display: block;
    }
        
    .preview-thumbnail.nav-tabs li a {  
    padding: 0; 
    margin: 0;  
    cursor:pointer;
    }
        
    .preview-thumbnail.nav-tabs li:last-of-type {   
    margin-right: 0;
    }
        
    .tab-content {  
    overflow: hidden;
    }
        
    .tab-content img {  
    width: 100%;    
    -webkit-animation-name: opacity;    
    animation-name: opacity; 
    -webkit-animation-duration: .3s; 
    animation-duration: .3s;
    }
        
    .card { 
    margin-top: 0px;    
    background: #fff;   
    padding: 3em;   
    line-height: 1.5em;
    } 
        
    @media screen and (min-width: 997px) { 
    .wrapper { 
    display: -webkit-box; 
    display: -webkit-flex; 
    display: -ms-flexbox; 
    display: flex;
    }
    }
        
    .details {  
    display: -webkit-box;
        display: -webkit-flex;  
    display: -ms-flexbox;   
    display: flex;  
    -webkit-box-orient: vertical;   
    -webkit-box-direction: normal;  
    -webkit-flex-direction: column; 
    -ms-flex-direction: column; 
    flex-direction: column;
    }
        
    .colors {   
    -webkit-box-flex: 1;    
    -webkit-flex-grow: 1;   
    -ms-flex-positive: 1;   
    flex-grow: 1;
    }
        
    .product-title, .price, .sizes, .colors {   
    text-transform: UPPERCASE;  
    font-weight: bold;
    }
        
    .checked, .price span { 
    color: #ff9f1a;
    }
        
    .product-title, .rating, .product-description, .price, .vote, .sizes {  
    margin-bottom: 15px;
    }
        
    .product-title {    
    margin-top: 0;
    }
        
    .size {
        margin-right: 10px;
    }
        
    .size:first-of-type {   
    margin-left: 40px;
    }
        
    .color {    
    display: inline-block;  
    vertical-align: middle; 
    margin-right: 10px; 
    height: 2em;    
    width: 2em; 
    border-radius: 2px;
    }
        
    .color:first-of-type {  
    margin-left: 20px;
    }
        
    .add-to-cart, .like {   
    background: orange;    
    padding: 1.2em 1.5em;   
    border: none;   
    text-transform: UPPERCASE;  
    font-weight: bold;  
    color: #fff;    
    text-decoration:none; 
    -webkit-transition: background .3s ease; 
    transition: background .3s ease;
    }
        
    .add-to-cart:hover, .like:hover {   
    background: orange;    
    color: #fff;    
    text-decoration:none;
    }
        
    .not-available {    
    text-align: center; 
    line-height: 2em;
    }
        
    .not-available:before { 
    font-family: fontawesome;   
    content: "\f00d";   
    color: #fff;
    }
        
    .orange {   
    background: #ff9f1a;
    }
        
    .green {    
    background: #85ad00;
    }
        
    .blue { 
    background: #0076ad;
    }
        
    .tooltip-inner {    
    padding: 1.3em;
    } 
        
    @-webkit-keyframes opacity { 
    0% { opacity: 0; -webkit-transform: scale(3); transform: scale(3);} 
    100% { opacity: 1; -webkit-transform: scale(1); transform: scale(1);}
    } 
        
    @keyframes opacity { 
    0% { opacity: 0; -webkit-transform: scale(3); transform: scale(3);} 
    100% { opacity: 1; -webkit-transform: scale(1); transform: scale(1);}
    }
</style>
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
	<div class="preview col-md-5"> 
        <div class="preview-pic tab-content"> 
            <div class="tab-pane active" id="pic-1"><img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt=""></div> 
            @foreach($detailimg as $img)
                <div class="tab-pane" id="{{$img->id}}"><img src="{{URL::to('/public/uploads/product/details/'.$img->filename)}}" alt=""></div> 
            @endforeach
        </div> 
        <ul class="preview-thumbnail nav nav-tabs">
            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt=""></a></li> 
            @foreach($detailimg as $img)
                <li><a data-target="#{{$img->id}}" data-toggle="tab"><img src="{{URL::to('/public/uploads/product/details/'.$img->filename)}}" alt=""></a></li> 
            @endforeach
        </ul> 
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>Mã ID: {{$value->product_id}}</p>
            <p><b>Giới thiệu sản phẩm:<b></p>
            {!!$value -> product_desc!!}
            <form action="{{URL::to('/save-cart')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                <span>
                    <span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
                    <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
                </span>
                <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
            </form>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a>Mô tả sản phẩm</a></li>
        </ul>
    </div>
    <p>{!!$value -> product_content!!}</p>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($relate as $key => $lienquan)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                            <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{URL::to('/details/'.$lienquan->product_slug)}}">
                                    <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                    <h2>{{number_format($lienquan->product_price).' '.'đ'}}</h2>
                                    <p>{{$lienquan->product_name}}</p>
                                </a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach		
            </div>
        </div>
    </div>
</div>
<ul class="pagination pagination-sm m-t-none m-b-none">
    {!!$relate->links()!!}
</ul>
@endsection