<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Notice;


class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderby('created_at','DESC')->get();
        return response()->json($notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'noticeTitle'=>'required',
            'noticeDescription'=>'required'
        ]);
       
        $notice = new Notice();
        $notice->noticeTitle = $request->noticeTitle;
        $notice->noticeDescription = $request->noticeDescription;
        $notice->isActive = $request->isActive;
        $notice->save();
        return response()->json($notice);
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
        $notice = Notice::findOrFail($id);
        return response()->json($notice);
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
        $this->validate($request,[
            'noticeTitle' =>'required',
            'noticeDescription' =>'required',
            
        ]);
        $notice = Notice::findOrFail($id);
        $notice->noticeTitle = $request->noticeTitle;
        $notice->noticeDescription = $request->noticeDescription;
        $notice->save();
        return response()->json($notice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Notice::findOrFail($id);
        $data->delete();
        return response()->json($data);
    }
}
