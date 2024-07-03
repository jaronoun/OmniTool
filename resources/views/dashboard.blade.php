<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
{{--    @if (request()->routeIs('dashboard'))--}}
        @livewire('events')
{{--    @endif--}}

{{--    @if(request()->routeIs('schedules'))--}}
{{--        @liveWire('schedules')--}}
{{--    @endif--}}
</x-app-layout>
