<x-app-layout>
    @foreach(\App\Models\Schedule::all() as $schedule)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            <li class="px-2 dark:hover:bg-gray-900">
                                <a
                                    data-te-collapse-init
                                    href="#collapse{{$schedule->id}}"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapse{{$schedule->id}}"
                                    class="flex items-center px-2 hover:bg-secondary-100 focus:text-primary active:text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>{{ $schedule->name }} : {{ $schedule->description }}
                                </a>
                                <ul
                                    class="hidden"
                                    id="collapse{{$schedule->id}}"
                                    data-te-collapse-item>
                                    <li class="ml-4 px-2">
                                        <a
                                            role="button"
                                            class="flex items-center px-2 hover:bg-secondary-100 focus:text-primary active:text-primary">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="2.5"
                                                stroke="currentColor"
                                                class="h-4 w-4">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>Third-one
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>

