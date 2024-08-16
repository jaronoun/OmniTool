<x-app-layout>
    <div class="flex justify-center">
        <livewire:tasks.tasks-list>
        @livewire('events')
        <livewire:todos.todos-list />
    </div>
    @livewire('create-t-e-t')
</x-app-layout>
