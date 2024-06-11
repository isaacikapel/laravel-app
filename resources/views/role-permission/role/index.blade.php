<x-app-layout>

<div class="mx-auto mt-5">
    <a href="{{ url('roles') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded mx-1">Roles</a>
    <a href="{{ url('permissions') }}" class="text-white bg-blue-300 hover:bg-blue-500 font-bold py-2 px-4 rounded mx-1">Permissions</a>
    <a href="{{ url('users') }}" class="text-white bg-yellow-400 hover:bg-yellow-500 font-bold py-2 px-4 rounded mx-1">Users</a>
</div>

<div class="mx-auto mt-2">
    <div class="flex flex-wrap">
        <div class="w-full">

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded my-3">
                <div class="header bg-gray-200 text-gray-700 py-3 px-4 rounded-t">
                    <h4>
                        Roles
                        @can('create role')
                        <a href="{{ url('roles/create') }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded float-right">Add Role</a>
                        @endcan
                    </h4>
                </div>
                <div class="body p-4">

                    <table class="table-fixed w-full">
                        <thead>
                            <tr>
                                <th class="w-1/12 px-4 py-2">Id</th>
                                <th class="w-5/12 px-4 py-2">Name</th>
                                <th class="w-6/12 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td class="border px-4 py-2">{{ $role->id }}</td>
                                <td class="border px-4 py-2">{{ $role->name }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">
                                        Add / Edit Role Permission
                                    </a>

                                    @can('update role')
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>
                                    @endcan

                                    @can('delete role')
                                    <a href="{{ url('roles/'.$role->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">
                                        Delete
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>