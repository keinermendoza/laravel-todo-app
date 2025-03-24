@props(["active" => false])
<li class="flex items-center justify-between p-4 border rounded-lg shadow-sm transition-all duration-300 {{ $active ? 'bg-green-100 text-gray-500' : 'bg-white' }}">
{{ $slot }}
</li>