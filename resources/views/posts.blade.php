<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ' . Auth::user()->name) }}
        </h2>

        <a href="/dashboard">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color:black;">
            Create Article
            </button>
        </a>
    </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-6 p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-bold mb-4">All Posts</h1>
                     
                    <table class="table-auto">
                    <thead>
                        <tr>
                        <b>Heading</b>
                        </tr>
                    </thead>
                    <br>
                    <tbody >
                        <tr>
                        <p style="margin-left: 20px;">Articles</p>
                        </tr>
                        <!-- Add more rows for additional articles -->
                    </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
