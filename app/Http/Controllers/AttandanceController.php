<?php

namespace App\Http\Controllers;

use App\Models\Attandance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $attendances = Attandance::with('user')->orderBy('date', 'desc')->get();

        // return view('attendance.index', compact('attendances'));
        $query = Attandance::with('user');

        // Apply filters
        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('late_only')) {
            $query->where('is_late', true);
        }

        if ($request->has('early_only')) {
            $query->where('left_early', true);
        }

        $attendances = $query->orderBy('date', 'desc')->paginate(10);
        $users = User::all();

        return view('attendance.index', compact('attendances', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attandance $attandance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attandance $attandance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attandance $attandance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attandance $attandance)
    {
        //
    }
}
