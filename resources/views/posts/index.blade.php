<x-app-layout>
    <x-slot name="header">
            {{ __('Admin | Posts') }}
    </x-slot>
    <div class="container mx-auto max-w-7xl px-4 py-5">
        {{-- <x-links.primary href="{{route('posts.create')}}" class="mb-3">
            Add new post
        </x-links.primary> --}}

        <div class="relative overflow-x-auto">
            <table class="w-full mb-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{substr($post->title, 0, 50)}}...
                            </td>
                            <td class="px-6 py-4">
                                {{substr($post->description, 0, 50)}}...
                            </td>
                            <td class="px-6 py-4">
                               {{$post->user->name}}
                            </td>
                            <td>
                                <x-links.primary href="{{route('posts.show', $post)}}">Show</x-links.primary>
                                <x-links.secondary href="{{route('posts.edit', $post)}}">Edit</x-links.secondary>
                                <form action="{{route('posts.destroy', $post)}}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>Delete</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>

