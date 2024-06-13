<x-app-layout>

<div class="mx-auto mt-5">
    <div class="flex flex-wrap">
        <div class="w-full">

            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h4 class="mb-4">Role : {{ $role->name }}
                    <a href="{{ url('roles') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
                </h4>
                <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        @error('permission')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        <label class="block text-gray-700 text-sm font-bold mb-2" for="permissions">
                            Permissions
                        </label>

                        <div class="grid grid-cols-6 gap-4">
                            @foreach ($permissions as $permission)
                                <div class="col-span-1">
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            name="permission[]"
                                            value="{{ $permission->name }}"
                                            class="form-checkbox text-blue-600"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                        >
                                        <span class="ml-2">{{ $permission->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-app-layout>