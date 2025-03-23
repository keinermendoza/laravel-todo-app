@props(['disabled' => false, 'name', 'value' => ''])
<input @disabled($disabled) name={{ $name }} value="{{ old($name, $value) }}" {{ $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
