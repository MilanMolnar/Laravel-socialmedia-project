<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Validation\UnauthorizedException;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);



        return view('posts.index', compact('posts')
        );
    }

    public function like($id){
        dd($id);
    }

    public function delete($post){
        $delete_post = Post::find($post);
        if(auth()->user()->id == $delete_post->user->id){
            $delete_post->delete();
        }else{
            abort(403);
        }
        if (auth()->user()->posts->count() > 0)
            return redirect()->back()->with("message", "successfully deleted post with an id of: {$delete_post->id}");
        return redirect('/profile/' . auth()->user()->id);
    }

    public function manage(){
        return view('posts.manage');
    }
    public function edit($post){
        $actualPost = Post::find($post);
        return view('posts.edit', compact('actualPost'));
    }

    public function update($post){
        $actualPost = Post::find($post);
        $data = request()->validate([
            'caption'=> ['min:3','nullable'],
            'desc' => ['min:3','nullable'],
        ]);
        if ($data['caption'] == null){
            $data['caption'] = $actualPost->caption;
        }
        if ($data['desc'] == null){
            $data['desc'] = $actualPost->desc;
        }
        $actualPost->update($data);
        return redirect("/p/" . $actualPost->id);
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'desc'=> 'required',
            'likes'=> '',
            'image' => ['required','image'],
        ]);

        $imagePath = request('image')->store('uploads','public');
        $thumbnailPath = request('image')->store('thumbnail','public');

        $thumbnail = Image::make(public_path("storage/{$thumbnailPath}"))->fit(600,600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $thumbnail->save();

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();


        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'desc'=> $data['desc'],
            'likes' => 0,
            'image' => $imagePath,
            'thumbnail' => $thumbnailPath
        ]);
        return redirect('/profile/' . auth()->user()->id);
    }


    public function cctv(Post $post){
        $posts = Post::latest()->paginate(5);
        return view('posts.cctv', compact('posts'));
    }

    public function show(\App\Post $post){
        $likers = (auth()->user()) ? auth()->user()->liking->contains($post->id) : false;
        return view('posts.show', compact('post','likers' ));
    }


}
