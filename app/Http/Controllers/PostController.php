<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/posts",
     *     summary="Get Post List",
     *     @OA\Response(response="200", description="Success"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * @OA\Post(
     *     path="/api/create-post",
     *     summary="Create a new post",
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="Post's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Post's description",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\Response(response="201", description="Post created successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */

    public function create(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }


    /**
     * @OA\GET(
     *     path="/api/posts/{id}",
     *     tags={"Posts"},
     *     summary="Show Post Details",
     *     description="Show Post Details",
     *     operationId="show",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(name="id", description="id, eg; 1", required=true, in="path", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Show Post Details"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     * )
     */

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    /**
     * @OA\POST(
     *     path="/api/posts/{id}/update",
     *     tags={"Posts"},
     *     summary="Update Post",
     *     description="Update Post",
     *     @OA\Parameter(name="id", description="id, eg; 1", required=true, in="path", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="title", type="string", example="Post 1"),
     *              @OA\Property(property="description", type="string", example="Description"),
     *          ),
     *      ),
     *     operationId="update",
     *     security={{"bearer":{}}},
     *     @OA\Response(response=200, description="Update Post"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     * )
     */

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }


     /**
     * @OA\POST(
     *     path="/api/posts/{id}/delete",
     *     tags={"Posts"},
     *     summary="Delete Post",
     *     description="Delete Post",
     *     operationId="destroy",
     *     security={{"bearer":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="id, eg; 1",
     *          required=true, in="path",
     *          @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Delete Post"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json('Post deleted successfully');
    }
}
