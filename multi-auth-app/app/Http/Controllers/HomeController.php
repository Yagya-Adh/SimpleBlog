<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Alert;


class HomeController extends Controller
{


    public function index()
    {

        if (Auth::id()) {


            //Only to display active posts into home page
            $post = Post::where('post_status', '=', 'active')->get();

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
        //Only to display active posts into home page
        $post = Post::where('post_status', '=', 'active')->get();

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

        // sweet-alert 



        Alert::success('Congrats', 'You have added  the data  Successfully');



        return redirect()->back();
    }



    public function my_post()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = Post::where('user_id', '=', $userid)->get();

        return view('home.my_post', compact('data'));
    }


    public function my_post_del($id)
    {

        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post deleted Successfully');
    }


    public function post_update_page($id)
    {
        $data = Post::find($id);

        return view('home.post_page', compact('data'));
    }



    public function update_post_data(Request $request, $id)
    {

        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;

        //image
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }


        $data->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
}
