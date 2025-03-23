<x-todos.base>

    
    <div class=" mx-auto w-full max-w-xl">
        
    <p class="text-xl text-center">Registrar nueva tarea</p>
    <form method="post" class="space-y-2 mb-6" action="{{ route('todos.store') }}">
        @csrf
            <x-input-label value="Nombre de la tarea" />
            <x-text-input name="task" />
            <x-text-input-error name="task" />
            <x-primary-button >Guardar</x-primary-button>
        </form>
    </div>

    <ul class="space-y-4">
        @foreach ($todos as $todo)
        <x-task-item :$todo />
        @endforeach

    </ul>
</x-todos.base>