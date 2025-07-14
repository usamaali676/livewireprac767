<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\Jsonify;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use Jsonify;
   public function index()
   {
    DB::beginTransaction();
    try {
        $data = (new UserCollection(User::with(['roles','department','designation','vehicle'])->get()));
        return self::jsonSuccess(message: 'Users retreived successfully!', data: $data);
    }
    catch (Exception $exception) {
        DB::rollBack();
        return self::jsonError($exception->getMessage());
    }
   }
   public function show(User $user)
   {
    try {
        $user = self::jsonSuccess(message: 'Users retreived successfully.', data: new UserResource($user->load('roles','department','designation','vehicle')));

        DB::commit();

        return self::jsonSuccess(message: 'User retreived successfully!', data: $user);
    } catch (Exception $exception) {
        DB::rollback();

        return self::jsonError($exception->getMessage());
    }
   }
}
