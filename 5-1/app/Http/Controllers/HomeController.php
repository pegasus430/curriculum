<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Posts::all();
        return view('home', ['articles' => $articles]);
    }

    public function create(Request $request)
    {
        $posts = new Posts;
        $form = $request->all();

        $posts->body = $form['body'];
        $posts->user_id = Auth::id();
        $posts->save();

        return 'success';
    }

    public function delete(Request $request)
    {
        $articles = Posts::find($request->id);
        $articles->delete();
        return 'success';
    }
}
