<div class="hover:scale-[1.02] hover:shadow-blue-500/50 ease-out duration-300 max-w-full mb-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><span class="text-cyan-600">[{{$post->category->name}}]</span> {{$post->title}}</h5>
    </a>

    @if(!$post->tags->isEmpty())
    <div class="flex">
        <span class="text-white text-[.7rem] bg-cyan-950 px-2 rounded mr-1">#Tags</span>
        @foreach($post->tags as $tag) 
            <x-tags.tag-item>{{$tag->name}}</x-tags.tag-item>
        @endforeach
    </div>

    @endif
    <p class="text-xs text-gray-900 dark:text-slate-500">{{$post->user->name}}</p>
    <p class="text-xs text-gray-900 dark:text-slate-500 mb-3">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
    <x-links.primary href="{{route('user-posts.show', $post)}}">
        Read more
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </x-links.primary>
</div>