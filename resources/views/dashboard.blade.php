<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
    @foreach(\App\Models\Deadline::all() as $deadline)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg font-bold">{{ $deadline->name }}</p>
                    <p class="text-lg">Description: {{ $deadline->description }}</p>
                    <p class="text-lg">Type: {{ $deadline->type }}</p>
                    <p class="text-lg">Status: {{ $deadline->is_done }}</p>
                    @foreach($deadline->dates as $dates)
                        <p class="text-lg">Start: {{ $dates['start'] }}</p>
                        <p class="text-lg">End: {{ $dates['end'] }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
