<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function post_page()
    {

        return view('admin.post_page');
    }


    public function add_post(Request $request)
    {
        //logged user
        $user = Auth()->user();

        $post = new Post();
        //user
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->usertype = $user->usertype;


        $post->title = $request->title;
        $post->description = $request->description;

        $post->post_status = 'active';


        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }


        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
    }
}
