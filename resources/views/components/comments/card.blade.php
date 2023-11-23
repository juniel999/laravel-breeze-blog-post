<div class="mt-3">
    <div class="border-l-4 pl-4 ml-3">
        <h3 class="text-xl">{{$comment->user->name}}</h3>
        <p class="text-white">{{$comment->content}}</p>
        <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
    </div>

@if($comment->replies)
    @foreach($comment->replies as $reply)
        <x-replies.card :reply="$reply" />
    @endforeach
@endif

    @auth
    <form action="{{route('comments.store', $comment)}}" method="POST" class="pl-4 ml-7">
        @csrf
        <x-forms.input name="content" class="mb-2 w-50" />
        <x-primary-button>Send reply</x-primary-button>
    </form>
    @endauth
</div>