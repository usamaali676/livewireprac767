<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Sales;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
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
    public function create($id)
    {
        $sale = Sales::find($id);
        // $comment = $sale->comment();
        $srno = 1;
        return view('sale.add_comment', compact('sale',  'srno'));
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
            'text' => 'required',
        ]);
        Comment::create([
            'sales_id' => $request->sales_id,
            'text' => $request->text,
            'date' => Carbon::now()->format('Y-m-d')
        ]);
        Alert::success('Success',"Comment Added Successfully");
        return redirect()->route('sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
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
    public function edit($id)
    {
        $comment = Comment::find($id);
        $sale = Sales::where('id', $comment->sales_id)->first();
        return view('sale.edit_comment', compact('comment', 'sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $request->validate([
            'text' =>'required',
        ]);
        $comment->update([
            'text' => $request->text,
            'sales_id' => $request->sales_id,
            'date' => Carbon::now()->format('Y-m-d')
        ]);
        Alert::success('Success',"Comment Updated Successfully");
        return redirect()->route('sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Alert::success('Success',"Comment Deleted Successfully");
        return redirect()->route('sales');
    }
}
