<x-app-layout>
    <x-slot name="header">
        {{ __('Create Post') }}
    </x-slot>
    <div class="container mx-auto max-w-6xl px-4 py-5">
        <form method="POST" action="{{route('user-posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <x-forms.label for="title">Title</x-forms.label>
                <x-forms.input id="title" name="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="mb-3">
                <x-forms.label for="categories">Categories</x-forms.label>
                <x-forms.select :categories="$categories"/>
                <x-input-error :messages="$errors->get('categories')" class="mt-2" />
            </div>
            <div class="mb-3">
                <x-forms.label for="tags">Tags (comma separated values: eg. happy,fyp)</x-forms.label>
                <x-forms.input id="tags" name="tags" />
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>
            <div class="mb-3">
                <x-forms.label for="description">Description</x-forms.label>
                <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mb-3">   
                <x-forms.label for="file_input">Upload file</x-forms.label>
                <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <x-primary-button>Submit</x-primary-button>
        </form>

    </div>
</x-app-layout>