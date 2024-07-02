<div>
    @foreach($events as $event)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 dark:hover:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center">
                            <div class="pr-4 bg-blue-500 p-2 rounded-lg text-center">
                                <p class="text-4xl font-bold text-white">
                                    {{ $event->day }}
                                </p>
                                <p class="text-sm text-white">{{ $event->month }}, {{ $event->year }}</p>
                            </div>
                            <div class="ml-4">
                                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $event->name }} | {{ $event->start_time }} - {{ $event->end_time }}</div>
                                <p class="mt-0 text-gray-500">{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
