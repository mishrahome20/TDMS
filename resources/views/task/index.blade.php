<x-app-layout>
    <div class="bg-white shadow-lg">
        <div class="mx-auto max-w-7xl py-6 px-6 grid grid-cols-2 gap-4">
            <div>
                <p class="text-lg font-semibold">Task  Details</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-end">
                    <x-secondary-button type="submit" x-data="" x-on:click.prevent="$dispatch('open-modal', 'task-store-modal')">
                        {{ __('Create Task') }}
                    </x-secondary-button>
                </div>
                <div class="text-start">
                    <x-secondary-button href="#" class="bg-red-500">Generate PDF </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
    {{--    Modal for Storing Project--}}
    <x-modal name="task-store-modal">
        <form action="{{ route('tasks.store') }}" method="post">
            <h2 class="text-center pt-5 text-lg">Create User</h2>
            @csrf
            <div class="bg-white px-4  pb-4 sm:p-6 sm:pb-4">
                <label class="font-medium text-gray-800">Title</label>
                <x-text-input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" id="title"  name="title" placeholder="Enter user Project title"></x-text-input>
                <label class="font-medium text-gray-800">Description</label>
                <textarea  class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow" rows="5" id="description" name="description" placeholder="Enter user Description"></textarea>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="font-medium text-gray-800">Deadline</label>
                        <x-text-input type="date" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" id="deadline"  name="deadline"></x-text-input>
                    </div>
                    <div>
                        <label class="font-medium text-gray-800">Priority</label>
                        <select name="priority" id="priority" class="w-full shadow-2xl">
                            <option value="0">Normal</option>
                            <option value="1">High</option>
                            <option value="0">Medium</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="font-medium text-gray-800">Project</label>
                        @if($projects->isNotEmpty())
                            <select name="project_id" id="project_id" class="w-full shadow-2xl">
                                <option value="">Select  Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="priority" id="priority" class="w-full shadow-2xl">
                                <option value="" class="text-red-600">Add Project for creating task</option>
                            </select>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <x-danger-button x-on:click="$dispatch('close')" id="task_create_modal_cancel_button" type="button">
                    {{ __('Cancel') }}
                </x-danger-button>
                <x-primary-button type="submit">Create</x-primary-button>
            </div>
        </form>
    </x-modal>
    {{--    Modal for storing Project--}}
</x-app-layout>
