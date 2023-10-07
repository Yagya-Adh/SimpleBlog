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


    public function show_post()
    {
        $post = Post::all();

        return view('admin.show_post', compact('post'));
    }


    public function delete_post($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }


    public function edit_page($id)
    {

        $post = Post::find($id);

        return view('admin.edit_page', compact('post'));
    }


    public function update_post(Request $request, $id)
    {

        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;

        $image = $request->image;
        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Post updated successfully');
    }
}
