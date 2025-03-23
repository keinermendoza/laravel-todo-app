<!-- resources/views/components/task-item.blade.php -->
@props(['todo'])

<li class="flex items-center justify-between p-4 border rounded-lg shadow-sm transition-all duration-300 {{ $todo->completed ? 'bg-green-100 line-through text-gray-500' : 'bg-white' }}">
    <div>
        <p>{{ $todo->task }}</p>
        @if($todo->completed)
        <p class="text-sm italic">Completado</p>
        @endif
    </div>
    <div class="flex gap-x-4">
        <a href="{{ route('todos.edit', ['todo' => $todo->id] ) }}">Editar</a>
        <button
        form="toggle-state-{{ $todo->id }}"
        class="px-3 py-1 text-sm font-semibold text-white rounded-lg transition-colors duration-200 {{ $todo->completed ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }}"
        >{{ $todo->completed ? 'Desmarcar' : 'Completar' }}</button>
    <div>

        <form 
            id="toggle-state-{{ $todo->id }}"
            method="post"
            action="{{ route('todos.toogle', ['todo' => $todo->id]) }}">
            @csrf
            @method("PATCH")
        </form>
    </li>
