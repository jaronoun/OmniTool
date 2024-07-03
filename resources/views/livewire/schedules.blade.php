<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                <div class="px-4">
                    <h2 class="text-2xl font-bold">Schedules</h2>
                </div>
                <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                <ul>
                    @foreach($schedules as $schedule)
                        <li class="px-2 py-1">
                            <a class="flex items-center px-2 py-1 hover:bg-gray-200 dark:hover:bg-gray-900 sm:rounded-lg @if($selectedSchedule == $schedule->id) light:bg-gray-200 dark:bg-gray-900 @endif" wire:click.prevent="getTraining({{$schedule->id}})">
                                {{ $schedule->name }} : {{ $schedule->description }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                <div class="px-4">
                    <h2 class="text-2xl font-bold">Training</h2>
                </div>
                <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                <ul>
                    <li class="px-2 py-1">
                        @foreach($trainings as $training)
                            <a class="flex items-center px-2 py-1 dark:hover:bg-gray-900 sm:rounded-lg @if($selectedTraining == $training->id) light:bg-gray-200 dark:bg-gray-900 @endif" wire:click.prevent="getUsex({{$training->id}})">
                                {{ $training->name }} : {{ $training->description }}
                            </a>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                <div class="px-4">
                    <h2 class="text-2xl font-bold">User Exercises</h2>
                </div>
                <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                <ul>
                    <li class="px-2">
                        @foreach($userExercises as $usex)
                            <div class="mx-auto pt-3">
                                <details class="light:bg-gray-200 dark:bg-gray-900 open:bg-gray-200 dark:open:bg-grey-900 sm:rounded-lg">
                                    <summary class="bg-inherit px-5 py-3 cursor-pointer">{{ $usex->id }}</summary>
                                    <hr class="h-px my-1 bg-gray-400 border-0 dark:bg-gray-700">
                                    <div class="light:bg-gray-200 dark:bg-gray-900 px-5 py-3 sm:rounded-lg">
                                        <table class="table-auto w-full">
                                            <thead>
                                            <tr class="light:bg-gray-200 dark:bg-gray-900 border-b-2 border-gray-500">
                                                <th class="px-4 pb-2">Set</th>
                                                @if($usex->sets[0]['reps']) <th class="px-4 py-2 text-center">Reps</th> @endif
                                                @if($usex->sets[0]['weight']) <th class="px-4 py-2 text-center">Weight</th> @endif
                                                @if($usex->sets[0]['time']) <th class="px-8 py-2 text-center">Time</th> @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($usex->sets as $index => $set)
                                            <tr class="light:bg-gray-200 dark:bg-gray-900">
                                                <th class="px-6 py-2">{{ $index + 1 }}</th>
                                                @if($set['reps'])
                                                    <th class="px-4 py-2 text-right">
                                                    {{ $set['reps'] }}
                                                    </th>
                                                @endif
                                                @if($set['weight'])
                                                    <th class="px-4 py-2 text-right">
                                                        {{ $set['weight'] }}
                                                    </th>
                                                @endif
                                                @if($set['time'])
                                                    <th class="flex justify-center px-4 py-2">
                                                        <div class="flex align-middle">
                                                            <x-icons.chevron-double-left  role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                            <x-icons.chevron-left role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                            <div class="px-1.5">{{ $set['time'] }}</div>
                                                            <x-icons.chevron-right role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                            <x-icons.chevron-double-right role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                        </div>
                                                    </th>

                                                @endif
                                            </tr>
                                            @endforeach
                                            <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </details>
                            </div>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

