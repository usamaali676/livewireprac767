<?php

namespace App\Imports;

use App\Models\Sales;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\User;

class SalesImport implements ToCollection
{
    private $setStartRow = 2;
    /**
     * @param Collection $collection
     */

     public function startRow(): int
     {
         return $this->setStartRow;
     }
    public function collection(Collection $rows)
    {
        // dd($rows[0]);
        $counter = 0;
        $closer = User::where('id', 1)->first();
        // dd($closer);


        foreach ($rows as $key=>$row ) {
            if($key > 0){
                $sale = Sales::firstOrCreate([
                    'business_name' => $row[2]
                ], [
                    'agent_id' => auth()->user()->id,
                    'closer_id' => $closer->id,
                    // 'agent_name' => auth()->user()->name,
                    // 'closer_name' => $row[1],
                    'business_name_adv' => $row[3],
                    'business_number' => $row[4],
                    'business_number_adv' => $row[5],
                    'cellphone' => $row[6],
                    'email' => $row[7],
                    'website' => $row[8],
                    'additional_links' => $row[9],
                    'comments' => $row[10],
                    'area' => $row[11],
                    'date' => \Carbon\Carbon::parse($row[12]),
                    'services' => $row[13],
                    'keywords' => $row[14],
                    'landing_pages' => $row[15],

                ]);

                if ($sale->wasRecentlyCreated) {
                    $counter++;
                }
            // }
            // $counter ++;

        }
    }

        Session::put('counter', $counter);
    }

}
