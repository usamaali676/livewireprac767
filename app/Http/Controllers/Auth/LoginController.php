<?php

namespace App\Http\Controllers\Auth;

use App\Events\Login;
use App\Http\Controllers\Controller;
use App\Models\Attandance;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public $user;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd("those");
        $this->middleware('guest')->except('logout');
        $user = auth()->user();
        event(new Login($user));
    }

    protected function authenticated(Request $request, $user)
    {
        $today = Carbon::today();
        $standardStart = Carbon::createFromTime(14, 0, 0);
        $now = now();

        $existing = Attandance::where('user_id', $user->id)
            ->where('date', $today)
            ->first();

        if (!$existing) {
            Attandance::create([
                'user_id' => $user->id,
                'date' => $today,
                'check_in' => $now,
                'is_late' => $now->gt($standardStart),
            ]);
        }
    }

    public function logout(Request $request)
{
    $user = auth()->user();
    // dd($user);
    $today = Carbon::today();
    $standardEnd = Carbon::createFromTime(22, 0, 0);
    $now = now();

    $attendance = Attandance::where('user_id', $user->id)
        ->where('date', $today)
        ->first();


    if ($attendance && !$attendance->check_out) {
        $attendance->update([
            'check_out' => $now,
            'left_early' => $now->lt($standardEnd),
        ]);
    }
    // dd($attendance );

    $this->guard()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}


}
