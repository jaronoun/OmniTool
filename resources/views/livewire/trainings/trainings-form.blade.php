<div>
    @if(!$creatingTraining && !$editingTraining)
        <div class="pt-4">
            <button
                wire:click="showCreateForm"
                class="dark:bg-gray-600 w-full bg-transparent text-gray-800 dark:text-gray-200 border border-gray-500 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Training
            </button>
        </div>
    @endif
    @if($creatingTraining || $editingTraining)
        <div class="mt-4 space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" wire:model="name" id="name" class="mt-1 p-2 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:bg-gray-600">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                <textarea wire:model="description" id="description" class="mt-1 p-2 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:bg-gray-600"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end space-x-2">
                <button
                    wire:click="resetForm"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
                @if($creatingTraining)
                    <button
                        wire:click="createTraining()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>
                @else
                    <button
                        wire:click="updateTraining()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save
                    </button>
                @endif
            </div>
        </div>
    @endif
</div>
