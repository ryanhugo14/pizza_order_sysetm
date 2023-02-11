@extends('admin.layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <div class="flex flex-col lg:flex-row space-y-10 lg:space-x-8 relative p-3 md:p-10">

        <a href="{{ route('admin#details') }}" class="absolute left-2 md:left-6 lg:left-20 top-2 flex items-center">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        {{-- left --}}
        <div class="p-8 bg-white text-center lg:w-[30%] h-[440px] ">
            <h1 class="text-3xl font-bold capitalize mb-2">{{ $profile->name }}</h1>
            <h3 class="text-lg font-semibold mb-8">{{ $profile->email }}</h3>
            <div class="flex items-center justify-center mb-3">
                @if (Auth::user()->image == null)
                    @if (Auth::user()->gender == 'male')
                        <img src="{{ asset('image/default_male.jpg') }}" alt=""
                            class="bg-contain h-28 w-28 rounded-full ">
                    @else
                        <img src="{{ asset('image/default_female.jpg') }}" alt=""
                            class="bg-contain h-28 w-28 rounded-full ">
                    @endif
                @else
                    <img src="{{ asset('storage/'.Auth::user()->image) }}" alt=""
                        class="bg-contain h-28 w-28 rounded-full ">
                @endif
            </div>
            <form action="{{ route('admin#upload',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
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
            <h4 class="text-slate-500 text-xs mt-10">Member Since: <span
                    class="text-slate-600 font-bold ml-2">{{ $profile->created_at->format('j F Y') }}</span></h4>
        </div>
        {{-- right --}}
        <div class=" bg-slate-50 text-start lg:w-[70%]">
            <div class="p-8 pb-0">
                <h1 class="text-4xl font-bold capitalize mb-10">Edit Profile</h1>
                <h5 class=" font-bold border-b-yellow-500 border-b-2 inline-block">User Info</h5>
            </div>
            <form action="{{ route('admin#update') }}" method="get">
                @csrf
                <div class="bg-white w-full p-8 grid grid-cols-1 md:grid-cols-2 gap-5">
                    <input type="text" name="updateUserId" id="updateUserId" value="{{ $profile->id }}" class="hidden">
                    <div>
                        <label for="updateUserName"
                            class="font-semibold text-slate-500 text-sm tracking-wider">UserName</label>
                        <input type="text" name="updateUserName" id="updateUserName"
                            value="{{ old('updateUserName', $profile->name) }}" placeholder="Enter your name"
                            class="w-full py-3 px-5 mt-3 placeholder:text-sm  border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('updateUserName') is-invalid @enderror">
                        @error('updateUserName')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="updateEmail" class="font-semibold text-slate-500 text-sm tracking-wider">Email</label>
                        <input type="email" name="updateEmail" id="updateEmail"
                            value="{{ old('updateEmail', $profile->email) }}" placeholder="Enter your email"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('updateEmail') is-invalid @enderror">
                        @error('updateEmail')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="updatePhone" class="font-semibold text-slate-500 text-sm tracking-wider">Phone</label>
                        <input type="text" name="updatePhone" id="updatePhone"
                            value="{{ old('updatePhone', $profile->phone) }}" placeholder="Enter your phone"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('updatePhone') is-invalid @enderror">
                        @error('updatePhone')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="updateAddress"
                            class="font-semibold text-slate-500 text-sm tracking-wider">Address</label>
                        <input type="text" name="updateAddress" id="updateAddress"
                            value="{{ old('updateAddress', $profile->address) }}" placeholder="Enter your address"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('updateAddress') is-invalid @enderror">
                        @error('updateAddress')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="updateGender" class="font-semibold text-slate-500 text-sm tracking-wider">Gender</label>
                        <select name="gender" id="gender"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('gender') is-invalid @enderror">
                            <option value="" @if ($profile->gender == '') selected @endif>Choose your gender
                            </option>
                            <option value="male" @if ($profile->gender == 'male') selected @endif class="py-2">Male
                            </option>
                            <option value="female" @if ($profile->gender == 'female') selected @endif class="py-2">Female
                            </option>
                        </select>
                        @error('gender')
                            <small class="text-[#ff0000]">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="role" class="font-semibold text-slate-500 text-sm tracking-wider">Role</label>
                        <input type="text" name="role" id="role" value="{{ $profile->role }}"
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
