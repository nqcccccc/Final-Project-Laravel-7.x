<!DOCTYPE html>
    <html lang="en">
        <style>
            .footer{
            background: #F0F0E9;
            color: #666663;
            .links{
                ul {list-style-type: none;}
                li a{
                color: #666663;
                transition: color .2s;
                &:hover{
                    text-decoration:none;
                    color: organge;
                    }
                }
            }  
            .about-company{
                i{font-size: 25px;}
                a{
                color: #666663;
                transition: color .2s;
                &:hover{color: organge}
                }
            } 
            .location{
                i{font-size: 18px;}
            }
            .copyright p{border-top:1px solid rgba(255,255,255,.1);} 
            }
            .mySlides {display:none;}
        </style>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="{{$meta_desc}}">
            <meta name="keywords" content="{{$meta_keywords}}"/>
            <meta name="robots" content="INDEX,FOLLOW"/>
            <link  rel="canonical" href="{{$url_canonical}}" />
            <meta name="author" content="">
            <link  rel="icon" type="image/x-icon" href="{{asset('public/frontend/images/logo-mini.png')}}" />
            <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
            <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
            <link rel="shortcut icon" href="{{asset('public/frontend/images/logo-mini.png')}}">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="">
        </head>
        <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> 0123456789</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> ct-accessories@email.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="{{URL::to('/home')}}"><img style="width : 70%" src="{{asset('public/frontend/images/logo.png')}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php
                                        $customer_id = Session::get('customer_id');
                                        $shipping_id = Session::get('shipping_id');
                                        if($customer_id!=NULL && $shipping_id==NULL){ 
                                    ?>
                                        <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <?php
                                        }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                    ?>
                                        <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <?php 
                                    }else{
                                    ?>
                                        <li><a href="{{URL::to('/customer-login')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <?php
                                        }
                                    ?>
                                    <li><a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                    <?php
                                        $customer_id = Session::get('customer_id');
                                        if($customer_id!=NULL){ 
                                        ?>
                                        <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                    <?php
                                }else{
                                    ?>
                                        <li><a href="{{URL::to('/customer-login')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                    <?php 
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="{{URL::to('/home')}}" class="active">Trang chủ</a></li>
                                    <li class="dropdown"><a >Sản phẩm<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            @foreach($category as $key => $danhmuc)
                                            <li><a href="{{URL::to('/category/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li> 
                                    <li><a href="{{URL::to('/about-us')}}">Về chúng tôi<i class="active"></i></a></li> 
                                    <li><a href="{{URL::to('/cart')}}">Giỏ hàng</a></li>
                                    <!--<li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <form action="{{URL::to('/search')}}" method="POST">
                                {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                                <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <div class="w3-content w3-section">
            @foreach($slider as $key => $slide)
                <img class="mySlides" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" style="width:100%">
            @endforeach
            </div>
        </section>
        <br><br><br>
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 5000);
            }
        </script>
        <section>
            <div class="container">
                <div class="row">               
                    <div class="col">
                        @yield('content')   
                    </div>
                </div>
            </div>
        </section>
        <div class="mt-5 pt-5 pb-5 footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-xs-12 about-company">
                        <img src="{{asset('public/frontend/images/logo.png')}}" style="width: 70%" alt="" >
                        <p class="pr-5 text-white-50">Nguyễn Quốc Cường 518H0003<br>Hà Nhật Tân 518H0563</p>
                    </div>
                    <div class="col-lg-3 col-xs-12 links">
                    </div>
                    <div class="col-lg-4 col-xs-12 location">
                        <h2 class="mt-lg-0 mt-sm-4">Liên hệ</h2>
                        @foreach($branch as $b)
                            <p>{{$b -> branch_name}}</p>
                            <p class="mb-0"><i class="fa fa-map-marker mr-3"></i> {{$b -> branch_add}}</p>
                            <p class="mb-0"><i class="fa fa-phone mr-3"></i> {{$b -> branch_phone}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col copyright">
                        <p class=""><small class="text-white-50">Copyrights © 2020 by CT-accessories</small></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
        <script type="text/javascript">
                $(document).ready(function(){
                $('.send_order').click(function(){
                    swal({
                        title: "Xác nhận đơn hàng",
                        text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Đồng ý,tiếp tục thanh toán",
                        cancelButtonText: "Không đồng ý,quay lại giỏ hàng",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
						if (isConfirm) {
						var shipping_email = $('.shipping_email').val();
						var shipping_name = $('.shipping_name').val();
						var shipping_address = $('.shipping_address').val();
						var shipping_phone = $('.shipping_phone').val();
						var shipping_notes = $('.shipping_notes').val();
						var shipping_method = $('.payment_select').val();
						var order_fee = $('.order_fee').val();
						var order_coupon = $('.order_coupon').val();
						var _token = $('input[name="_token"]').val();
						$.ajax({
							url: '{{url('/confirm-order')}}',
							method: 'POST',
							data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
							success:function(){
								swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
							}
						});
						window.setTimeout(function(){ 
							location.reload();
						} ,3000);
						} else {
						swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
						}
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.add-to-cart').click(function(){
                    var id = $(this).data('id_product');
                    // alert(id);
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_image = $('.cart_product_image_' + id).val();
                    var cart_product_price = $('.cart_product_price_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                        success:function(){
                            swal({
								title: "Đã thêm sản phẩm vào giỏ hàng",
								text: "Cảm ơn bạn đã chọn sản phẩm này",
								showCancelButton: true,
								cancelButtonText: "Xem tiếp",
								confirmButtonClass: "btn-success",
								confirmButtonText: "Đi đến giỏ hàng",
								closeOnConfirm: false
							},
							function() {
								window.location.href = "{{url('/cart')}}";
							});
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.choose').on('change',function(){
					var action = $(this).attr('id');
					var ma_id = $(this).val();
					var _token = $('input[name="_token"]').val();
					var result = '';
					if(action=='city'){
						result = 'province';
					}else{
						result = 'wards';
					}
					$.ajax({
						url : '{{url('/select-delivery-home')}}',
						method: 'POST',
						data:{action:action,ma_id:ma_id,_token:_token},
						success:function(data){
							$('#'+result).html(data);     
						}
					});
				});
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
			$('.calculate_delivery').click(function(){
				var matp = $('.city').val();
				var maqh = $('.province').val();
				var xaid = $('.wards').val();
				var _token = $('input[name="_token"]').val();
				if(matp == '' && maqh =='' && xaid ==''){
					alert('Bạn chưa chọn nơi giao hàng !');
				}else{
					$.ajax({
					url : '{{url('/calculate-fee')}}',
					method: 'POST',
					data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
					success:function(){
						location.reload(); 
					}
					});
				} 
            });
        });
        </script>
    </body>
</html>