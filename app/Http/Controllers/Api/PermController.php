<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermCollection;
use App\Http\Resources\PermResource;
use Illuminate\Http\Request;
use App\Models\perm;
use App\Traits\Jsonify;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;

class PermController extends Controller
{
    use Jsonify;
    public function index()
    {
        DB::beginTransaction();
        try{
            $data = (new PermCollection(Perm::with(['roles'])->get()));
            return self::jsonSuccess(message: 'Permissions', data: $data);
        }
        catch(Exception $exception){
            DB::rollBack();
            return self::jsonError($exception->getMessage());
        }
    }
    public function show(perm $perm)
    {
        try {
            $perm = self::jsonSuccess(message: 'Permission retreived successfully.', data: new PermResource($perm->load('roles')));

            DB::commit();

            return self::jsonSuccess(message: 'Permission retreived successfully!', data: $perm);
        } catch (Exception $exception) {
            DB::rollback();

            return self::jsonError($exception->getMessage());
        }
    }
}
