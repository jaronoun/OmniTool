<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                <div class="flex px-4">
                    <h2 class="text-2xl font-bold">Schedules</h2>
                </div>
                <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                <ul>
                    <li>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 sm:rounded-lg">
                                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr @if($selectedSchedule != $schedule->id)wire:click="getTraining({{ $schedule->id }})"@endif role="button" class="bg-white dark:bg-gray-800 dark:hover:bg-gray-900 @if($selectedSchedule == $schedule->id) dark:bg-gray-900 @endif">
                                        <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $schedule->name }}
                                        </th>
                                        <td class="px-6 py-2">
                                            <div class="text-gray-900 dark:text-gray-400">{{ $schedule->description }}</div>
                                        </td>
                                        <td>
                                            <div class="pe-3 gap-3 ml-auto flex align-middle justify-end">
                                                @if($selectedSchedule == $schedule->id)
                                                    <x-icons.pencil role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.trash wire:click="deleteSchedule()" role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="px-2 pt-4">
                        <a class="w-full flex items-center px-2 py-1 light:hover:bg-gray-200 dark:hover:bg-gray-700 sm:rounded-lg">
                            @if(!$creatingSchedule)
                                <button class="w-full" wire:click.prevent="toggleCreatingSchedule()">Create Schedule</button>
                            @endif
                            @if($creatingSchedule)
                                <form class="w-full" wire:submit="createSchedule">
                                    <div class="w-full flex items-center border-b border-teal-500">
                                        <input wire:model="scheduleName" class="appearance-none bg-transparent border-none w-full text-gray-200 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="name" aria-label="name">
                                        <input wire:model="scheduleDescription" class="appearance-none bg-transparent border-none w-full text-gray-200 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="description" aria-label="description">
                                        <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                                            Create
                                        </button>
                                        <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button" wire:click.prevent="toggleCreatingSchedule()">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @if($selectedSchedule)
        <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                    <div class="px-4">
                        <h2 class="text-2xl font-bold">Training</h2>
                    </div>
                    <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    <ul>
                        <li class="">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 sm:rounded-lg">
                                    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Description
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trainings as $training)
                                        <tr @if($selectedTraining != $training->id)wire:click="getUsex({{ $training->id }})" @endif role="button" class="bg-white dark:bg-gray-800 dark:hover:bg-gray-900 @if($selectedTraining == $training->id) dark:bg-gray-900 @endif">
                                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $training->name }}
                                            </th>
                                            <td class="px-6 py-2">
                                                <div class="text-gray-900 dark:text-gray-400">{{ $training->description }}</div>
                                            </td>
                                            <td>
                                                <div class="pe-3 gap-3 ml-auto flex align-middle justify-end">
                                                    @if($selectedTraining == $training->id)
                                                        <x-icons.pencil role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                        <x-icons.trash wire:click="deleteTraining()" role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li class="px-2 pt-4">
                            <a class="w-full flex items-center px-2 py-1 light:hover:bg-gray-200 dark:hover:bg-gray-700 sm:rounded-lg">
                                @if(!$creatingTraining)
                                    <button class="w-full" wire:click.prevent="toggleCreatingTraining()">Create Training</button>
                                @endif
                                @if($creatingTraining)
                                    <form class="w-full" wire:submit="createTraining">
                                        <div class="w-full flex items-center border-b border-teal-500">
                                            <input wire:model="trainingName" class="appearance-none bg-transparent border-none w-full text-gray-200 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="name" aria-label="name">
                                            <input wire:model="trainingDescription" class="appearance-none bg-transparent border-none w-full text-gray-200 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="description" aria-label="description">
                                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                                                Create
                                            </button>
                                            <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button" wire:click.prevent="toggleCreatingTraining()">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </a>
                        </li>
                     </ul>
                </div>
            </div>
        </div>
    @endif
    @if($selectedTraining)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                    <div class="px-4">
                        <h2 class="text-2xl font-bold">User Exercises</h2>
                    </div>
                    <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    <ul>
                        <li>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 sm:rounded-lg">
                                    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Exercise
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userExercises as $usex)
                                        <tr @if($selectedUsex == null || $selectedUsex->id != $usex->id) wire:click.prevent="getSet({{ $usex }})" @endif role="button" class="@if($selectedUsex != null && $selectedUsex->id == $usex->id) light:bg-gray-200 dark:bg-gray-900 @endif">
                                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $usex->name }}
                                            </th>
                                            <td>
                                                <div class="text-gray-900 dark:text-gray-400">{{ $usex->exercise->name }}</div>
                                            </td>
                                            <td>
                                                <div class="pe-3 gap-3 ml-auto flex align-middle justify-end">
                                                    @if($selectedUsex != null && $selectedUsex->id == $usex->id)
                                                        <x-icons.pencil role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                        <x-icons.trash wire:click="deleteUsex()" role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li class="px-2 pt-4">
                            <a class="w-full flex items-center px-2 py-1 light:hover:bg-gray-200 dark:hover:bg-gray-700 sm:rounded-lg">
                                @if(!$creatingUsex)
                                    <button class="w-full" wire:click.prevent="toggleCreatingUsex()">Create User Exercise</button>
                                @endif
                                @if($creatingUsex)
                                    <form class="w-full" wire:submit="createUsex">
                                        <div class="w-full flex items-center border-b border-teal-500">
                                            <input wire:model="usexName" class="appearance-none bg-transparent border-none w-full text-gray-200 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="User Exercise Name" aria-label="User Exercise Name">
                                            <select wire:model="exerciseID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Select Exercise</option>
                                                @foreach($exercises as $exercise)
                                                    <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                                                @endforeach
                                            </select>
                                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                                                Create
                                            </button>
                                            <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button" wire:click.prevent="toggleCreatingUsex()">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
    @if($selectedUsex)
        <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100">
                    <div class="px-4">
                        <h2 class="text-2xl font-bold">Sets</h2>
                    </div>
                    <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="light:bg-gray-200 dark:bg-gray-900 px-5 py-3 sm:rounded-lg">
                        <table class="table-auto w-full">
                            <thead>
                            @if(Count($selectedUsex['sets']) > 0)
                                <tr class="light:bg-gray-200 dark:bg-gray-900 border-b-2 border-gray-500">
                                    <th class="flex align-middle justify-start">Set</th>
                                    @if($setReps) <th class="px-8 py-2 text-center">Reps</th> @endif
                                    @if($setWeight) <th class="px-8 py-2 text-center">Weight</th> @endif
                                    @if($setTime) <th class="px-8 py-2 text-center">Time</th> @endif
                                </tr>
                            @endif
                            </thead>
                            <tbody>
                            @foreach($selectedUsex['sets'] as $index => $set)
                                <tr class="light:bg-gray-200 dark:bg-gray-900">
                                    <td class="px-1.5 flex align-middle justify-start">{{ $index + 1 }}</td>
                                    @if($set['reps'] || $set['reps'] === 0 || $setReps)
                                        <td>
                                            @if(isset($set['reps']) && $set['reps'] >= 0)
                                                <div class="flex align-middle justify-center">
                                                    <x-icons.chevron-double-left role="button" wire:click="decreaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'reps', 5)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.chevron-left role="button" wire:click="decreaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'reps', 1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <div class="px-1.5">{{ $set['reps'] }}</div>
                                                    <x-icons.chevron-right role="button" wire:click="increaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'reps', 1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.chevron-double-right role="button" wire:click="increaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'reps', 5)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                    @if($set['weight'] || $set['weight'] === 0 || $setWeight)
                                        <td>
                                            @if(isset($set['weight']) && $set['weight'] >= 0)
                                                <div class="flex align-middle justify-center">
                                                    <x-icons.chevron-double-left role="button" wire:click="decreaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'weight', 10)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.chevron-left role="button" wire:click="decreaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'weight', 1.25)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <div class="px-1.5">{{ $set['weight'] }}</div>
                                                    <x-icons.chevron-right role="button" wire:click="increaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'weight', 1.25)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.chevron-double-right role="button" wire:click="increaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'weight', 10)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                    @if($set['time'] || $set['time'] === 0 || $setTime)
                                        <td>
                                            @if(isset($set['time']) && $set['time'] >= 0)
                                                <div class="flex align-middle justify-center">
                                                    <x-icons.chevron-double-left role="button" wire:click="decreaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'time', 5)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.chevron-left role="button" wire:click="decreaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'time', 1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <div class="px-1.5">{{ $set['time'] }}</div>
                                                    <x-icons.chevron-right role="button" wire:click="increaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'time', 1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                    <x-icons.chevron-double-right role="button" wire:click="increaseSet({{ $selectedUsex['id'] }}, {{ $index }}, 'time', 5)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                    <td class="flex flex-col">
                                        @if($index === 0 && Count($selectedUsex->sets) > 1)
                                            <x-icons.arrow-narrow-down role="button" wire:click="moveSet({{ $selectedUsex['id'] }}, {{ $index }}, 1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                        @endif
                                        @if($index != 0 && $index != Count($selectedUsex->sets)-1 && Count($selectedUsex->sets) > 1)
                                            <x-icons.arrow-narrow-up role="button" wire:click="moveSet({{ $selectedUsex['id'] }}, {{ $index }}, -1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                            <x-icons.arrow-narrow-down role="button" wire:click="moveSet({{ $selectedUsex['id'] }}, {{ $index }}, 1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                        @endif
                                        @if($index === Count($selectedUsex->sets)-1 && Count($selectedUsex->sets) > 1)
                                            <x-icons.arrow-narrow-up role="button" wire:click="moveSet({{ $selectedUsex['id'] }}, {{ $index }}, -1)" class="hover:bg-gray-700 sm:rounded-lg"/>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex align-middle justify-end">
                                            <x-icons.trash role="button" wire:click="removeSet({{ $selectedUsex['id'] }}, {{ $index }})" class="hover:bg-gray-700 sm:rounded-lg"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th class="px-6 py-2 " colspan="6">
                                    <a class="w-full flex items-center px-2 py-1 @if(!$creatingSet) light:hover:bg-gray-200 dark:hover:bg-gray-700 @endif sm:rounded-lg">
                                        @if(!$creatingSet)
                                            <button class="w-full" wire:click.prevent="toggleCreatingSet()">Add Set</button>
                                        @endif
                                        @if($creatingSet)
                                            <form class="w-full" wire:submit="addNewSet">
                                                <div class="w-full flex gap-2 items-center border-b border-teal-500">
                                                    <div class="flex items-center me-4">
                                                        <input wire:model="isReps" id="inline-checkbox" type="checkbox" value="reps" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Reps</label>
                                                    </div>
                                                    <div class="flex items-center me-4">
                                                        <input wire:model="isWeight" id="inline-2-checkbox" type="checkbox" value="weight" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="inline-2-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Weight</label>
                                                    </div>
                                                    <div class="flex items-center me-4">
                                                        <input wire:model="isTime" id="inline-checked-checkbox" type="checkbox" value="time" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="inline-checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time</label>
                                                    </div>
                                                    <button class="flex-shrink-0 ml-auto bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                                                        Create
                                                    </button>
                                                    <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button" wire:click.prevent="toggleCreatingSet()">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    </a>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


