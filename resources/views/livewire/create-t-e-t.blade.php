<div class="fixed bottom-0 w-full">
    <div class="">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm">
            <div class="p-4 text-gray-900 dark:text-gray-100">
                @if($type != '')
                <form class="pb-4" wire:submit="create">
                    <div class="px-4 flex justify-center">
                        <h2 class="text-2xl font-bold">{{ $type }}</h2>
                    </div>
                    <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex flex-col items-center py-2">
                        <div class="py-2 px-12 w-full flex bg-gray-900 rounded-xl">
                            <input wire:model="name" class="appearance-none bg-transparent border-none w-full text-gray-700 dark:text-gray-300 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Title">
                            <input wire:model="description" class="appearance-none bg-transparent border-none w-full text-gray-700 dark:text-gray-300 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Description">
                        </div>
                        @if($type == 'Task')
                            <div class="w-full flex justify-center items-center">
                                <div class="grid w-[40rem] grid-cols-4 gap-2 p-2 items-center">
                                    <div wire:click="setPeriodicType('day')" role="button" class="@if($periodicType == 'day') bg-gray-600 @endif flex justify-center items-center hover:bg-gray-700 rounded-xl">
                                        <div class="">Daily</div>
                                    </div>
                                    <div wire:click="setPeriodicType('week')" role="button" class="@if($periodicType == 'week') bg-gray-600 @endif flex justify-center items-center hover:bg-gray-700 rounded-xl">
                                        <div class="">Weekly</div>
                                    </div>
                                    <div wire:click="setPeriodicType('month')" role="button" class="@if($periodicType == 'month') bg-gray-600 @endif flex justify-center items-center hover:bg-gray-700 rounded-xl">
                                        <div class="">Monthly</div>
                                    </div>
                                    <div wire:click="setPeriodicType('year')" role="button" class="@if($periodicType == 'year') bg-gray-600 @endif flex justify-center items-center hover:bg-gray-700 rounded-xl">
                                        <div class="">Yearly</div>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center">
                                    <span class="pr-8 ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">periodicity</span>
                                </div>
                                <div class="px-2 pr-4 flex items-center bg-gray-900 rounded-xl">
                                    <x-icons.chevron-left wire:click="periodicSub()" role="button" class="hover:bg-gray-700 sm:rounded-lg"/>
                                    <div class="px-1.5">{{ $periodicTimes }}</div>
                                    <x-icons.chevron-right wire:click="periodicAdd()" role="button"  class="hover:bg-gray-700 sm:rounded-lg"/>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">per {{ $periodicType }}</span>
                                </div>
                            </div>
                        @endif
                        @if($type == 'Event')
                            <div class="w-full flex space-x-4 pt-2 px-12">
                                <div class="flex-1 flex flex-col">
                                    <label class="text-gray-300">Start Date</label>
                                    <input type="datetime-local" wire:model="start" class="mt-1 p-2 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:bg-gray-600">
                                </div>
                                <div class="flex-1 flex flex-col">
                                    <label class="text-gray-300">End Date</label>
                                    <input type="datetime-local" wire:model="end" class="mt-1 p-2 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:bg-gray-600">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="w-full flex gap-3">
                        <button class="w-full bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                            Create
                        </button>
                        <button wire:click="setType('')" class="w-full border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                            Cancel
                        </button>
                    </div>
                </form>
                @endif
                <div class="flex items-center justify-between gap-3">
                    <div class="flex-1 flex justify-center gap-3">
                        <button wire:click="setType('Task')" class="bg-transparent @if($type == 'Task') bg-gray-500 @endif hover:bg-gray-500 text-gray-700 dark:text-gray-200 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                            Task
                        </button>
                        <button wire:click="setType('Event')" class="bg-transparent @if($type == 'Event') bg-gray-500 @endif hover:bg-gray-500 text-gray-700 dark:text-gray-200 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                            Event
                        </button>
                        <button wire:click="setType('Todo')" class="bg-transparent @if($type == 'Todo') bg-gray-500 @endif hover:bg-gray-500 text-gray-700 dark:text-gray-200 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                            Todo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
