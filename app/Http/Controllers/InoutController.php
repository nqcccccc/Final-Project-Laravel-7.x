<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class InoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index_import()
    {
        $this->AuthLogin();
        $product = DB::table('tbl_product')->orderby('product_id','desc')->get(); 
        $branch = DB::table('tbl_branch')->orderby('branch_id','desc')->get(); 
        return view('admin.inex.import')->with('product',$product)->with('branch',$branch);

    }
    public function import(Request $request)
    {
        $this->AuthLogin();
        $data = array();
    	$data['product_id'] = $request->pro_name;
        $data['branch_id'] = $request->brch_name;
    	$data['in_price'] = $request->in_price;
    	$data['in_qty'] = $request->in_qty;
    	$data['in_inventory'] = $request->in_qty;
        $data['in_date'] = $request->in_date;
        DB::table('tbl_import')->insert($data);
    	Session::put('message','Nhập hàng thành công');
    	return Redirect::to('import');
    }
    public function index_export()
    {
        $this->AuthLogin();
        $branch = DB::table('tbl_branch')->orderby('branch_id','desc')->get(); 
        $manage = view('admin.inex.export')->with('branch',$branch);    
        return view('admin_layout')->with('admin.inex.export', $manage);
    }
    public function index_export_table(Request $request)
    {
        $this->AuthLogin();
        $branch_id = $request->brch_name;
        $import_table = DB::table('tbl_import')
        ->join('tbl_product','tbl_product.product_id','=','tbl_import.product_id')
        ->where('tbl_import.branch_id',$branch_id)->get();
        $branch = DB::table('tbl_branch')->where('branch_id',$branch_id)->get(); 
        return view('admin.inex.export_table')->with('branch',$branch)->with('import_table',$import_table);
    }
    public function export(Request $request)
    {
        $this->AuthLogin();
        $in_id=$request->in_id;
        $data = array();
        $data2 = array();
    	$data['product_id'] = $request->product_id;
        $data['branch_id'] = $request->branch_id;
    	$data['out_price'] = $request->ex_price;
    	$data['out_qty'] = $request->ex_qty;
        $data['out_date'] = $request->ex_date;
        $data['sub_profit']= ($request->ex_qty)*($request->ex_price - $request->in_price);
        $data2['in_inventory'] = $request->in_inventory - $request->ex_qty;
        DB::table('tbl_export')->insert($data);
        DB::table('tbl_import')->where('in_id',$in_id)->update($data2);
        Session::put('message','Xuất hàng thành công');
        return Redirect::to('export');
    }
    public function index_all()
    {
        $this->AuthLogin();
        $branch = DB::table('tbl_branch')->orderby('branch_id','desc')->get(); 
        $manage = view('admin.inex.index_all_inout')->with('branch',$branch);    
        return view('admin_layout')->with('admin.inex.export', $manage);
    }
    public function all_inout(Request $request)
    {
        $this->AuthLogin();
        $branch_id = $request->brch_name;
        $import_table = DB::table('tbl_import')
        ->join('tbl_product','tbl_product.product_id','=','tbl_import.product_id')
        ->where('tbl_import.branch_id',$branch_id)->get();
        $export_table = DB::table('tbl_export')
        ->join('tbl_product','tbl_product.product_id','=','tbl_export.product_id')
        ->where('tbl_export.branch_id',$branch_id)->get();
        $branch = DB::table('tbl_branch')->where('branch_id',$branch_id)->get(); 
        return view('admin.inex.all_inout')->with('branch',$branch)->with('export_table',$export_table)->with('import_table',$import_table);
    }
}
