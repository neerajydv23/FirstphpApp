<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function update(Post $post, Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title']= strip_tags($incomingFields['title']);
        $incomingFields['body']= strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect("/post/{$post->id}")->with('success','Post updated successfully!');
    }

    public function showEditForm(Post $post)
    {
        return view('edit-post',['post'=>$post]);
    }
     
    public function delete(Post $post){
        
        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success','Post deleted successfully!');
    }

    public function viewSinglePost(Post $post)
    {
        return view('single-post',['post'=>$post]);
    }

    public function storeNewPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title']= strip_tags($incomingFields['title']);
        $incomingFields['body']= strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id(); 

        $newPost =  Post::create($incomingFields);
        
        return redirect("/post/{$newPost->id}")->with('success','Post created successfully!');

    }
    public function showCreateForm()
    {
        return view('create-post');
    }
}
