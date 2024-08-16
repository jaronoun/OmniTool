<div class="flex gap-3">
    <div
        wire:click="$dispatch('selected-training', {trainingId: {{ $training['id'] }}, scheduleId: {{ request()->route('scheduleId') }}})"
        class="
        @if($training->selected) dark:bg-gray-700 @endif
        flex gap-3 items-center w-full bg-transparent text-gray-800 dark:text-gray-200 border border-gray-500 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        <div>
            {{ $training->name }}
        </div>
    </div>
    @if($training->selected)
        <div class="flex gap-3 items-center ml-auto">
            <x-icons.pencil
                wire:click="$dispatch('edit-training', {trainingId: {{ $training->id }}})"
                class="w-5 h-5 text-slate-500 hover:text-slate-300 hover:cursor-pointer"
            />
            <x-icons.trash
                wire:click="deleteTraining({{ $training->id }})"
                class="w-5 h-5 text-slate-500 hover:text-slate-300 hover:cursor-pointer"
            />
        </div>
    @endif
</div>
