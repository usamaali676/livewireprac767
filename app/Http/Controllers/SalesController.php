<?php

namespace App\Http\Controllers;

use App\Imports\SalesImport;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Comment;
use Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Exports\SalessExport;
// use Maatwebsite\Excel\Excel;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $sales = Sales::orderBy('id', 'DESC')->get();
        return view('sheet', compact('sales', 'srno'));
    }
    public function closeindex()
    {
        $srno = 1;
        $sales = Sales::orderBy('id', 'DESC')->get();
        return view('closersheet', compact('sales', 'srno'));
    }
    public function api()
    {
        $srno = 1;
        $sales = Sales::all();
        return  response()->json(['sales'=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $closer = User::where('is_closer', 1)->get();
        $agent = User::where('is_agent', 1)->get();
        return view('sale.add', compact('closer', 'agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        Excel::import(new SalesImport, $request->file('file')->store('temp'));
        Alert::success('Success', "File Imported Successfully ( " . Session::get('counter') . ' ) new records created.');
        return redirect()->back();
    }
    public function export()
    {
        return Excel::download(new SalessExport, 'Sales.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sales::find($id);
        // $comment = $sale->comment;
        // dd($comment);
        return view('detail', compact('sale'));
    }

    public function delete($id)
    {
        $sale = Sales::find($id);
        return view('sale.delete', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sales::find($id);
        $closer = User::where('is_closer', 1)->get();
        $agent = User::where('is_agent', 1)->get();
        // dd($agent);
        $selected_agent = User::where('id', $sale->agent_id)->first();
        $selected_closer = User::where('id', $sale->closer_id)->first();
        return view('sale.edit', compact('sale','selected_agent','selected_closer', 'closer', 'agent'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'business_name' => 'unique:sales,business_name',
            'email' => 'email',
        ]);
        Sales::create([
            'business_name' => $request->business_name,
            'business_name_adv' => $request->business_name_adv,
            'business_number' => $request->business_number,
            'business_number_adv' => $request->business_number_adv,
            'cellphone' => $request->cell_phone,
            'email' => $request->email,
            'website' => $request->website,
            'payment_methods' => $request->payment_methods,
            'agent_id' => auth()->user()->id,
            'closer_id' => $request->closer_id,
            'additional_links' => $request->add_links,
            'comments' => $request->comments,
            'area' => $request->areas,
            'services' => $request->services,
            'keywords' => $request->Keywords,
            'landing_pages' => $request->landing_pages,
            'status' => $request->status ? 1 : 0 ?? 0,
            'date' =>  Carbon::now()->format('Y-m-d')
        ]);
        Alert::success('Success', "Client Added Successfully");
        return redirect()->route('sales');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $sale = Sales::find($id);
        $request->validate([
            'business_name' => 'required|unique:sales,business_name,' . $id,
            'business_number' => 'required',
            // 'agent_name' => 'required',
            'email' => 'email'
        ]);
        $sale->update([
            'business_name' => $request->business_name,
            'business_name_adv' => $request->business_name_adv,
            'business_number' => $request->business_number,
            'business_number_adv' => $request->business_number_adv,
            'cellphone' => $request->cell_phone,
            'email' => $request->email,
            'website' => $request->website,
            'payment_methods' => $request->payment_methods,
            'agent_id' => $request->agent_id,
            'closer_id' => $request->closer_id,
            'additional_links' => $request->add_links,
            'comments' => $request->comments,
            'area' => $request->areas,
            'services' => $request->services,
            'keywords' => $request->Keywords,
            'landing_pages' => $request->landing_pages,
            'status' => $request->status ? 1 : 0 ?? 0,
        ]);
        Alert::success('Success', "Client Updated Successfully");
        return redirect()->route('sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sales::where('id', $id)->delete();
        Alert::success('Success', "Client Deleted Successfully");
        return redirect()->route('sales');

    }
}
