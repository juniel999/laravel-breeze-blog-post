<x-app-layout>
    <x-slot name="header">
        {{ __('Recent posts') }}
    </x-slot>
    <div class="container mx-auto max-w-7xl px-4 py-5">
        @auth
        <x-links.primary href="{{route('user-posts.create')}}" class="mb-2">
            Create new post 
            <svg id='Create_Document_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(0.33 0 0 0.33 12 12)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-37, -34)" d="M 23.660156 4 C 22.332156 3.996 21.058094 4.5229375 20.121094 5.4609375 L 11.460938 14.121094 C 10.522938 15.059094 9.996 16.332156 10 17.660156 L 10 57 C 10 58.656 11.344 60 13 60 L 41.642578 60 C 44.009296 62.459815 47.325203 64 51 64 C 58.168 64 64 58.168 64 51 C 64 45.603533 60.692557 40.967411 56 39.003906 L 56 7 C 56 5.344 54.656 4 53 4 L 23.660156 4 z M 24 6 L 53 6 C 53.551 6 54 6.449 54 7 L 54 38.363281 C 53.035194 38.134113 52.033886 38 51 38 C 43.832 38 38 43.832 38 51 C 38 53.577795 38.763101 55.976887 40.0625 58 L 13 58 C 12.449 58 12 57.551 12 57 L 12 18 L 21 18 C 22.656 18 24 16.656 24 15 L 24 6 z M 22 6.5 L 22 15 C 22 15.551 21.551 16 21 16 L 12.5 16 C 12.609 15.836 12.737906 15.680062 12.878906 15.539062 L 21.539062 6.8789062 C 21.680062 6.7379063 21.836 6.609 22 6.5 z M 21 22 C 20.449 22 20 22.449 20 23 C 20 23.551 20.449 24 21 24 L 37 24 C 37.551 24 38 23.551 38 23 C 38 22.449 37.551 22 37 22 L 21 22 z M 41 22 C 40.449 22 40 22.449 40 23 C 40 23.551 40.449 24 41 24 L 45 24 C 45.551 24 46 23.551 46 23 C 46 22.449 45.551 22 45 22 L 41 22 z M 21 26 C 20.449 26 20 26.449 20 27 C 20 27.551 20.449 28 21 28 L 41 28 C 41.551 28 42 27.551 42 27 C 42 26.449 41.551 26 41 26 L 21 26 z M 21 32 C 20.449 32 20 32.449 20 33 C 20 33.551 20.449 34 21 34 L 43 34 C 43.551 34 44 33.551 44 33 C 44 32.449 43.551 32 43 32 L 21 32 z M 21 36 C 20.449 36 20 36.449 20 37 C 20 37.551 20.449 38 21 38 L 33 38 C 33.551 38 34 37.551 34 37 C 34 36.449 33.551 36 33 36 L 21 36 z M 51 40 C 57.065 40 62 44.935 62 51 C 62 57.065 57.065 62 51 62 C 44.935 62 40 57.065 40 51 C 40 44.935 44.935 40 51 40 z M 51 44 C 50.448 44 50 44.448 50 45 L 50 50 L 45 50 C 44.448 50 44 50.448 44 51 C 44 51.552 44.448 52 45 52 L 50 52 L 50 57 C 50 57.552 50.448 58 51 58 C 51.552 58 52 57.552 52 57 L 52 52 L 57 52 C 57.552 52 58 51.552 58 51 C 58 50.448 57.552 50 57 50 L 52 50 L 52 45 C 52 44.448 51.552 44 51 44 z M 15 50 C 14.449 50 14 50.449 14 51 L 14 53 C 14 53.551 14.449 54 15 54 C 15.551 54 16 53.551 16 53 L 16 51 C 16 50.449 15.551 50 15 50 z M 20 50 C 19.449 50 19 50.449 19 51 L 19 53 C 19 53.551 19.449 54 20 54 C 20.551 54 21 53.551 21 53 L 21 51 C 21 50.449 20.551 50 20 50 z M 25 50 C 24.449 50 24 50.449 24 51 L 24 53 C 24 53.551 24.449 54 25 54 C 25.551 54 26 53.551 26 53 L 26 51 C 26 50.449 25.551 50 25 50 z M 30 50 C 29.449 50 29 50.449 29 51 L 29 53 C 29 53.551 29.449 54 30 54 C 30.551 54 31 53.551 31 53 L 31 51 C 31 50.449 30.551 50 30 50 z M 35 50 C 34.449 50 34 50.449 34 51 L 34 53 C 34 53.551 34.449 54 35 54 C 35.551 54 36 53.551 36 53 L 36 51 C 36 50.449 35.551 50 35 50 z" stroke-linecap="round" />
            </g>
            </svg>
        </x-links.primary>
        @endauth
        <div class="mb-3">
            @foreach($posts as $post)
            <x-posts.card :post=$post />
            @endforeach
        </div>
        {{$posts->links()}}
    </div>  
</x-app-layout>