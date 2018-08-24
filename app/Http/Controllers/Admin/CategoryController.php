<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends CommonController
{
    //get  admin/category    全部分类列表
    public function index()
    {
    	$data =array();
    	$i=0;
    	$cates =Category::orderBy('cat_order','asc')->get();//查询出所有分类
    	$data = $this->tree($cates,0,0);
 		$data = json_decode(json_encode($data), true);   	
    	//return view('admin.category.index')->with('data',$data);
    }

    //post admin/category    添加分类（用于数据的处理）
    public function store(Request $request)
    {
        //对表单提交的数据进行验证
		$rules =[
			'name'=>'required',
			'order'=>'numeric',
		];
		$message=[
			'name.required'=>'分类名不能为空！',
			'order.numeric'=>'排序必须是数字！'
		];

		$this->validate($request,$rules,$message);

		$res = Category::create([
			'cat_name'=>$request['name'],
			'cat_pid'=>$request['pid'],
			'cat_keyword'=>$request['keyword'],
			'cat_description'=>$request['description'],
			'cat_order'=>$request['order'],
		]);

		if($res){
			return redirect('admin/prompt')->with(['message'=>'分类添加成功！','url' =>url('/admin/category'), 'jumpTime'=>3,'status'=>true]);
		}else{
			return redirect('admin/prompt')->with(['message'=>'分类添加失败！','url' =>url('/admin/category/create'), 'jumpTime'=>3,'status'=>false]);

		}

    }

	//get   admin/category/create    添加分类（用于页面的展示）
    public function create()
    {
    	$input = Input::all();
    	$cates =Category::orderBy('cat_order','asc')->get();//查询出所有分类
    	$data = $this->tree($cates,0,0);
 		$data = json_decode(json_encode($data), true);

 		return view('admin.category.create')->with('data',$data);
    }

    // delete     admin/category/{category}   删除单个分类
    public function destroy($id)
    {    
        //在进行删除操作前，先判断一下该分类下是否还有子分类，有的话就不能删除。
        $res = category::where('cat_pid',$id)->get();
        if(count($res)<1){
            $num = Category::where('cat_id',$id)->delete();
            if($num==1){
                $data=[
                    'status' =>0,
                    'msg' => '删除分类成功'
                ];
            }else{
                $data=[
                    'status' =>1,
                    'msg' => '删除分类失败'
                ];
            }
        }else{
            $data=[
                'status' =>3,
                'msg' => '该分类下存在子分类，无法删除'
            ];
        }
        return $data;
    }

    //put   admin/category/{category}    更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $res = Category::where('cat_id',$id)->update($input);
        if($res==1){
            return redirect('admin/prompt')->with(['message'=>'分类修改成功！','url' =>url('/admin/category'), 'jumpTime'=>3,'status'=>true]);
        }else{
            return redirect('admin/prompt')->with(['message'=>'分类修改失败！','url' =>url('/admin/category/'.$id.'/edit'), 'jumpTime'=>3,'status'=>false]);
        }   
    }

    //get    admin/category/{category}   显示单个分类信息
    public function show()
    {


    }


    //get    admin/category/{category}/edit    编辑分类 
    public function edit($id)
    {
        $result = Category::find($id);
        $catpid = $result->cat_pid;
        $cates =Category::orderBy('cat_order','asc')->get();//查询出所有分类
        $data = $this->tree($cates,0,0);
        return view('admin/category/edit',compact('result','data','catpid'));
    }

    // 无限循环  分类
    public function tree($cat,$pid,$num)
    {
        ini_set("error_reporting","E_ALL & ~E_NOTICE");	//屏蔽掉一些警告类错误
        $date =str_repeat("|——",$num);
    	   foreach($cat as $k=>$v){
    		  if($v->cat_pid==$pid){
    		      $v->cat_name =($date.$v->cat_name);
    		      $data[] = $v;
    			     $rest =$this->tree($cat,$v->cat_id,$num+1);
    			     if(!empty($rest)){
    				    foreach($rest as $i=>$j){
    					   $data[]=$j;
    				    }
    			     }else{
    				    continue;
    			     }
    		      }
    	   }
    	return $data;
    }


    //分类列表页的排序ajax
    public function orderchang()
    {
    	$input = Input::all();
    	$order = $input['order'];
    	$id = $input['catid'];
    	$res = Category::where('cat_id',$id)->update(['cat_order'=>$order]);
    	echo $res;
    }

}
