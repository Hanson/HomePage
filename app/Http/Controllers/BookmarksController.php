<?php

namespace App\Http\Controllers;

use App\Bookmarks;
use App\Folder;
use Illuminate\Http\Request;

use App\Http\Requests;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
            'folder_id' => 'required|integer',
        ]);

        $folderId = $request->get('folder_id');

        $folder = Folder::find($folderId);

        if($folder){
            Bookmarks::create([
                'title' => $request->get('title'),
                'url' => $request->get('url'),
                'folder_id' => $folder->id
            ]);
            return redirect('setting');
        }else{
            return redirect('setting')->withErrors('文件夹不存在')->withInput();
        }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Bookmarks::destroy($id)){
            return response()->json(['code' => 200, 'msg' => 'success']);
        }else{
            return response()->json(['code' => 500, 'msg' => 'fail']);
        }
    }
}
