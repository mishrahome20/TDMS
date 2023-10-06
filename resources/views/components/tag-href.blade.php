@props(['href' => '#',])
<a href="{{ $href }}" {!! $attributes->merge(['class'=> 'shadow rounded bg-gray-200 py-4 px-5 border border-2 border-dashed border-sky-500'])  !!}>
    {{ $slot }}
</a>
