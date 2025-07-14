<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Task;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;
use illuminate\Support\Collection;
use App\Models\TaskStatus;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;


class TaskBoard extends KanbanBoard
{
    protected static string $model = Task::class;
    protected static string $statusEnum = TaskStatus::class;

    protected static string $recordTitleAttribute = 'name';
    protected static string $recordStatusAttribute = 'status';

    protected static string $view = 'filament-kanban::kanban-board';

    protected static string $headerView = 'filament-kanban::kanban-header';

    protected static string $recordView = 'filament-kanban::kanban-record';

    protected static string $statusView = 'filament-kanban::kanban-status';

    protected static string $scriptsView = 'filament-kanban::kanban-scripts';

    protected function records(): Collection
    {
        $user = Auth::user();
        $oneWeekAgo = now()->subWeek();
        if($user->role_id == '1'){
            return Task::where('created_at', '>=', $oneWeekAgo)
            ->latest('created_at',)->get();
        }
        else{

            $user = Auth::user(); // Get the currently authenticated user
            $tasks = Task::with('users')
            ->whereHas('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            })
            ->where('created_at', '>=', $oneWeekAgo)
            ->get();

            // dd($tasks);
            return $tasks;
            // return Task::where('user_id', $user->id)->latest('created_at', )->get();
        }
    }

    protected function getEditModalFormSchema(null|int $recordId): array
    {
        $user = Auth::user();
        if($user->role_id == '1')
        {
        return [
            TextInput::make('name'),
            Textarea::make('description'),
            DatePicker::make('start_date'),
            DatePicker::make('due_date'),
        ];
        }
        else{
            return [
                TextInput::make('name'),
                Textarea::make('description'),
            ];
        }
    }
    protected function getEditModalRecordData($recordId, $data): array
    {
        return Task::find($recordId)->toArray();
    }

    protected function editRecord($recordId, array $data, array $state): void
{
    $user = Auth::user();
    if($user->role_id == '1')
    {
    Task::find($recordId)->update([
        'name' => $data['name'],
        'description' => $data['description'],
        'start_date' => $data['start_date'],
        'due_date' => $data['due_date'],

    ]);
    }
    else {
        Task::find($recordId)->update([
            'name' => $data['name'],
            'description' => $data['description'],

        ]);

        }
}
// protected function getHeaderActions(): array
// {
//     return [
//         CreateAction::make()
//         ->model(Task::class)
//         ->form([
//             TextInput::make('title'),
//             Textarea::make('description'),

//         ])
//     ];
// }

}
