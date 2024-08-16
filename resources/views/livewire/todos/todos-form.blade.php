<div>
    <form class="dark:bg-gray-800">
        <div class="p-4">
            <!-- Name Input -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                <div class="mt-1">
                    <input type="text" id="name" name="name" value="{{ $todo->name }}" wire:model="name" class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:text-white dark:bg-gray-700 rounded-md">
                </div>
            </div>

            <!-- Description Textarea -->
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                <div class="mt-1">
                    <textarea id="description" name="description" wire:model="description" rows="3" class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:text-white dark:bg-gray-700 rounded-md">{{ $todo->description }}</textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 flex justify-end space-x-2">
                <button type="button" wire:click="$dispatch('closeModal')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancel
                </button>
                <button type="button" wire:click="saveTodo" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
