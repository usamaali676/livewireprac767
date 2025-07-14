<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use App\Traits\Jsonify;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    use Jsonify;
    public function index()
    {
        DB::beginTransaction();
        try{
            $data = (new VehicleCollection(Vehicle::all()));
            return self::jsonSuccess(message: 'Vehicles Retrived Successfully !', data: $data);
        }
        catch (Exception $exception){
            DB::rollBack();
            return self::jsonError($exception->getMessage());
        }

    }
    Public function show(Vehicle $vehicle)
    {
        DB::beginTransaction();
        try{
            $vehicle = (new VehicleResource($vehicle));
            DB::commit();
            return self::jsonSuccess(message: 'Vehicle Retrived successfully!', data: $vehicle);
        }
        catch (Exception $exception){
            DB::rollback();

            return self::jsonError($exception->getMessage());
        }
    }
}
