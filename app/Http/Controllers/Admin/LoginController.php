<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\admin;
require_once  'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function index()
    {
    	
    }

    public function login()
    {
    	$input = Input::all();
    	//判断如果有提交就进行验证，没有提交就直接显示登录页
    	if(!empty($input)){
    		//获取验证码
    		$code = new \Code;
        	$codes = $code->get();
    		if(strtoupper($input['code'])==$codes){
                $data = Admin::first();
                if($data->user_name !=$input['name'] || crypt::decrypt($data->user_pass)!=$input['password']){
                    return back()->with('msg','用户名或密码错误！');
                }else{
                    session(['user'=>$input]);
                    return redirect('admin/index');
                }

    		}else{
    			return back()->with('msg','验证码错误');
    		}

    	}else{
    		return view('admin.login');
    	}
    	
    }

    //生成验证码
    public function code()
    {
    	$code = new \Code;
        $code->make();

    }
    //获取验证码
        public function getcode()
    {
    	$code = new \Code;
        echo $code->get();
    }

    //退出登录
    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function crypt(){

        $str = '123456';
        echo encrypt($str);
    }


}
