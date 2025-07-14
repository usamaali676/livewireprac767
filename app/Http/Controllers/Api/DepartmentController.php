<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Traits\Jsonify;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    use Jsonify;
    public function index()
    {
        DB::beginTransaction();
        try{
            $data = (new DepartmentCollection(Department::all()));
            return self::jsonSuccess(message: 'Departments Retrived Successfully !', data: $data);
        }
        catch (Exception $exception){
            DB::rollBack();
            return self::jsonError($exception->getMessage());
        }

    }
    Public function show(Department $department)
    {
        DB::beginTransaction();
        try{
            $department = (new DepartmentResource($department));
            DB::commit();
            return self::jsonSuccess(message: 'Department Retrived successfully!', data: $department);
        }
        catch (Exception $exception){
            DB::rollback();

            return self::jsonError($exception->getMessage());
        }
    }
}
