<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Comment::paginate();
        $key = request('keyword');
        $data_0 = Feedback::select('feedback.id','feedback.date','feedback.status','customer.name as customer')
                    ->leftJoin('customer', 'customer.id', '=', 'feedback.customer_id')
                    ->groupBy('feedback.id','feedback.date','feedback.status','customer.name')
                    ->get();
        if ($key) {
            $data = Comment::where('name','LIKE','%'.$key.'%')->paginate();
        }
        return view('admin.comment.index', compact('data','data_0'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // lấy các trường khác trên form
        $formData = $request->all('name');
        // thêm image vào magnr
        
        if (Comment::create($formData)) {
            return redirect()->route('comment.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('comment.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {   
        //dd ($product);
        return view('admin.comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        // lấy các trường khác trên form
        $formData = $request->all('name');
        
        if ($comment->update($formData)) {
            return redirect()->route('comment.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('comment.index')->with('error', 'Có lỗi, vui lòng thử lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index')->with('success', 'Đã xóa thành công');
    }
}
