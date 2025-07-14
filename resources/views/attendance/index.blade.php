@extends('layouts.app')

@section('content')
<div class="container">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Attendance</h2>
    </div>

    <!-- Filters -->
    <form method="GET" class="intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-3">
            <label>Date From</label>
            <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label>Date To</label>
            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label>User</label>
            <select name="user_id" class="form-control">
                <option value="">-- All Users --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-12 sm:col-span-3 flex items-end">
            <div class="form-check mr-3">
                <input class="form-check-input" type="checkbox" name="late_only" {{ request()->has('late_only') ? 'checked' : '' }}>
                <label class="form-check-label">Late Only</label>
            </div>
            <div class="form-check mr-3">
                <input class="form-check-input" type="checkbox" name="early_only" {{ request()->has('early_only') ? 'checked' : '' }}>
                <label class="form-check-label">Early Leave</label>
            </div>
            <button class="btn btn-primary ml-auto" type="submit">Filter</button>
        </div>
    </form>

    <!-- Export/Print Buttons -->
    {{-- <div class="intro-y flex justify-end mt-5">
        <a href="{{ route('attendances.export.excel', request()->query()) }}" class="btn btn-success mr-2">Export to Excel</a>
        <a href="{{ route('attendances.export.pdf', request()->query()) }}" target="_blank" class="btn btn-secondary">Print / PDF</a>
    </div> --}}

    <!-- Attendance Table -->
    <div class="intro-y box mt-5">
        <div class="p-5" id="striped-rows-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-report">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Date</th>
                                <th>Working Hour</th>
                                <th>Is Late</th>
                                <th>Early Leave</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->id }}</td>
                                <td>{{ $attendance->user->name ?? 'N/A' }}</td>
                                <td>{{ $attendance->check_in ? \Carbon\Carbon::parse($attendance->check_in)->format('h:i A') : 'N/A' }}</td>
                                <td>{{ $attendance->check_out ? \Carbon\Carbon::parse($attendance->check_out)->format('h:i A') : 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                                <td>
                                    @if($attendance->check_in && $attendance->check_out)
                                    {{ \Carbon\Carbon::parse($attendance->check_out)->diffInHours(\Carbon\Carbon::parse($attendance->check_in)) }} hrs
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if($attendance->is_late)
                                    <span class="btn btn-danger badge bg-danger">Yes</span>
                                    @else
                                    <span class="btn btn-success badge bg-success" style="color: #fff">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if($attendance->left_early)
                                    <span class="btn btn-danger badge bg-danger text-dark">Yes</span>
                                    @else
                                    <span class="btn btn-success badge bg-success" style="color: #fff">No</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No attendance records found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-5">
                    {{ $attendances->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
