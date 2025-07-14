<?php

namespace App\Exports;

use App\Models\Sales;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalessExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = auth()->user();
        if($user->role_id == 1){
        return Sales::all();
        }
        else{
           $sale = Sales::where('agent_id', $user->id)->get();
           if(! empty($sale)){
            return $sale;
           }
        }
    }
}
