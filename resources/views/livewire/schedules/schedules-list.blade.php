<div class="pt-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center px-4">
                    <h2 class="text-2xl font-bold">Schedules</h2>
                </div>
                <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="pt-3 space-y-2">
                    @foreach($schedules as $schedule)
                        <livewire:schedules.schedules :$schedule :key="$schedule->id" />
                    @endforeach
                        <livewire:schedules.schedules-form />
                </div>
            </div>
        </div>
    </div>
</div>

