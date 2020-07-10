<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class Imagescontroller extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product_images()
    {
        $this->AuthLogin();
        $product = DB::table('tbl_product')->orderby('category_id','desc')->get();
        return view ('admin.add_product_img')->with('product',$product);
    }
    public function all_images()
    {
        $this->AuthLogin();
        $img = DB::table('tbl_products_photos')
        ->join('tbl_product','tbl_product.product_id','=','tbl_products_photos.product_id')
        ->orderby('tbl_products_photos.id','desc')->get();
        $all = view('admin.all_product_images')->with('img',$img);
        return view('admin_layout')->with('admin.all_product_images', $all);
    }
    public function delete_product_images($id)
    {
        $this->AuthLogin();
        DB::table('tbl_products_photos')->where('id',$id)->delete();
        Session::put('message','Xóa sản phẩm thành công !');
        return Redirect::to('all-product-images');
    }
    public function save_product_images(Request $request)
    {
        $this->AuthLogin();
        if(!empty($request -> filename))
        {
            foreach($request -> filename as $filename)
            {
                $data = array();
                $data['product_id'] = $request->pro_name;
                $data['filename'] = $request->pro_name;
                if($filename)
                {
                        $get_name_image = $filename->getClientOriginalName();
                        $name_image = current(explode('.',$get_name_image));
                        $new_image =  $name_image.rand(0,999).'.'.$filename->getClientOriginalExtension();
                        $filename->move('public/uploads/product/details',$new_image);
                        $data['filename'] = $new_image;
                        DB::table('tbl_products_photos')->insert($data);
                }
            }
            Session::put('message','Thêm ảnh sản phẩm thành công !');
            return Redirect::to('add-product-images');
        }
        Session::put('message','Vui lòng chọn sản phẩm !');
        return Redirect::to('add-product-images');
    }
}
