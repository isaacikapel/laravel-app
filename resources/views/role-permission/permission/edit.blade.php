<x-app-layout>

<div class="mx-auto mt-5">
    <div class="flex flex-wrap">
        <div class="w-full">

            @if ($errors->any())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h4 class="mb-4">Edit Permission
                    <a href="{{ url('permissions') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
                </h4>
                <form action="{{ url('permissions/'.$permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Permission Name
                        </label>
                        <input type="text" name="name" value="{{ $permission->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
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