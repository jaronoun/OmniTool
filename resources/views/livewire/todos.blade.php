
<div class="py-6 px-2 w-1/3">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900 dark:text-gray-100">
            <div class="flex justify-center">
                <h1 class="text-3xl font-medium">Todos</h1>
            </div>
            <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
            @foreach($todos as $todo)
                <div id="task" class="flex justify-between items-center border-b border-slate-400 py-3 px-2 bg-gradient-to-r from-gray-800 to-transparent hover:from-gray-900 transition ease-linear duration-150">
                    <div class="inline-flex items-center space-x-2">
                        <div>
                            @if(!$todo->is_done)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                            @if($todo->is_done)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @endif
                        </div>
                        <div class="@if($todo->is_done) text-slate-500 line-through @endif">{{ $todo->name }}</div>
                    </div>
                    <div class="@if($todo->is_done) text-slate-500 line-through @endif">{{ $todo->description }}</div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                </div>
            @endforeach
            <p class="pt-2 text-xs text-slate-500 text-center">Last updated 12 minutes ago</p>
        </div>
    </div>
</div>
