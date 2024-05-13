<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ' . Auth::user()->name) }}
        </h2>

        <div class="flex">
            <a href="/create_artical" class="mr-4 text-white">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color:black;margin: 1px;">
                    Create Article
                </button>
            </a>
            <a href="/dashboard" class="text-white">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color:black;">
                All Posts
                </button>
            </a>
        </div>
    </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-6 p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-bold mb-4">My Posts</h1>
                     
                    @foreach($myposts as $mypost)
                        <div class="my-4 border rounded-md p-4">
                            <div class="flex justify-between items-center">
                            <h2 class="text-lg font-bold" style="font-size: 2rem;font-weight:bold;">{{ $mypost->title }}</h2>
                                <div class="flex">
                                    <!-- Update button -->
                                    <a href="{{ route('articles.edit', $mypost->id) }}" class="mx-2 text-blue-500 hover:text-blue-700">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color:green;margin: 1px;">
                                            Update
                                        </button>
                                    </a>
                                    <!-- Delete button -->
                                    <form action="{{ route('articles.delete', $mypost->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="mt-2">{{ $mypost->content }}</p>
                            <p class="text-sm text-gray-600 mt-2">Written By {{ $mypost->author_name }}</p>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
