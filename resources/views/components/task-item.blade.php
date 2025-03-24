<!-- resources/views/components/task-item.blade.php -->
@props(['todo'])

<x-item-list :active="$todo->completed">
    <div>
        <p>{{ $todo->task }}</p>
        
        @can('view_todos')
        <p>{{ $todo->user->name }}</p>
        @endcan

        @if($todo->completed)
        <p class="text-sm italic">Completado</p>
        @endif
    </div>
    <div class="flex gap-x-4">
        @can('update', $todo)
        <a href="{{ route('todos.edit', ['todo' => $todo->id] ) }}">Editar</a>

        <button
        form="toggle-state-{{ $todo->id }}"
        class="px-3 py-1 text-sm font-semibold text-white rounded-lg transition-colors duration-200 {{ $todo->completed ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }}"
        >{{ $todo->completed ? 'Desmarcar' : 'Completar' }}</button>
        @endcan

    <div>

        <form 
            id="toggle-state-{{ $todo->id }}"
            method="post"
            action="{{ route('todos.toogle', ['todo' => $todo->id]) }}">
            @csrf
            @method("PATCH")
        </form>
</x-item-list>
