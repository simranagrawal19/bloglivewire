{{-- <x-layout>

    <section class="py-8 max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4">Manage post</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href="/admin/posts">All Posts</a></li>
            <li class="list-group-item"><a href="/admin/posts/create">New Posts</a></li>
        </ul>

        <div class="flex flex-col" style="margin-left: -13rem !important;">
            <div class="my-2 sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                        style="margin-top:30px; padding:18px; margin-left:-55px;">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th style="width: 20%;" class="text-center">
                                        Title
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Edit
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Delete
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">

                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="#">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm  font-medium">
                                            <a class="btn btn-info btn-sm" href="/admin/posts/{{ $post->id }}/edit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>

                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm  font-medium">

                                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>



    </section>
</x-layout> --}}


<x-layout>

    <section class="py-8 max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4">Manage post</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href="/admin/posts">All Posts</a></li>
            <li class="list-group-item"><a href="/admin/posts/create">New Posts</a></li>
        </ul>

        <div class="flex flex-col" style="width:50rem !important; margin-left:-10rem;">
            <div class="my-2 sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                        style="margin-top:30px; padding:18px; margin-left:-55px;">

                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" style="width: 40%;" tabindex="0"
                                        aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Title</th>
                                    <th class="sorting" tabindex="0" style="width: 30%" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" style="width: 8%"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Edit</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" style="width: 8%"
                                        rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $post->title }}</td>
                                        <td>
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/admin/posts/{{ $post->id }}/edit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
</x-layout>
