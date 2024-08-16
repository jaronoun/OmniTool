<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <!-- Icon Column -->
    <td class="px-6 py-2 text-center text-2xl font-bold">
        <div>
            @if(!$todo->is_done)
                <svg wire:click="toggleIsDone({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif
            @if($todo->is_done)
                <svg wire:click="toggleIsDone({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            @endif
        </div>
    </td>

    <!-- Name Column -->
    <td class="px-6 py-2 text-center">
        <div class="@if($todo->is_done) text-slate-500 line-through @endif">
            {{ $todo->name }}
        </div>
    </td>

    <!-- Description Column -->
    <td class="px-6 py-2 text-center">
        <div class="@if($todo->is_done) text-slate-500 line-through @endif">
            {{ $todo->description }}
        </div>
    </td>

    <!-- Action Icons Column -->
    <td class="px-6 py-2 text-center">
        <div class="flex justify-center items-center space-x-4">
            <!-- Edit Icon -->
            <svg wire:click="$dispatch('openModal', { component: 'todos.todos-form', arguments: { todo: {{ $todo }} } })" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 2.487a2.5 2.5 0 013.535 0l1.414 1.414a2.5 2.5 0 010 3.535l-9.793 9.793a4.5 4.5 0 01-2.121 1.061l-3.63.726a.75.75 0 01-.902-.902l.726-3.63a4.5 4.5 0 011.061-2.121l9.793-9.793z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25L15.75 4.5" />
            </svg>

            <!-- Trash Icon -->
            <svg wire:click="deleteTodo({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        </div>
    </td>

</tr>

{{--<div id="task" class="flex justify-between items-center border-b border-slate-400 py-3 px-2 bg-gradient-to-r from-gray-800 to-transparent hover:from-gray-900 transition ease-linear duration-150">--}}
{{--    <div class="inline-flex items-center space-x-2">--}}


{{--    </div>--}}

{{--    <div>--}}

{{--    </div>--}}
{{--</div>--}}


