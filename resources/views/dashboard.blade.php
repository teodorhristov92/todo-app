<x-layouts.app :title="__('Todo Dashboard')">
    <div class="flex flex-col gap-6">
        <div class="mb-4">
            <h3 class="text-lg font-semibold">Add a new Todo</h3>
            @livewire('todo.todo-form')
        </div>

        <div class="my-4">
            @livewire('todo.category-filter')
        </div>

        <div>
            <h3 class="text-lg font-semibold">Your Todos</h3>
            @livewire('todo.list-todos')
        </div>
    </div>
</x-layouts.app>