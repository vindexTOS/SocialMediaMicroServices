<?php


namespace App\Services;

use App\Exceptions\CustomeException;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Providers\PostProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;





class PostService extends PostProvider
{

    public function index(Request $request)
    {


        $posts =  Post::all();

        return response()->json($posts);
    }


    public function store(Request $request)
    {
        $val = $this->Valiator($request);

        if ($val->fails()) {
            throw new ValidationException($val);
        };
        $data = $val->validated();

        Post::create([
            "title" => $data['title'],
            "text" => $data['text'],
            "img_id" => $request['img_id'],
            "user_id" => $data['user_id'],
        ]);

        return response()->json(['msg' => 'Your post has been maded'], 201);
    }

    public function show(string $id)
    {

        $post = Post::where('id', $id)->first();
        if (!$post) {
            throw new CustomeException("Post could not be found", 404);
        }
        return response()->json(["post" => $post]);
    }


    public function destroy(string $id)
    {

        $post = Post::find($id);
    Log::debug($post);
        if ($post) {
            $post->delete();
        } else {
            throw new CustomeException("Post could not be found", 404);
        }

        return response()->json(['msg' => "post has been deleted"]);
    }





    public function update(Request $request) {}
  
}
