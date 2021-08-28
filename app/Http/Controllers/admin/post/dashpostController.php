<?php

namespace App\Http\Controllers\admin\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Post;

class dashpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       return view('dashboard.bposts.posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'ایجاد پست';
        $page_description = 'پست خود را ایجاد کنید!';
        return view('dashboard.bposts.add-post',compact('page_title','page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page_title = 'ثبت پست';
        $page_description = 'عملیات ثبت پست';
        $post = Post::create($request->all());
        if($post){
            $message= "done";
            return view('dashboard.bposts.message-post',compact('page_title','page_description','message')); 
        }else{
            $message = "error";
            return view('dashboard.bposts.message-post',compact('page_title','page_description','message')); 
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
        //
    }

    /**
     * GET IMAGES FROM SUMMERNOTE AND SAVE THEM,
     *
     * 
     * 
     */

    public function getReportImg(Request $request){
        $data = array();
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file');// Error response
        }else{
            if($request->file('file')) {

                $file = $request->file('file');
                $filename = gnerate_img_file_name();

                // File extension
                $extension = $file->getClientOriginalExtension();
                $filename = $filename.".".$extension;
                // File upload location
                $location = 'files';

                // Upload file
                $file->move($location,$filename);

                // File path
                $filepath = url('files/'.$filename);

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
            }else{
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.';
            }
        }

        return response()->json($data);

    }
}
