<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){

        $data=$request->validated();

        $category=new Category;

        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];

        if($request->hasfile('image')){
             $file=$request->file('image');
             $filename=time().'.'.$file->getClientOriginalExtension();
             $file->move('uploads/category/',$filename);
             $category->image=$filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keyword=$data['meta_keyword'];

        $category->navbar_status=$request->navbar_status == true ? 1 : 0;
        // $category->navbar_status=$data['navbar_status'];
        // $category->status=$data['status'];
        $category->status=$request->status == true ? 1 : 0;
        $category->created_by=Auth::user()->id;

        $category->save();

        return redirect(route('admin.category'))->with('message','Category Added Successfully');
        // Category::create([
        //     'name'=>$request->name,
        //     'slug'=>$request->slug,
        //     'description'=>$request->description,
        //     'image'=>$request->image,
        //     'meta_title'=>$request->meta_title,
        //     'meta_description'=>$request->meta_description,
        //     'meta_keyword'=>$request->meta_keyword,
        //     'navbar_status'=>$request->navbar_status,
        //     'status'=>$request->status,

        // ]);
        // return back();
    }

    public function edit($category_id){
        $category=Category::findOrFail($category_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request,$category_id){
          
        $data=$request->validated();

        $category=Category::findOrFail($category_id);

        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];

        if($request->hasfile('image')){

            $destination ='uploads/category/'.$category->image;
            if(File::exists($destination)){
                 File::delete($destination);
            }

             $file=$request->file('image');
             $filename=time().'.'.$file->getClientOriginalExtension();
             $file->move('uploads/category/',$filename);
             $category->image=$filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keyword=$data['meta_keyword'];

        $category->navbar_status=$request->navbar_status == true ? 1 : 0;
        // $category->navbar_status=$data['navbar_status'];
        // $category->status=$data['status'];
        $category->status=$request->status == true ? 1 : 0;
        $category->created_by=Auth::user()->id;

        $category->update();

        return redirect(route('admin.category'))->with('message','Category Updated Successfully');

    }

    public function delete(Request $request){
         
        $category=Category::findOrFail($request->category_delete_id);

        if($category){
            $destination ='uploads/category/'.$category->image;
            if(File::exists($destination)){
                 File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect(route('admin.category'))->with('message','Category Deleted with Its Posts Successfully');
        }
        else{
            return redirect(route('admin.category'))->with('message','Category ID Not Found');
        }
    }
}
