<x-app-layout> 

<div class="container mt-5">
    <a href="{{ url('roles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Roles</a>
    <a href="{{ url('permissions') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mx-1">Permissions</a>
    <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">Users</a>
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="bg-green-200 text-green-800 p-3 mb-3">{{ session('status') }}</div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="text-xl font-semibold">Users
                        @can('create user')
                        <a href="{{ url('users/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add User</a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Roles</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                            <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded-full mx-1">{{ $rolename }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    @can('update user')
                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                    @endcan

                                    @can('destroy user')
                                    <a href="{{ url('users/'.$user->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mx-2 rounded">Delete</a>
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