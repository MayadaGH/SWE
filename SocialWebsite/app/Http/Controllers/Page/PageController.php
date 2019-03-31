<?php

namespace App\Http\Controllers\Page;

use App\Page;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function __construct(){
      $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pages = Page::where('user_id', auth()->id())->get();
        $pages = User::find(auth()->id())->pages;
        return view('/page/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/page/create_page');
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
            'page_name' => 'required|string|max:20|min:2|not_regex:/^\d+$/i',
            'description' => 'required|string|max:255|min:20|not_regex:/^\d+$/i',
        ]);
        $attr = request(['page_name', 'description']);
        $attr['user_id'] = auth()->id();
        if($page = Page::create($attr)){
          return redirect(route('page.show', $page->id))->with('success', 'Successfuly created page');
        }else{
          return redirect(route('page.create'))->with('error', 'Failed to create a new page.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('/page/show_page', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if($page->user_id == auth()->id()){
          return view('/page/edit_page', compact('page'));
        }else{
          abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'page_name' => 'required|string|max:20|min:2|not_regex:/^\d+$/i',
            'description' => 'required|string|max:255|min:20|not_regex:/^\d+$/i',
        ]);
        $page->update(request(['page_name', 'description']));

        return redirect('/pages/'.$page['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page->user_id == auth()->id()){
          $pagePost = $page->page_post;
          //$post = ;
          //return dd($post);
          //return dd($pagePost);
          $page->delete();
          return redirect(route('page.index'));
        }else{
          abort(403);
        }
    }

}
