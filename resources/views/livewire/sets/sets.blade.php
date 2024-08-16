<div class="overflow-x-auto">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 text-center">Set</th>
            <th scope="col" class="px-6 py-3 text-center">Reps</th>
            <th scope="col" class="px-6 py-3 text-center">Time (seconds)</th>
            <th scope="col" class="px-6 py-3 text-center">Weight (kg)</th>
            <th scope="col" class="px-6 py-3 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($sets && count($sets) > 0)
            @foreach($sets as $index => $set)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-2 text-center text-2xl font-bold">{{ $index + 1 }}</td>

                    <!-- Reps Control -->
                    <td class="px-6 py-2">
                        <div class="flex justify-center items-center space-x-2">
                            @if(!is_null($set['reps']))
                                <button wire:click="updateSetColumn({{ $index }}, 'reps', -5)" class="text-white hover:text-red-500">
                                    <!-- << Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 4.5L8.5 12l7.5 7.5M11 4.5L3.5 12l7.5 7.5" />
                                    </svg>
                                </button>
                                <button wire:click="updateSetColumn({{ $index }}, 'reps', -1)" class="text-white hover:text-red-500">
                                    <!-- < Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <span class="text-xl">{{ $set['reps'] }}</span>
                                <button wire:click="updateSetColumn({{ $index }}, 'reps', 1)" class="text-white hover:text-green-500">
                                    <!-- > Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                                <button wire:click="updateSetColumn({{ $index }}, 'reps', 5)" class="text-white hover:text-green-500">
                                    <!-- >> Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 4.5l7.5 7.5L8 19.5M13 4.5l7.5 7.5L13 19.5" />
                                    </svg>
                                </button>
                                <!-- vertical line -->
                                <div class="border-r border-gray-300 dark:border-gray-600 h-6"></div>
                                <button wire:click="deleteSetColumn({{ $index }}, 'reps')" class="text-white hover:text-red-500">
                                    <!-- Minus Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/>
                                    </svg>
                                </button>
                            @else
                                <button class="px-2 py-1 text-white hover:text-green-700" wire:click="createSetColumn({{ $index }}, 'reps')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.75v14.5m7.25-7.25H4.75"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </td>

                    <!-- Time Control -->
                    <td class="px-6 py-2">
                        <div class="flex justify-center items-center space-x-2">
                            @if(!is_null($set['time']))
                                <button wire:click="updateSetColumn({{ $index }}, 'time', -5)" class="text-white hover:text-red-500">
                                    <!-- << Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 4.5L8.5 12l7.5 7.5M11 4.5L3.5 12l7.5 7.5" />
                                    </svg>
                                </button>
                                <button wire:click="updateSetColumn({{ $index }}, 'time', -1)" class="text-white hover:text-red-500">
                                    <!-- < Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <span class="text-xl">{{ $set['time'] }}</span>
                                <button wire:click="updateSetColumn({{ $index }}, 'time', 1)" class="text-white hover:text-green-500">
                                    <!-- > Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                                <button wire:click="updateSetColumn({{ $index }}, 'time', 5)" class="text-white hover:text-green-500">
                                    <!-- >> Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 4.5l7.5 7.5L8 19.5M13 4.5l7.5 7.5L13 19.5" />
                                    </svg>
                                </button>
                                <!-- vertical line -->
                                <div class="border-r border-gray-300 dark:border-gray-600 h-6"></div>
                                <button wire:click="deleteSetColumn({{ $index }}, 'time')" class="text-white hover:text-red-500">
                                    <!-- Minus Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/>
                                    </svg>
                                </button>
                            @else
                                <button class="px-2 py-1 text-white hover:text-green-700" wire:click="createSetColumn({{ $index }}, 'time')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.75v14.5m7.25-7.25H4.75"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </td>

                    <!-- Weight Control -->
                    <td class="px-6 py-2">
                        <div class="flex justify-center items-center space-x-2">
                            @if(!is_null($set['weight']))
                                <button wire:click="updateSetColumn({{ $index }}, 'weight', -5)" class="text-white hover:text-red-500">
                                    <!-- << Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 4.5L8.5 12l7.5 7.5M11 4.5L3.5 12l7.5 7.5" />
                                    </svg>
                                </button>
                                <button wire:click="updateSetColumn({{ $index }}, 'weight', -1)" class="text-white hover:text-red-500">
                                    <!-- < Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <span class="text-xl">{{ $set['weight'] }}</span>
                                <button wire:click="updateSetColumn({{ $index }}, 'weight', 1)" class="text-white hover:text-green-500">
                                    <!-- > Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                                <button wire:click="updateSetColumn({{ $index }}, 'weight', 5)" class="text-white hover:text-green-500">
                                    <!-- >> Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 4.5l7.5 7.5L8 19.5M13 4.5l7.5 7.5L13 19.5" />
                                    </svg>
                                </button>
                                <!-- vertical line -->
                                <div class="border-r border-gray-300 dark:border-gray-600 h-6"></div>
                                <button wire:click="deleteSetColumn({{ $index }}, 'weight')" class="text-white hover:text-red-500">
                                    <!-- Minus Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/>
                                    </svg>
                                </button>
                            @else
                                <button class="px-2 py-1 text-white hover:text-green-700" wire:click="createSetColumn({{ $index }}, 'weight')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.75v14.5m7.25-7.25H4.75"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-2 text-center">
                        <!-- Trash Icon for Deleting the Set -->
                        <button class="px-2 py-1 text-white hover:text-red-700" wire:click="removeSet({{ $index }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3h6M4 7h16M10 11v6m4-6v6m-7 4h10c.552 0 1-.448 1-1V7H6v13c0 .552.448 1 1 1z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="5" class="w-full">
                <button class="w-full px-6 py-2 text-white hover:dark:bg-gray-700" wire:click="addSet">Add Set</button>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="flex justify-end mt-4 space-x-4">
        <button wire:click="saveSets()" @if(!$canSave) disabled class="px-6 py-2 text-white bg-gray-600 rounded w-32" @else class="px-6 py-2 text-white bg-yellow-600 rounded w-32" @endif>Save</button>
        <button wire:click="executeSet" class="flex items-center px-6 py-2 text-white bg-blue-600 rounded w-32">
            <span>Execute</span>
            @if($countExecuted > 0)
                <span class="ml-2">({{ $countExecuted }})</span>
            @endif
        </button>
    </div>
</div>
