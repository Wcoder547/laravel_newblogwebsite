<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class Homecontroller extends Controller
{
 public function index(){
            if(Auth::id()){
     $usertype=Auth()->user()->usertype;
     if($usertype=='user'){
        $post=post::where('post_status','=','active')->get();
        return view ('Home.homepage',compact('post'));
     }
     else if($usertype=='admin'){
        return view ('admin.adminhome');
     }
            }
 }

 public function post(){
    return view('post');
 }

 public function homepage(){
    $post=post::where('post_status','=','active')->get();
    return view ('Home.homepage',compact('post'));
 }
public function details_post($id){
    $post=post::find($id);
    return view('Home.details_post',compact('post'));
}
public function blogs(){
    return view('Home.services');
}

public function create_post(){
    return view ('Home.create_post');
}
public function user_post(Request $request){
    $user=Auth()->user();
    $userid=$user->id;
    $username=$user->name;
    $description=$user->description;
    $usertype=$user->usertype;


$post=new post;
$post->title=$request->title;
$post->description=$request->description;
$post->user_id=$userid;
$post->name=$username;
$post->usertype=$usertype;
$post->post_status='pending';
$image=$request->image;
if($image){
    $imagename=time(). '.' . $image->getClientOriginalExtension();
    $request->image->move('postimage',$imagename);

    $post->image=$imagename;
}
$post->save();
Alert::success('congrats','you have added the data successfully');
    return redirect()->back();
}
public function my_post(){
    $user=Auth()->user();
    $userid=$user->id;
    $data=post::where('user_id' ,'=',$userid)->get();
    return view('Home.my_post',compact('data'));
}
public function removepostbyuser($id){

    $post=post::find($id);
    $post->delete();
    return redirect()->back();

}

public function post_update_page($id){
$post=post::find($id);
return view('Home.post_update_page',compact('post'));


}

public function updated_post_data(Request $request ,$id){
    $data=post::find($id);

    $data->title=$request->title;
    $data->description=$request->description;

    $image=$request->image;
if($image){
    $imagename=time(). '.' . $image->getClientOriginalExtension();
    $request->image->move('postimage',$imagename);

    $data->image=$imagename;
}

$data->save();
return redirect()->back()->with('message','Your post data has been updated successfully');

}
}

