<x-todos.base>

    
    <div class=" mx-auto w-full max-w-xl">
    @if (Auth::user()->can('add_users'))        
    <p class="text-xl text-center">Registrar nuevo usuario</p>
    <form method="post" class="space-y-2 mb-6" enctype="multipart/form-data" action="{{ route('users.store') }}">
        @csrf
        <div>
            <x-input-label value="Nombre" />
            <x-text-input name="name" />
            <x-text-input-error name="name" />
        </div>

        <div>
            <x-input-label value="Email" />
            <x-text-input type="email" name="email" />
            <x-text-input-error name="email" />
        </div>

        <div>
            <x-input-label value="Contraseña" />
            <x-text-input type="password" name="password" />
            <x-text-input-error name="password" />
        </div>

        <div>
            <x-input-label value="confirme Contraseña" />
            <x-text-input type="password" name="password_confirmation" />
            <x-text-input-error name="password_confirmation" />
        </div>

        <div>
            <x-input-label value="Imagen" />
            <x-text-input type="file" name="image" />
            <x-text-input-error name="image" />
        </div>

        <x-primary-button >Guardar</x-primary-button>
        </form>
    </div>
    @endif

    @if (Auth::user()->can("view_users"))
    <ul class="space-y-4">
        @foreach ($users as $user)
        <x-item-list >
            @if ($user->image)
                <img class="size-10 rounded-full" src="{{ asset('storage/' . $user->image) }}" alt="image profile">
            @endif
            <p>{{ $user->email }}</p>
            <p>{{ $user->name }}</p>
        </x-item-list >
        @endforeach
    </ul>
    @endif

</x-todos.base>