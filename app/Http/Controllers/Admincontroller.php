<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admincontroller;

class Admincontroller extends Controller
{
public function post_page(){
    return view('admin.post_page');
}
public function add_post(Request $request){
    $user=Auth()->user();
    $userid=$user->id;
    $name=$user->name;
    $usertype=$user->usertype;

$post= new post;
$post->title=$request->title;
$post->description=$request->description;
$post->post_status='active';
$post->user_id=$userid;
$post->name=$name;
$post->usertype=$usertype;

$image=$request->image;
if($image){

$imagename=time(). '.' . $image->getClientOriginalExtension();
$request->image->move('postimage',$imagename);

$post->image=$imagename;
}


$post->save();
 return redirect()->back()->with('message','post added successfully');
}


public function show_post(){
    $post=post::all();
    return view ('admin.show_post',compact('post'));
}

public function delete_post($id){
    $post=post::find($id);
    $post->delete();
    return redirect()->back()->with('message','Post deleted successfully');

}
public function home_post(){
    return view ('admin.adminhome');
}

public function update_post($id){
    $post=post::find($id);
    return view ('admin.update_post',compact('post'));
}
public function updated_post(Request $request ,$id){
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
    return redirect()->back()->with('message','Your data has been updated successfully');

}
public function accept_post($id){
    $post=post::find($id);

$post->post_status='active';
    $post->save();
    return redirect()->back()->with('message','your post has been accept successfully');

}
public function reject_post($id){
    $post=post::find($id);
    $post->post_status='rejected';
    $post->save();
    return redirect()->back()->with('message','your post has been rejected');

}
}
