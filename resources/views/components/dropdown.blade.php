@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'w-11/12 mx-auto'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'lg:left':
        $alignmentClasses = 'origin-top-right right-0 lg:origin-top-left lg:left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'lg:top':
        $alignmentClasses = 'origin-top-right right-0 lg:origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" {{ $trigger->attributes->merge(['class' => '']) }}>
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="bg-white rounded-md ring-1 ring-black ring-opacity-5 py-2 absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div {{ $content->attributes->merge(['class' => $contentClasses]) }}>
            {{ $content }}
        </div>
    </div>
</div>
