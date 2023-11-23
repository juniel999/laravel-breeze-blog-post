<div class="pl-4 ml-7 my-3">
    <h3 class="text-xl">{{$reply->user->name}} <span class="text-xs text-gray-600 ml-1">(replied)</span></h3>
    <p>{{$reply->content}}</p>
    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</span>
</div>