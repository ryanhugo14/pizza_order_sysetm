@extends('admin.layouts.master')

@section('title', 'Category Edit')

@section('content')
    <div class="flex items-center justify-center relative px-3 md:px-5 lg:px-0 mx-auto md:w-[600px]">
        <a href="{{ route('category#list') }}" class="absolute left-2 md:left-6 lg:left-0 top-10 flex items-center">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        <div class="bg-white rounded-2xl py-16 px-10 mt-20 w-full lg:w-[600px]">
            <h1 class="text-3xl font-semibold border-b pb-5 text-center cursor-default">Create Your Category</h1>
            <form action="{{ route('category#update') }}" method="post">
                @csrf
                <div class="mt-10">
                    <label for="categoryName" class="text-lg font-semibold text-slate-600">Name</label>
                    <input type="hidden" name="categoryId" value="{{ $category->id }}">
                    <input type="text" name="categoryName" id="categoryName" value="{{ old('categoryName',$category->name) }}"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('categoryName') is-invalid @enderror"
                        placeholder="Seafood...">
                </div>
                @error('categoryName')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <button
                    class="w-full rounded-xl bg-black/90 text-white text-xl font-semibold text-center px-5 py-3 mt-5" type="submit">Upadate</button>
            </form>
        </div>
    </div>
@endsection
