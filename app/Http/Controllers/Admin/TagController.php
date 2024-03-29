<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.tag');
    }
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.show',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.tag.tag');
    }


    public function createMore()
    {
        return view('admin.tag.tag');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag;
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        return redirect(route('tag.index'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
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
        $tag = new Tag;
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        return redirect(route('tag.index'));
    }

    // public function update(Tag $tag)
    // {
    //     request()->validate([
    //         'name' => 'required',
    //         'slug' => 'required',
    //     ]);
    //     $tag->update([
    //         'name' => request('name'),
    //         'slug' => request('slug'),
    //     ]);
       
    //     return redirect(route('tag.index'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->delete();
        return redirect()->back();
    }
}
