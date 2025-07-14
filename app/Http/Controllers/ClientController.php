<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Task;
use Spatie\SlackAlerts\Facades\SlackAlert;
use RealRashid\SweetAlert\Facades\Alert;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $client = Client::with('services', 'users')->get();
        return view('client.index' , compact('client', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $existclient = Client::where('sales_id', $id)->first();
        // dd($existclient);
        if(isset($existclient)) {
            Alert::error('Error', "Client Already Exists");
            return redirect()->back();
        }
        $sale = Sales::find($id);
        $services = Service::all();
        $user = User::all();
        return view('client.create', compact('sale', 'services', 'user') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());/
        $request->validate([
            'reporting_date' => 'required',
            'start_date' => 'required',

        ]);

        $reportingDate = Carbon::parse($request->reporting_date)->format('Y-m-d');
        if(isset($request->landingpage_date)){
        $landingpageDate = Carbon::parse($request->landingpage_date)->format('Y-m-d');
        }
        else
        {
            $landingpageDate = null;
        }

        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');
        // dd($startDate, $endDate);
        $client = Client::create([
            'sales_id' => $request->sale_id,
            'reporting_date' => $reportingDate,
            'start_date' => $startDate,
            'last_date' => $endDate,
            'landingpage_date' => $landingpageDate
        ]);
        $client->services()->sync($request->input('services', []));
        $client->users()->sync($request->input('users', []));
        Alert::success('Success', "Client Successfully Added");
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Client::with('services', 'users')->find($id);
        $sale = Sales::find($client->sales_id);
        // dd($sale);
        $reportdate = Carbon::parse($client->reporting_date);
        $reportday = $reportdate->format('d');
        // dd($reportday);
        // Carbon::parse()
        $currentmonth = Carbon::now()->format('F');
        // SlackAlert::message("Reporting Date of {$sale->business_name} is {$reportday} {$currentmonth} ! ");
        return view('client.show', compact('client','sale', ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::with('services', 'users', 'tasks')->find($id);
        $sale = Sales::find($client->sales_id);
        $all_user = User::all();
        $all_services = Service::all();
        $srno = 1;

        return view('client.edit', compact('client','sale','all_user','all_services', 'srno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'reporting_date' => 'required',
            'start_date' => 'required',
        ]);

        $reportingDate = Carbon::parse($request->reporting_date)->format('Y-m-d');
        if(isset($request->landingpage_date)){
        $landingpageDate = Carbon::parse($request->landingpage_date)->format('Y-m-d');
        }

        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');
        $client = client::find($id);
        // dd($client);
        $client->update([
            'sales_id' => $request->sale_id,
            'reporting_date' => $reportingDate,
            'start_date' => $startDate,
            'last_date' => $endDate,
            'landingpage_date' => $landingpageDate
        ]);
        $client->services()->sync($request->input('services', []));
        $client->users()->sync($request->input('users', []));
        Alert::success('Success', "Client Successfully Updated");
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client = Client::with('services', 'users')->find($id);
        $sale = Sales::find($client->sales_id);
        return view('client.delete', compact('client','sale', ));
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        if(isset($client->tasks)){
          foreach($client->tasks as $task){
            $task->delete();
          }
        }
        $client->delete();
        Alert::success('Success', "Client deleted successfully");
        return redirect()->route('clients.index');
    }
}
