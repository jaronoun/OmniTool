<x-filament::page>
    <form wire:submit="submit">
        {{ $this->form }}

        <div class="mt-4">
            <x-filament::button type="submit">
                Register
            </x-filament::button>
        </div>
    </form>
</x-filament::page>
