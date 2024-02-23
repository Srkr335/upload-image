
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories
                            <a href="{{ url('dashboard/create') }}" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                {{-- {{ $categories }}   --}}
                <table class="table table-boardered table-stripes">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Is_Active</th>
                                <th>files</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>

                                <td>

                                    <img src="{{ asset($item->image) }}" style="width:70px; height:70px;"  alt="image">
                                </td>
                                @if ($item->is_active)
                                <td class="btn btn-success">Active</td>
                            @else
                                <td  class="btn btn-warning">InActive</td>
                            @endif

                                <td>
                                    <a href="{{ url('categories/'. $item->id.'/upload') }}" class="btn btn-info">Add / View Images</a>
                                </td>
                                <td>

                                    <a href="{{ url('categories/'. $item->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('categories/'. $item->id.'/delete') }}"
                                        class="btn btn-danger"
                                        onclick="return confirm(' Are You Sure ?')"
                                        >
                                        Delete</a>
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

