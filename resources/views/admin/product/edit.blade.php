@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('content')
    <div class="flex flex-col lg:flex-row space-y-10 lg:space-x-8 relative p-3 md:p-10">

        <a href="{{ route('product#list') }}" class="absolute left-2 md:left-6 lg:left-20 top-2 flex items-center">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        {{-- left --}}
        <div class="p-8 bg-white text-center lg:w-[30%] h-[440px] ">
            <h1 class="text-3xl font-bold capitalize mb-2"></h1>
            <h3 class="text-lg font-semibold mb-8"></h3>
            <div class="flex items-center justify-center mb-3">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="bg-contain w-44 ">
            </div>
            <form action="{{ route('product#upload', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <input type="file" name="image" id="image"
                        class="block mx-auto file:py-1 file:px-2 file:rounded-md file:border-0 file:bg-white file:text-sm file:font-semibold px-3 py-2 border w-72 lg:w-full text-sm rounded-lg bg-slate-200 focus:outline-none ring-0 @error('image') is-invalid @enderror ">
                    @error('image')
                        <small class="text-[#ff0000]">{{ $message }}</small>
                    @enderror
                </div>
                <button class="w-40 lg:w-full px-3 py-2 bg-yellow-500 font-semibold text-white rounded-lg"
                    type="submit">Upload
                    Photo</button>
            </form>
        </div>
        {{-- right --}}
        <div class=" bg-slate-50 text-start lg:w-[70%]">
            <div class="p-8 pb-0">
                <h1 class="text-4xl font-bold capitalize mb-10">Edit Product</h1>
                <h5 class=" font-bold border-b-yellow-500 border-b-2 inline-block">Product Info</h5>
            </div>
            <form action="{{ route('product#update') }}" method="get">
                @csrf
                <input type="hidden" name="productId" value="{{ $product->id }}">
                <div class="bg-white w-full p-8 grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="productName" class="font-semibold text-slate-500 text-sm tracking-wider">Name</label>
                        <input type="text" name="productName" id="productName"
                            value="{{ old('productName', $product->name) }}" placeholder="Enter product name"
                            class="w-full py-3 px-5 mt-3 placeholder:text-sm  border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('productName') is-invalid @enderror">
                        @error('productName')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="categoryName"
                            class="font-semibold text-slate-500 text-sm tracking-wider">Category</label>
                        <select type="text" name="categoryName" id="categoryName"
                            value="{{ old('categoryName', $product->category_id) }}" placeholder="Enter category name"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('categoryName') is-invalid @enderror">
                            <option value="">Choose Product's Category</option>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" @if($c->id == $product->category_id) selected @endif>{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('categoryName')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="price" class="font-semibold text-slate-500 text-sm tracking-wider">Price</label>
                        <input type="number" name="price" id="price"
                            value="{{ old('price', $product->price) }}" placeholder="Enter price"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('price') is-invalid @enderror">
                        @error('price')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="waitingTime" class="font-semibold text-slate-500 text-sm tracking-wider">Waiting
                            Time</label>
                        <input type="number" name="waitingTime" id="waitingTime"
                            value="{{ old('waitingTime', $product->waiting_time) }}" placeholder="Enter waiting time"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('waitingTime') is-invalid @enderror">
                        @error('waitingTime')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="font-semibold text-slate-500 text-sm tracking-wider ">Description</label>
                        <textarea name="description" id="description" cols="20" rows="10"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                        @error('description')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="createdAt"
                            class="font-semibold text-slate-500 text-sm tracking-wider">Created_at</label>
                        <input type="text" name="createdAt" id="createdAt"
                            value="{{ $product->created_at->format('j-F-Y') }}"
                            class="w-full font-bold  text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 disabled:bg-slate-200/70 disabled:text-slate-500"
                            disabled>
                    </div>
                </div>
                <div class="p-8 pt-0 flex justify-end">
                    <button type="submit" class="px-3 py-2 w-40 bg-yellow-500 text-white rounded-lg font-semibold">Update
                        info</button>
                </div>
            </form>
        </div>
    </div>
@endsection
