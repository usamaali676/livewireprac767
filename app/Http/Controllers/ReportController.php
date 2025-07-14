<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $srno = 1;
        $client = Client::find($id);
        $reports = Report::where('client_id', $id)->orderBy('created_at', 'desc')->get();
        return view('reports.index', compact('client','reports', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $client = Client::find($id);
        return view('reports.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
            'report_file' => 'required',
            'month' => 'required',
        ]);
            Report::create([
                'client_id' => $request->client_id,
                'title' => $request->title,
                'type' => $request->type,
                'description' => $request->description,
                'file_path' => GlobalHelper::fts_upload_report($request->report_file, $request->month),
                'month' => $request->month,
        ]);
        Alert::success('Success', "Report Uploaded Successfully");
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $report = Report::find($id);
        $client = Client::where('id', $report->client_id)->first();

        return view('reports.edit', compact('report', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
            'month' => 'required',
        ]);
        $report = Report::find($id);
        if(isset($request->report_file))
        {
            GlobalHelper::delete_report($report->file_path, $report->month);

        $report->update([
            'title' => $request->title,
            'type' => $request->type,
            'client_id' => $request->client_id,
            'description' => $request->description,
            'file_path' => GlobalHelper::fts_upload_report($request->report_file, $request->month),
            'month' => $request->month,
            'status' => $request->status,
            'reject_note' => $request->reject_note,
        ]);
    }
    else
    {
        $report->update([
            'title' => $request->title,
            'type' => $request->type,
            'client_id' => $request->client_id,
            'description' => $request->description,
            'month' => $request->month,
            'status' => $request->status,
            'reject_note' => $request->reject_note,
        ]);
    }
        Alert::success('Success', "Report Updated Successfully");
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        GlobalHelper::delete_report($report->file_path, $report->month);
        $report->delete();
        Alert::success('Success',"Report deleted successfully");
        return redirect()->route('clients.index');
    }
}
