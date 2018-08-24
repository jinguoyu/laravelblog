<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\UploadedFile;

class ArticleController extends CommonController
{
    //
//get  admin/category    全部文章列表
    public function index()
    {
    	$data=Article::all();
    	return view('admin.article.index',compact('data'));

    }

    //post admin/category    添加文章（用于数据的处理）
    public function store(Request $request)
    {
		$data=$request->except('_token');
		if ($request->hasFile('art_thumb') && $request->file('art_thumb')->isValid()) {
			$photo = $request->file('art_thumb');
			$extension = $photo->extension();
			$ext=$photo->getClientOriginalExtension();  //获取上传文件的后缀名
			$name=$photo->getClientOriginalName();//获取上传文件名
			$newname = date('YmdHis').mt_rand(100,999).'.'.$ext;//文件重命名
			$result = $photo->storeAs('photo', $newname);//移动到项目目录
			$image =env('APP_URL').'/storage/app/'.$result;//图片的完整路径
			


		}else{

			$image = '';
			//return back()->with('msg','缩略图上传失败！');
		}


		$data['art_thumb']=$image;
		$data['art_time']=time();

		//错误信息    
		$message = [
        	'art_title.required'=>'标题不能为空',
    	];
		//规则
    	$rules=[
    		'art_title'=>'required',
    	];
    	$this->validate($request,$rules,$message);

    	//将数据存入数据库
    	$res = Article::create($data);

    	if($res){
    		return redirect('admin/prompt')->with(['message'=>'文章添加成功！','url' =>url('/admin/article'), 'jumpTime'=>3,'status'=>true]);
    	}else{
    		return redirect('admin/prompt')->with(['message'=>'文章添加失败！','url' =>url('/admin/article/create'), 'jumpTime'=>3,'status'=>false]);
    	}



		
	
    }

	//get   admin/category/create    添加文章（用于页面的展示）
    public function create()
    {
    	//查询出所有分类
    	$cates =Category::orderBy('cat_order','asc')->get();
    	$com =new CategoryController;
    	$data = $com->tree($cates,0,0);
 		$data = json_decode(json_encode($data), true);


    	return view('admin.article.create',compact('data'));

    }

    // delete     admin/category/{category}   删除单个分类
    public function destroy($id)
    {    

    }

    //put   admin/category/{category}    更新分类
    public function update($id)
    {
 
    }

    //get    admin/category/{category}   显示单个分类信息
    public function show()
    {


    }


    //get    admin/category/{category}/edit    编辑分类 
    public function edit($id)
    {

    }

    // 无限循环  分类
    public function tree($cat,$pid,$num)
    {

    }


    //分类列表页的排序ajax
    public function orderchang()
    {

    }










}
