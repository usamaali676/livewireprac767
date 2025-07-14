<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum TaskStatus: string
{
    use IsKanbanStatus;

    case Not_Started = 'Not Started';
    case In_progress = 'In progress';
    case Complete = 'Complete';
    case Deferred =  'Deferred';
    case Waiting_For_Somenone =  'Waiting For Somenone';
}

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'name', 'description', 'start_date', 'due_date', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // public static function getEnumValues($column)
    // {
    //     // $type = DB::table('tasks')
    //     // ->select(DB::select(DB::raw(" WHERE Field = '{$column}'")))[0]->Type;
    //     $type = DB::select(DB::raw("SHOW COLUMNS FROM `tasks` WHERE Field = '{$column}'"))[0]->Type ?? null;

    //     preg_match('/^enum\((.*)\)$/', $type, $matches);
    //     $enum = [];
    //     foreach (explode(',', $matches[1]) as $value) {
    //         $v = trim($value, "'");
    //         $enum[] = $v;
    //     }
    //     return $enum;
    // }


}
