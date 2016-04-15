<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use Validator, Session, Redirect;

class ArticlesController extends Controller {
  public function __construct() {
      $this->Middleware('auth');
      $this->Middleware('admin',['except'=>'index','show']);
      $this->Middleware('reader',['only'=>'show']);
    }
  function index(Request $request) {
     if($request->ajax()) {
       $articles = Article::where('title','like','%'.$request->keywords.'%')
       ->orWhere('content','like','%'.$request->keywords.'%')
       ->orderBy('id',$request->direction)
       ->paginate(3);
       $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';
       $view=(string) view('articles.list')->with('articles',$articles)->render();
       return response()->json(['view'=>$view,'direction'=>$direction,'status'=>'success']);
     } else {
       $articles = Article::paginate(3);
       return view('articles.index')
       ->with('articles', $articles);
       # code...
     }
  }

  public function create() {
    return view('articles.create');
  }

  public function store(Request $request) {
    $validate = Validator::make($request->all(), Article::valid());
    if ($validate->fails()) {
      return back()->withErrors($validate)->withInput();
    } else {
      Article::create($request->all());
      Session::flash('notice', 'Success add article');
      return Redirect::to('articles');
    }
  }

  public function show($id) {
    $article = Article::find($id);
    return view('articles.show')->with('article', $article);
  }

  public function edit($id) {
    $article = Article::find($id);
    return view('articles.edit')->with('article', $article);
  }

  public function update(Request $request, $id) {
    $validate = Validator::make($request->all(), Article::valid($id));
    if ($validate->fails()) {
      return back()->withErrors($validate)->withInput();
    } else {
      $article = Article::find($id);
      $article->update($request->all());
      Session::flash('notice', 'Success update article');
      return Redirect::to('articles');
    }
  }

  public function destroy($id) {
    $article = Article::find($id);
    if ($article->delete()) {
      Session::flash('notice', 'Article success delete');
      return Redirect::to('articles');
    } else {
      Session::flash('error', 'Article fails delete');
      return Redirect::to('articles');
    }
  }
}
