<x-app-layout>
    <div class="bg-white shadow-lg">
        <div class="mx-auto max-w-7xl py-6 px-6 grid grid-cols-2 gap-4">
            <div>
                <p class="text-lg font-semibold">Users Details</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-end">
                    <x-secondary-button type="submit">
                        <a href="{{ route('departments.create') }}">
                            {{ __('Create Department') }}
                        </a>
                    </x-secondary-button>
                </div>
                <div class="text-start">
                    <x-secondary-button href="#" class="bg-red-500">Generate PDF </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
