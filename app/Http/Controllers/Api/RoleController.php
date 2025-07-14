<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Traits\Jsonify;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    use Jsonify;
    public function index()
    {
        DB::beginTransaction();
        try{
            $data = (new RoleCollection(Role::all()));
            return self::jsonSuccess(message: 'Roles Retrived Successfully !', data: $data);
        }
        catch (Exception $exception){
            DB::rollBack();
            return self::jsonError($exception->getMessage());
        }

    }
    Public function show(Role $role)
    {
        DB::beginTransaction();
        try{
            $role = (new RoleResource($role));
            DB::commit();
            return self::jsonSuccess(message: 'Role Retrived successfully!', data: $role);
        }
        catch (Exception $exception){
            DB::rollback();

            return self::jsonError($exception->getMessage());
        }
    }
}
