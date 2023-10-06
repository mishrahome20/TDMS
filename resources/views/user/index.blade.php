<x-app-layout>
   <div class="bg-white shadow-lg">
       <div class="mx-auto max-w-7xl py-6 px-6 grid grid-cols-2 gap-4">
        <div>
            <p class="text-lg font-semibold">Users Details</p>
        </div>
       <div class="grid grid-cols-2 gap-4">
           <div class="text-end">
               <x-secondary-button
                   x-data=""
                   x-on:click.prevent="$dispatch('open-modal', 'user-store-modal')">
                   {{ __('Create User') }}
               </x-secondary-button>
           </div>
           <div class="text-start">
               <x-secondary-button href="#" class="bg-red-500">Generate PDF </x-secondary-button>
           </div>
       </div>
       </div>
   </div>
{{--    Modal for Storing User--}}
    <x-modal name="user-store-modal">
        <form action="{{ route('users.store') }}" method="post">
            <h2 class="text-center pt-5 text-lg">Create User</h2>
            @csrf
            <div class="bg-white px-4  pb-4 sm:p-6 sm:pb-4">
                <label class="font-medium text-gray-800">Name</label>
                <x-text-input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg"  name="name" placeholder="Enter user name"></x-text-input>
                <label class="font-medium text-gray-800">Email</label>
                <x-text-input type="email" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" name="email" placeholder="Enter user Email"></x-text-input>
                <label class="font-medium text-gray-800">Password</label>
                <x-text-input type="password" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" name="password" placeholder="Enter user Password"></x-text-input>
                <label class="font-medium text-gray-800">Confirm Password</label>
                <x-text-input type="password" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" name="password_confirm" placeholder="Re-enter user Password"></x-text-input>
                <label class="font-medium text-gray-800">Phone</label>
                <x-text-input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3 shadow-lg" name="phone" placeholder="Enter user Phone"></x-text-input>
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button type="submit">Create</x-danger-button>
            </div>
        </form>
    </x-modal>
{{--    Modal for storing User--}}

    <script>
        function storeUserModal()
        {
            document.getElementById('store_user_modal').classList.toggle('hidden');
        }
        //Displaying user Create Modal
        document.addEventListener("DOMContentLoaded",function() {

            console.log('Mery John');
        })
    </script>
</x-app-layout>
