@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-1 block text-sm font-medium text-gray-700 text-opacity-60']) }}>
    {{ ucwords($value ?? $slot) }}
</label>
