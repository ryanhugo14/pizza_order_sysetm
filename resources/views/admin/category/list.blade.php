@extends('admin.layouts.master')

@section('title', 'Category List')

@section('content')

    <div class="p-3 pt-10 md:p-8 lg:p-16 ">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center space-y-5 lg:space-y-0">
            <h1 class="text-4xl font-semibold">Catetory List</h1>
            <div class="flex space-x-3">
                <a href="{{ route('category#createPage') }}">
                    <button class="px-5 py-2 bg-green-500 hover:bg-green-600 text-white text-lg lg:text-xl font-semibold"><i
                            class="fa-solid fa-plus mr-2"></i>Add Category</button>
                </a>
                <button class="px-5 py-2 bg-green-500 hover:bg-green-600 text-white text-lg lg:text-xl font-semibold">CV
                    Download</button>
            </div>
        </div>
        @if (session('deleteSuccess'))
            <div class="flex justify-start lg:justify-end mt-5">
                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 w-full md:w-[60%] lg:w-[40%]"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3  text-sm font-medium text-red-700 dark:text-red-800">{{ session('deleteSuccess') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <div class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center space-y-3 md:space-y-0">
            <div class="flex items-center">
                <h3 class="text-xl font-semibold flex md:justify-center items-center">Total -</h3>
                <h3 class="text-xl font-semibold ml-2 bg-black rounded-full w-9 h-9 text-white flex items-center justify-center"><span>{{ $categories->total() }}</span></h3>
            </div>
            <form action="{{ route('category#list') }}" method="GET">
                @csrf
                <div class="flex">
                    <input name="key" type="text" placeholder="Search" value="{{ request('key') }}"
                        class="px-5 py-2 focus:ring-0  rounded-r-none rounded-lg focus:border-yellow-500">
                    <button type="submit" class="px-3 py-2 bg-black text-white rounded-l-none rounded-lg">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

        @if (count($categories) != 0)
            <table class="mt-5 lg:mt-10 w-[100%] text-center ">
                <tr class="columns-12">
                    <th class="uppercase">ID</th>
                    <th class="uppercase col-span-4">Name</th>
                    <th class="uppercase">Created Date</th>
                    <th class=""></th>
                </tr>
                @foreach ($categories as $category)
                    <tr class="border border-spacing-10 columns-12">
                        <td class="p-3 lg:p-5">{{ $category->id }}</td>
                        <td class="p-3 lg:p-5">{{ $category->name }}</td>
                        <td class="p-3 lg:p-5">{{ $category->created_at->format('j-F-Y') }}</td>
                        <td class="p-3 lg:p-5">
                            <div class="flex flex-col md:flex-row justify-end space-y-1 md:space-y-0 md:space-x-5">
                                {{-- <button
                                    class="bg-slate-300 hover:bg-slate-200 md:w-10 md:h-10 rounded-full p-2 flex justify-center items-center">
                                    <i class="fa-regular fa-eye text-sm md:text-md"></i>
                                </button> --}}
                                <a href="{{ route('category#edit', $category->id) }}">
                                    <button
                                    class="bg-slate-300 hover:bg-slate-200 md:w-10 md:h-10 rounded-full p-2 flex justify-center items-center">
                                    <i class="fa-solid fa-pen-to-square text-sm md:text-md"></i>
                                </button>
                                </a>
                                <a href="{{ route('category#delete', $category->id) }}">
                                    <button
                                        class="bg-slate-300 hover:bg-slate-200 md:w-10 md:h-10 rounded-full p-2 flex justify-center items-center">
                                        <i class="fa-solid fa-trash text-sm md:text-md"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="mt-5">
                {{ $categories->links() }}
            </div>
        @else
            <h1 class="text-5xl font-bold text-slate-500 mt-20 text-center">There is no Category here.</h1>
        @endif
    </div>

@endsection
