@props(['href' => '#',])
<a href="{{ $href }}" {!! $attributes->merge(['class'=> 'shadow rounded bg-gray-200 py-2 px-3 border border-2 border-dashed border-sky-500'])  !!}>
    {{ $slot }}
</a>
