<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <table class="mx-auto">
            <tr>
                <th class="p-6 dark:text-gray-100 dark:bg-gray-800">Name</th>            
                <th class="p-6 dark:text-gray-100 dark:bg-gray-800">Email</th>            
                <th class="p-6 dark:text-gray-100 dark:bg-gray-800">Role</th>
                <th class="p-6 dark:text-gray-100 dark:bg-gray-800">Actions</th>
            </tr>
        @foreach($users as $user)
        <tr>
            <td class="p-6 dark:text-gray-100 dark:bg-gray-800">{{$user['name']}}</td>            
            <td class="p-6 dark:text-gray-100 dark:bg-gray-800">{{$user['email']}}</td>            
            <td class="p-6 dark:text-gray-100 dark:bg-gray-800">{{$user['role']}}</td>            
            <td class="p-6 dark:text-gray-100 dark:bg-gray-800">
                <a class="btn bg-yellow-500 px-4 py-1 hover:bg-yellow-600 text-black" href="/profile/{{$user['id']}}">Edit</a>
            </td>            
        </tr>
                    
        
        @endforeach
        </table>
    </div>
</x-app-layout>
