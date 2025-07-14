<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Spatie\SlackAlerts\Facades\SlackAlert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $srno = 1;
        $user = Auth::user();
        // $status = Task::getEnumValues('status');
        if($user->role_id == 1){
            $task = Task::all();
            // $complete_task = $task->where('status', "Complete")->count();
            // dd($complete_task);
        }
        else{

            $task = $user->tasks()->with('client')->get();
        }
        return view('task.index', compact('task', 'srno'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $task = Task::find($id);
        if ($task) {
            $task->status = $status;
            $task->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Task not found.'], 404);
        }
    }
    public function board() {
        return view('task.board');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $client = Client::find($client)->first();
        // dd($client);
        $user = User::all();
        return view('task.create', compact('client', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'due_date' => 'nullable',
            'users' => 'required|array'
        ]);
        $task = Task::firstOrCreate([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
            'due_date' => Carbon::parse($request->due_date)->format('Y-m-d'),
            'status' => "Not Started"
        ]);
        $task->users()->sync($request->input('users', []));
        // $userNames = $task->users->pluck('name');
        Alert::success('Success', "Task Added Successfully");
        // SlackAlert::to('scrum')->message("New Task Added for {$userNames} Please Checkout Your TaskBoard");
        return redirect()->back();
        // return redirect()->route('clients.edit', $request->client_id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::with('users')->find($id);
        $all_user = User::all();
        return view('task.edit', compact('task','all_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'name' => 'required|unique:tasks,name,' .$id,
            'start_date' => 'required',
            'due_date' => 'nullable',
            'users' => 'required|array',
        ]);
        $task = Task::find($id);
        $task->update([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
            'due_date' => Carbon::parse($request->due_date)->format('Y-m-d'),
            'status' => $request->status,
        ]);
        $task->users()->sync($request->input('users', []));
        Alert::success('Success', "Task Updated Successfully");
        return redirect()->route('clients.edit', $request->client_id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        Alert::success('Success', "Task deleted successfully");
        return redirect()->back();
    }
}
