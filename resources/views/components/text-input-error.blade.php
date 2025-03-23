@props(["name"])
@error($name)
<p{{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
    {{ $message }}
</p>
@enderror