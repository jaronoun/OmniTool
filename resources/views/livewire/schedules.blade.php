<div>
    <x-app-layout>
        @foreach(\App\Models\Schedule::all() as $schedule)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <ul>
                                <li class="px-2 hover:bg-gray-100">One</li>
                                <li class="px-2 hover:bg-secondary-100">Two</li>
                                <li class="px-2 hover:bg-secondary-100">Three</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </x-app-layout>
</div>
