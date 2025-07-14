@props(['status'])

<div class="md:w-[24rem] flex-shrink-0 mb-5 md:min-h-full flex flex-col">
    @include(static::$headerView)

    <div
        data-status-id="{{ $status['id'] }}"
        class="flex flex-col flex-1 gap-2 p-3 bg-gray-200 dark:bg-gray-800 rounded-xl" style="  display: flex; flex: 1; gap: 0.5rem; padding: 0.75rem; background-color: #e5e7eb; border-radius: 0.75rem; "
    >
        @foreach($status['records'] as $record)
            @include(static::$recordView)
        @endforeach
    </div>
</div>
