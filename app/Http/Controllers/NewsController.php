<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(News $news)
    {
        $news = News::orderBy('created_at', 'DESC')->get();

        return view('admin.news.index' ,compact('news') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $new)
    {
        return view('admin.news.create',compact('new'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $new = new News();
        $new->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/img';
            $uplaod = $file->move($path,$fileName);
            $new->image = $fileName;
        }


        $new->title1 = $request->title1;
        $new->textarea1 = $request->textarea1;
        $new->save();

        return redirect("/admin/news/$new->id/edit")->withSuccess('Новость была успешно добавлена!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show(News $news)
    {
        return view('admin.news.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $news = News::find($request->news_id);
        $news->fill($request->all());
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time().'.'.$extension;
            $path = public_path().'/news';
            $uplaod = $file->move($path,$fileName);
            $news->image = $fileName;
        }
    

        $news->title1 = $request->title1;
        $news->textarea1 = $request->textarea1;
        $news->update();

        return redirect('admin/news/'.$news->id.'/edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back()->withSuccess('Новость была успешно удалена!');
    }
}
