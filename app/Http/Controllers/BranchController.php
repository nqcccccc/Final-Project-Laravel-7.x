<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Branch extends Controller
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
    public function add_branch()
    {
        $this->AuthLogin();
        return view ('admin.add_branch');
    }
    public function all_branch()
    {
        $this->AuthLogin();
        $all_branch = DB::table('tbl_branch')->get();
        $manager_branch = view('admin.all_branch')->with('all_branch',$all_branch);
        return view ('admin_layout')->with('admin.all_branch',$manager_branch);
    }
    public function save_branch(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['branch_name'] = $request->branch_name;
        $data['branch_add'] = $request->branch_add;
        $data['branch_status'] = $request->branch_status;
        $data['branch_admin'] = $request->branch_admin;
        $data['branch_phone'] = $request->branch_phone;

        DB::table('tbl_branch')->insert($data);
        session::put('message','Thêm đại lý thành công !');
        return redirect::to('add-branch');
    }
    public function active_branch($branch_id)
    {
        $this->AuthLogin();
        DB::table('tbl_branch')->where('branch_id',$branch_id)->update(['branch_status'=>1]);
        session::put('message','Đại lý đã hoạt động !');
        return Redirect::to('all-branch');
    }
    public function inactive_branch($branch_id)
    {
        $this->AuthLogin();
        DB::table('tbl_branch')->where('branch_id',$branch_id)->update(['branch_status'=>0]);
        session::put('message','Đại lý đã dừng hoạt động !');
        return Redirect::to('all-branch');
    }
    public function edit_branch($branch_id)
    {
        $this->AuthLogin();
        $edit_branch = DB::table('tbl_branch')->where('branch_id',$branch_id)->get();
        $manager_branch  = view('admin.edit_branch')->with('edit_branch',$edit_branch);
        return view('admin_layout')->with('admin.edit_branch', $manager_branch);
    }
    public function update_branch(Request $request,$branch_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['branch_name'] = $request->branch_name;
        $data['branch_add'] = $request->branch_add;
        $data['branch_admin'] = $request->branch_admin;
        $data['branch_phone'] = $request->branch_phone;
        DB::table('tbl_branch')->where('branch_id',$branch_id)->update($data);
        Session::put('message','Cập nhật đại lý thành công !');
        return Redirect::to('all-branch');
    }
    public function delete_branch($branch_id){
        $this->AuthLogin();
        DB::table('tbl_branch')->where('branch_id',$branch_id)->delete();
        Session::put('message','Xóa đại lý thành công !');
        return Redirect::to('all-branch');
    }
}
