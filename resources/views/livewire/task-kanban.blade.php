<div class="flex space-x-4">
    @foreach (['Not Started', 'In progress', 'Complete', 'Deferred', 'Waiting For Someone'] as $status)
        <div class="w-1/5 bg-gray-100 p-4 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">{{ $status }}</h2>
            <div>
                @forelse ($tasks[$status] ?? [] as $task)
                    <div class="bg-white p-3 mb-3 rounded-lg shadow">
                        <h3 class="font-bold">{{ $task->name }}</h3>
                        <p>{{ $task->description }}</p>
                        <p><small>{{ $task->start_date }} - {{ $task->due_date }}</small></p>
                    </div>
                @empty
                    <p>No tasks available.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
