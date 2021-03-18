<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('public/images');
        $post = new Post;

        $post->nom = $request->nom;
        $post->prenom = $request->prenom;
        $post->age = $request->age;
        $post->image = $path;

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:2'
        ]);

        $search_text = $request->input('query');
        $posts = DB::table('posts')
            ->where('nom', 'LIKE', '%' . $search_text . '%')
            ->orWhere('prenom', 'like', '%' . $search_text . '%')
            ->orWhere('age', 'like', '%' . $search_text . '%')
            ->paginate(5);
        return view('posts.index', ['posts' => $posts]);
        //return view('posts.index',compact('posts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->nom = $request->nom;
        $post->prenom = $request->prenom;
        $post->age = $request->age;
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Suppresion avec succès');
    }
}
