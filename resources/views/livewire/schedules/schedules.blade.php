<div class="flex gap-3">
    <div
        wire:click="$dispatch('selected-schedule', {scheduleId: {{ $schedule['id'] }}})"
         class="
         @if($schedule->selected) dark:bg-gray-700 @endif
         flex gap-3 items-center w-full bg-transparenvvt text-gray-800 dark:text-gray-200 border border-gray-500 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        <div>
            {{ $schedule->name }}
        </div>
    </div>
    @if($schedule->selected)
        <div class="flex gap-3 items-center ml-auto">
            <x-icons.pencil
                wire:click="$dispatch('edit-schedule', {scheduleId: {{ $schedule->id }}})"
                class="w-5 h-5 text-slate-500 hover:text-slate-300 hover:cursor-pointer"
            />
            <x-icons.trash
                wire:click="deleteSchedule({{ $schedule->id }})"
                class="w-5 h-5 text-slate-500 hover:text-slate-300 hover:cursor-pointer"
            />
        </div>
    @endif
</div>
