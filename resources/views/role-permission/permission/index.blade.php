<x-app-layout>

<div class="container mx-auto mt-5">
    <a href="{{ url('roles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Roles</a>
    <a href="{{ url('permissions') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mx-1">Permissions</a>
    <a href="{{ url('users') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">Users</a>
</div>

<div class="container mx-auto mt-2">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Permissions
                        @can('create permission')
                        <a href="{{ url('permissions/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add Permission</a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table-auto w-full mt-3 border-collapse border border-gray-500">
                        <thead>
                            <tr>
                                <th class="border border-gray-600">Id</th>
                                <th class="border border-gray-600">Name</th>
                                <th class="border border-gray-600" width="40%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td class="border border-gray-600">{{ $permission->id }}</td>
                                <td class="border border-gray-600">{{ $permission->name }}</td>
                                <td class="border border-gray-600">
                                    @can('update permission')
                                    <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    @endcan

                                    @can('delete permission')
                                    <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">Delete</a>
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