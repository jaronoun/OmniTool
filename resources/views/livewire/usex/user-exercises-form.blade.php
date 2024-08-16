<div>
    @if(!$creatingUsex && !$editingUsex)
        <div class="pt-4">
            <button
                wire:click="showCreateForm"
                class="dark:bg-gray-600 w-full bg-transparent text-gray-800 dark:text-gray-200 border border-gray-500 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create User Exercise
            </button>
        </div>
    @endif
    @if($creatingUsex || $editingUsex)
        <div class="mt-4 space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" wire:model="usexName" id="name" class="mt-1 p-2 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:bg-gray-600">
                @error('usexName') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="exerciseID" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Exercise</label>
                <select wire:model="exerciseID" id="exerciseID" class="mt-1 p-2 block w-full rounded-md bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:bg-gray-600">
                    <option value="">Select Exercise</option>
                    @foreach($exercises as $exercise)
                        <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                    @endforeach
                </select>
                @error('exerciseID') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end space-x-2">
                <button
                    wire:click="resetForm"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
                @if($creatingUsex)
                    <button
                        wire:click="createUsex"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>
                @else
                    <button
                        wire:click="updateUsex"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save
                    </button>
                @endif
            </div>
        </div>
    @endif
</div>
