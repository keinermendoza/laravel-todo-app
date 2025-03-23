<x-todos.base>

    
    <div class=" mx-auto w-full max-w-xl">
        
    <p class="text-xl text-center">Registrar nueva tarea</p>
    <form method="post" class="space-y-2 mb-6" action="{{ route('todos.update', ['todo' => $todo->id]) }}">
        @csrf
        @method('PATCH')
            <x-input-label value="Nombre de la tarea" />
            <x-text-input value="{{ $todo->task }}" name="task" />
            <x-text-input-error name="task" />
            <x-primary-button >Guardar</x-primary-button>
        </form>
    </div>

    <div>
        <p>Puede eliminar esta tarea haciendo click en el boton Eliminar</p>
        <p class="font-bold">Esta accion no puede ser revertida</p>
        <x-primary-button form="destroy-todo" class="bg-red-500">Eliminar</x-primary-button>
    </div>

    <form id="destroy-todo" method="post" action="{{ route('todos.destroy', ['todo' => $todo->id]) }}">
        @csrf
        @method("DELETE")
    </form>
</x-todos.base>