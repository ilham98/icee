<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
    	$news = News::orderBy('updated_at', 'desc')->paginate(20);
    	$current = $news->currentPage();
    	return view('admin.pages.news', compact('news' , 'current'));
    }

    public function store(Request $request) {
    	$request->validate([
    		'title' => 'required',
    		'body' => 'required'
    	]);
    	$body = $request->all();
    	$news = News::create($body);
    	return redirect('news')->with('insert-success', 'success');
    }

    public function edit($id){
        $news = News::find($id);
        return view('admin.pages.news-edit', compact('news'));
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $news = News::find($id);
        $body = $request->all();
        $news = $news->update($body);
        return redirect()->back()->with('edit-success', 'success');
    }

    public function destroy($id) {
        $news = News::find($id);
        $news->delete();
        return redirect('news')->with('delete-success', 'success');
    }

    public function publicIndex() {
        $news = News::orderBy('news_id', 'desc')->paginate(8);
        return view('pages.news', compact('news'));
    }

    public function publicShow($id) {
        $news = News::find($id);
        return view('pages.news-single', compact('news'));
    }
}
