<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Admin;
use Illuminate\Support\Facades\DB;

class UserController extends CommonController
{
    
	public function index()
	{

		
	}

	//修改密码
    public function revise()
    {
    	//如果有提交就进行处理，没有提交就直接显示
    	if(Input::all()){
    		$input = Input::all();
    	}else{
    		return view('admin.user_revise');
    	}
    }

	public function store(Request $request){

		$rules =[
			'password'=>'required|between:6,20|confirmed',
			'password-o'=>'required',
		];
		$message=[
			'password.required'=>'新密码不能为空！',
			'password.between'=>'新密码必须6-20之间！',
			'password-o.required'=>'原密码不能为空！',
			'password.confirmed'=>'两次输入的密码不一致！'
		];	

		$this->validate($request,$rules,$message);
		$user = $request->session()->get('user');
		$data = Admin::where('user_name',$user['name'])->get();
		$pass =$data['0']['user_pass'];
		$name = $data['0']['user_name'];
		if($request['password-o'] != \Crypt::decrypt($pass) ){
			return back()->with('msg','原密码不正确');	

		}else{
			$password = $request['password'];
			$pass_n = \Crypt::encrypt($password);
			$num =0;
			$num = DB::update("update jyz_admin set user_pass = '$pass_n' where user_name = ?", [$name]);
			if($num>0){
				return redirect('admin/prompt')->with(['message'=>'密码修改成功！','url' =>url('/admin/index'), 'jumpTime'=>5,'status'=>true]);
			}else{
			return redirect('admin/prompt')->with(['message'=>'密码修改失败！','url' =>url('/admin/user/revise'), 'jumpTime'=>5,'status'=>false]);
			}	

		}
	}

}
