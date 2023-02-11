@extends('admin.layouts.master')

@section('title', 'Product Create')

@section('content')
    <div class="flex items-center justify-center relative px-3 md:px-5 lg:px-0 mx-auto md:w-[600px]">
        <a href="{{ route('product#list') }}" class="absolute left-2 md:left-6 lg:left-0 top-10 flex items-center">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        <div class="bg-white rounded-2xl py-16 px-10 mt-20 w-full lg:w-[600px]">
            <h1 class="text-3xl font-semibold border-b pb-5 text-center cursor-default">Create Your Product</h1>
            <form action="{{ route('product#create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-10">
                    <label for="productName" class="text-lg font-semibold text-slate-600">Name</label>
                    <input type="text" name="productName" id="productName"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('productName') is-invalid @enderror"
                        placeholder="Enter Product Name">
                </div>
                @error('productName')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-10">
                    <label for="categoryName" class="text-lg font-semibold text-slate-600">Category</label>
                    <select type="text" name="categoryName" id="categoryName"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('categoryName') is-invalid @enderror"
                        placeholder="Seafood...">
                    <option value="" class="py-2">Choose Category</option>
                    @foreach ($categories as $c )
                    <option value="{{ $c->id }}" class="py-2">{{ $c->name }}</option>
                    @endforeach
                    </select>
                </div>
                @error('categoryName')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-10">
                    <label for="description" class="text-lg font-semibold text-slate-600">Description</label>
                    <textarea type="text" cols="30" rows="10" name="description" id="description"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('description') is-invalid @enderror"
                        placeholder="Enter Product's Description"></textarea>
                </div>
                @error('description')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-10">
                    <label for="image" class="text-lg font-semibold text-slate-600">Image</label>
                    <input type="file" name="image" id="image"
                        class="block file:py-1 file:bg-slate-200 file:px-2 file:rounded-md file:border-0  file:text-sm file:font-semibold px-3 py-2 border w-72 lg:w-full text-sm rounded-lg bg-white text-slate-600 focus:outline-none ring-0 @error('image') is-invalid @enderror">
                </div>
                @error('image')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-10">
                    <label for="price" class="text-lg font-semibold text-slate-600">Price</label>
                    <input type="number" name="price" id="price"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('price') is-invalid @enderror"
                        placeholder="Enter Product's Price">
                </div>
                @error('price')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-10">
                    <label for="waitingTime" class="text-lg font-semibold text-slate-600">Waiting Time</label>
                    <input type="number" name="waitingTime" id="waitingTime"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('waitingTime') is-invalid @enderror"
                        placeholder="Enter Waiting Time">
                </div>
                @error('waitingTime')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <button
                    class="w-full rounded-xl bg-black/90 text-white text-xl font-semibold text-center px-5 py-3 mt-5" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection
