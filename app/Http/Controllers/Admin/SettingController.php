<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Admin\SettingFormRequest;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index(){
        $setting=Setting::find(6);
        return view('admin.setting.index',compact('setting'));
    }

    public function saveSetting(SettingFormRequest $request){

        $data=$request->validated();

        $setting=Setting::where('id',6)->first();

        if($setting){

            $setting->website_name=$data['website_name'];

            
            if($request->hasfile('website_logo')){

                $destination ='uploads/settings/'.$setting->logo;
                if(File::exists($destination)){
                     File::delete($destination);
                }

            
                 $file=$request->file('website_logo');
                 $filename=time().'.'.$file->getClientOriginalExtension();
                 $file->move('uploads/settings/',$filename);
                 $setting->logo=$filename;
            }
            if($request->hasfile('website_favicon')){

                $destination ='uploads/settings/'.$setting->favicon;
                if(File::exists($destination)){
                     File::delete($destination);
                }

            
                 $file=$request->file('website_favicon');
                 $filename=time().'.'.$file->getClientOriginalExtension();
                 $file->move('uploads/settings/',$filename);
                 $setting->favicon=$filename;
            }
         $setting->description=$data['description'];
         $setting->meta_title=$data['meta_title'];
         $setting->meta_description=$data['meta_description'];
         $setting->meta_keyword=$data['meta_keyword'];

         $setting->save();
         return redirect(route('admin.settings'))->with('message','Settings Updated Successfully');
        }
        else{
         $setting=new Setting;

         $setting->website_name=$data['website_name'];

         if($request->hasfile('website_logo')){
            $file=$request->file('website_logo');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/settings/',$filename);
            $setting->logo=$filename;
         }

         if($request->hasfile('website_favicon')){
            $file=$request->file('website_favicon');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/settings/',$filename);
            $setting->favicon=$filename;
         }
         $setting->description=$data['description'];
         $setting->meta_title=$data['meta_title'];
         $setting->meta_description=$data['meta_description'];
         $setting->meta_keyword=$data['meta_keyword'];

         $setting->save();
         return redirect(route('admin.settings'))->with('message','Settings Saved Successfully');
        }
    }
}
