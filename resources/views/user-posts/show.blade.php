<x-app-layout>
    <div class="container mx-auto max-w-7xl mt-6 p-4 text-black dark:text-gray-300">
        <h1 class="font-semibold text-[3.5rem] text-gray-800 dark:text-gray-200 leading-tight"><span class="text-cyan-600">[{{$post->category->name}}]</span> <br> {{$post->title}}</h1>
      
        @foreach($post->tags as $tag)
            <x-tags.tag-item class="text-lg">{{$tag->name}}</x-tags.tag-item>
        @endforeach
       
        <p>{{$post->user->name}}</p>
        <p class="text-xs text-gray-900 dark:text-slate-500 mb-3">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>

        @auth 
            @if($post->user->id == Auth::user()->id)
            <x-links.secondary href="{{route('user-posts.edit', $post)}}">Edit Post</x-links.secondary>
            <form action="{{route('user-posts.destroy', $post)}}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>Delete</x-danger-button>
            </form> 
        @endif
    
        @endauth

        <hr class="mt-3">

        <h2 class="font-semibold text-gray-800 dark:text-white mt-3 text-2xl">Comments</h2>
        @if($comments->isEmpty())
            <p class="mt-3 pl-4">No comments yet.</p>
        @endif

        {{-- comment cards --}}
        @foreach($comments as $comment)
            <x-comments.card :comment="$comment" />
        @endforeach

        @auth
            <form action="{{route('posts.comments.store', ['post' => $post])}}" class="py-5" method="POST">
                @csrf 
                <x-forms.input name="content" class="mb-3" />
                <x-primary-button>Send comment</x-primary-button>
            </form>
        @endauth
    </div>
</x-app-layout>