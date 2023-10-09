<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {

        if (Auth::id()) {

            $post = Post::all();


            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {

                return view('home.homepage', compact('post'));
            } elseif ($usertype == 'admin') {


                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }


    public function homepage()
    {
        $post = Post::all();

        return view('home.homepage', compact('post'));
    }



    public function post_details($id)
    {
        $post = Post::find($id);

        return view('home.post_details', compact('post'));
    }


    public function  create_post()
    {
        return view('home.create_post');
    }


    public function user_post(Request $request)
    {
        //logged user
        $user = Auth()->user();

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        //image
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        //logged in user
        $post->user_id = $user->id;
        $post->usertype = $user->usertype;
        $post->name = $user->name;

        $post->post_status = 'pending';

        $post->save();
        return redirect()->back();
    }
}
