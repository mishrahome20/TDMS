<x-app-layout>
    <div class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-6 grid grid-cols-2 gap-4">
            <div>
                <p class="text-lg font-semibold">Users Details</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-7xl py-6 px-6 grid grid-cols-2 gap-4">
        <div class="bg-white shadow-lg rounded-lg">
            <p class="text-center text-lg font-bold pt-4">Create Department</p>
            <form action="{{ route('departments.store') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 px-6 pb-4">
                    <x-input-label for="department">Department</x-input-label>
                    <x-text-input type="text" placeholder="enter your department name" name="department"></x-text-input>
                    <x-input-error :messages="$errors->get('department')"></x-input-error>
                </div>
                <div class="grid grid-cols-1 px-6 pb-4">
                    <x-input-label for="description">Description</x-input-label>
                    <textarea placeholder="Describe your Department" class="w-full" rows="5"  name="description"></textarea>
                    <x-input-error :messages="$errors->get('description')"></x-input-error>
                </div>
                <div class="grid grid-cols-3 px-6 pb-4 text-center">
                    <div></div>
                    <div>
                        <x-primary-button type="submit">Create Department</x-primary-button>
                    </div>
                    <div></div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
