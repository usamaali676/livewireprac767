<div
    id="{{ $record->getKey() }}"
    wire:click="recordClicked('{{ $record->getKey() }}', {{ @json_encode($record) }})"
    class="record bg-white dark:bg-gray-700 rounded-lg px-4 py-2 cursor-grab font-medium text-gray-600 dark:text-gray-200"
    @if($record->timestamps && now()->diffInSeconds($record->{$record::UPDATED_AT}) < 3)
        x-data
        x-init="
            $el.classList.add('animate-pulse-twice', 'bg-primary-100', 'dark:bg-primary-800')
            $el.classList.remove('bg-white', 'dark:bg-gray-700')
            setTimeout(() => {
                $el.classList.remove('bg-primary-100', 'dark:bg-primary-800')
                $el.classList.add('bg-white', 'dark:bg-gray-700')
            }, 3000)
        "
    @endif
>
    <h2> {{ $record->{static::$recordTitleAttribute} }}</h2>
    <p>Discription: {{ $record->description }}</p>
    <p>Client: {{ $record->client->sale->business_name }}</p>
    <p>Dead Line: {{ $record->due_date }}</p>
    @if (Auth::user()->role_id == 1)
    <div class="flex -space-x-2">
        @foreach ($record['users'] as $user)
        <div class="w-10 h-10 rounded-full  border-2 " style="background-color: #0c5bcb">
            <p class="text-center capitalize flex justify-center items-center h-full flex-wrap text-white " >{{substr($user->name, 0, 2)}}</p>
        </div>
        @endforeach
    </div>
    {{-- <p>Users</p>
    @foreach ($record['users'] as $user)
    <div class="inline-flex items-center space-x-4"><span style="border: 1px solid #0c5bcb; padding: 2px 10px;">{{$user->name}}</span></div>
    @endforeach --}}
    @endif


</div>

