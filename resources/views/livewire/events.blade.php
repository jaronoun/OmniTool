<div class="py-6 px-2 w-1/3">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900 dark:text-gray-100">
            <div class="flex justify-between items-center">
                <h2 class="text-1xl font-semibold">{{ $currentDate['day'] }} {{ $currentDate['dayName'] }}, {{ $currentDate['month'] }}</h2>
                <h1 class="text-3xl font-medium">Events</h1>
                <h2 class="text-1xl font-semibold">{{ $currentDate['year'] }} | WEEK {{ $currentDate['week'] }} </h2>
            </div>
            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
            @foreach($events as $event)
            <div class="flex items-center">
                <div class="flex items-center pr-4 bg-gray-900 p-2 rounded-lg text-center">
                    <p class="text-4xl font-bold text-white pr-3">
                        {{ $event->day }}
                    </p>
                    <div>
                        <p class="text-sm text-white">{{ $event->dayName }}</p>
                        <p class="text-sm text-white">{{ $event->month }}, {{ $event->year }}</p>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="uppercase tracking-wide text-sm text-white-500 font-semibold">{{ $event->name }} | {{ $event->start_time }} - {{ $event->end_time }}</div>
                    <p class="mt-0 text-gray-500">{{ $event->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


