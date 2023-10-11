<x-app-layout>
    <div class="bg-white shadow-lg">
        <div class="mx-auto max-w-7xl py-6 px-6 grid grid-cols-2 gap-4">
            <div>
                <p class="text-lg font-semibold">Project  Details</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-end">
                    <x-secondary-button type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'project-store-modal')">
                        {{ __('Create Project') }}
                    </x-secondary-button>
                </div>
                <div class="text-start">
                    <x-secondary-button href="#" class="bg-red-500">Generate PDF </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
    {{--    Modal for Storing Project--}}
    <x-modal name="project-store-modal">
        <form action="{{ route('projects.store') }}" method="post">
            <h2 class="text-center pt-5 text-lg">Create User</h2>
            @csrf
            <div class="bg-white px-4  pb-4 sm:p-6 sm:pb-4">
                <label class="font-medium text-gray-800">Title</label>
                <x-text-input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" id="title"  name="title" placeholder="Enter user Project title"></x-text-input>
                <label class="font-medium text-gray-800">Description</label>
                <textarea  class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow" rows="5" id="description" name="description" placeholder="Enter user Description"></textarea>
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <x-danger-button x-on:click="$dispatch('close')" id="create_modal_cancel_button">
                    {{ __('Cancel') }}
                </x-danger-button>
                <x-primary-button type="submit">Create</x-primary-button>
            </div>
        </form>
    </x-modal>
    {{--    Modal for storing Project--}}
</x-app-layout>
