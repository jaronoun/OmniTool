<div class="py-6 px-2 w-1/3">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900 dark:text-gray-100">
            <div class="flex justify-center">
                <h1 class="text-3xl font-medium">Tasks</h1>
            </div>
            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="overflow-x-auto">
                <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">Log</th>
                        <th scope="col" class="px-6 py-3 text-center">Name</th>
                        <th scope="col" class="px-6 py-3 text-center">Description</th>
                        <th scope="col" class="px-6 py-3 text-center">Periodicity</th>
                        <th scope="col" class="px-6 py-3 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <livewire:tasks.tasks :task="$task" :key="$task->id" />
                    @endforeach
                    </tbody>
                </table>
            </div>
            <p class="pt-2 text-xs text-slate-500 text-center">Last updated {{ $lastUpdated }}</p>
        </div>
    </div>
</div>
