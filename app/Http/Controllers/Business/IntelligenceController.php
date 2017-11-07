<?php

namespace App\Http\Controllers\Business;

use App\Models\Intelligence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntelligenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page_level = "推送内容";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Intelligence::paginate(20);
        $page_title = "实时情报";
        $page_level = $this->page_level;

        return view('intelligences.index', compact('data', 'page_title', 'page_level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "新建情报";
        $page_level = $this->page_level;

        return view('intelligences.create', compact('page_title', 'page_level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * 判断是否上传新的首图
         */
//        $file = $request->file('upload_focus_img');
//        if ($file == null) {
//            $focusImgUrl = '/uploads/banner/20161218205430.png'; //默认图片
//        } else {
//            $focusImgUrl = SaveImage::banner($file);
//        }

        /**
         * 生成数据
         */
        $data = [
            'title' => $request['title'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'status' => '启用'
        ];

        try {
            Intelligence::create($data);

            return redirect()->route('intelligence.index')->withSuccess('新增情报成功');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
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
        $data = Intelligence::find($id);
        $page_title = "编辑情报";
        $page_level = $this->page_level;

        return view('intelligences.edit', compact('data', 'page_title', 'page_level'));
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
//        /**
//         * 判断是否上传新的首图
//         */
//        $file = $request->file('upload_focus_img');
//        if ($file == null) {
//            $focusImgUrl = $request['focus_img_url'];
//        } else {
//            $focusImgUrl = SaveImage::banner($file);
//        }

        /**
         * Update data.
         */
        $data = Intelligence::find($id);
        $data->title = $request['title'];
        $data->summary = $request['summary'];
//        $data->focus_img_url = $focusImgUrl;
        $data->content = $request['content'];

        try {
            $data->save();

            return redirect()->route('intelligence.index')->withSuccess('更新情报成功');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
