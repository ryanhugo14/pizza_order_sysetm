@extends('admin.layouts.master')

@section('title', 'Edit Role')

@section('content')
    <div class="flex flex-col lg:flex-row space-y-10 lg:space-x-8 relative p-3 md:p-10">

        <a href="{{ route('admin#listPage') }}" class="absolute left-2 md:left-6 lg:left-20 top-2 flex items-center">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        {{-- left --}}
        <div class="p-8 bg-white text-center lg:w-[30%] h-[400px] flex items-center justify-center">
            <div>
                <div class="flex items-center justify-center mb-3">
                @if ($admin->image == null)
                    @if ($admin->gender == 'male')
                        <img src="{{ asset('image/default_male.jpg') }}" alt=""
                            class="bg-contain h-40 w-40 rounded-full ">
                    @else
                        <img src="{{ asset('image/default_female.jpg') }}" alt=""
                            class="bg-contain h-40 w-40 rounded-full ">
                    @endif
                @else
                    <img src="{{ asset('storage/'.$admin->image) }}" alt=""
                        class="bg-contain h-40 w-40 rounded-full ">
                @endif
            </div>
            <h4 class="text-slate-500 text-xs mt-10">Member Since: <span
                    class="text-slate-600 font-bold ml-2">{{ $admin->created_at->format('j F Y') }}</span></h4>
            </div>
        </div>
        {{-- right --}}
        <div class=" bg-slate-50 text-start lg:w-[70%]">
            <div class="p-8 pb-0">
                <h1 class="text-4xl font-bold capitalize mb-10">{{ $admin->name }}'s Profile</h1>
                <h5 class=" font-bold border-b-yellow-500 border-b-2 inline-block">User Info</h5>
            </div>
            <form action="{{ route('admin#remove') }}" method="get">
                @csrf
                <div class="bg-white w-full p-8 grid grid-cols-1 md:grid-cols-2 gap-5">
                    <input type="text" name="id" id="id" value="{{ $admin->id }}" class="hidden">
                    <div>
                        <label for="updateUserName"
                            class="font-semibold text-slate-500 text-sm tracking-wider">UserName</label>
                        <input type="text" name="updateUserName" id="updateUserName"
                            value="{{ old('updateUserName', $admin->name) }}" placeholder="Enter your name"
                            class="w-full py-3 px-5 mt-3 placeholder:text-sm  border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 disabled:bg-slate-200/70 disabled:text-slate-500" disabled >
                    </div>
                    <div>
                        <label for="updateEmail" class="font-semibold text-slate-500 text-sm tracking-wider">Email</label>
                        <input type="email" name="updateEmail" id="updateEmail"
                            value="{{ old('updateEmail', $admin->email) }}" placeholder="Enter your email"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 disabled:bg-slate-200/70 disabled:text-slate-500" disabled>
                    </div>
                    <div>
                        <label for="updatePhone" class="font-semibold text-slate-500 text-sm tracking-wider">Phone</label>
                        <input type="text" name="updatePhone" id="updatePhone"
                            value="{{ old('updatePhone', $admin->phone) }}" placeholder="Enter your phone"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 disabled:bg-slate-200/70 disabled:text-slate-500" disabled>
                    </div>
                    <div>
                        <label for="updateAddress"
                            class="font-semibold text-slate-500 text-sm tracking-wider">Address</label>
                        <input type="text" name="updateAddress" id="updateAddress"
                            value="{{ old('updateAddress', $admin->address) }}" placeholder="Enter your address"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 disabled:bg-slate-200/70 disabled:text-slate-500" disabled>
                    </div>
                    <div>
                        <label for="updateGender" class="font-semibold text-slate-500 text-sm tracking-wider">Gender</label>
                        <input name="gender" id="gender" value="{{ $admin->gender }}"
                            class="w-full font-semibold text-black text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 disabled:bg-slate-200/70 disabled:text-slate-500" disabled>
                    </div>
                    <div>
                        <label for="role" class="font-semibold text-slate-500 text-sm tracking-wider">Role</label>
                        <select type="text" name="role" id="role"
                            class="w-full font-bold  text-slate-500 text-sm  py-3 px-5 mt-3 placeholder:text-sm border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500"
                            >
                            <option value="admin"  @if ($admin->role == 'admin') selected @endif>admin</option>
                            <option value="user"  @if ($admin->role == 'user') selected @endif>user</option>
                        </select>
                    </div>
                </div>
                <div class="p-8 pt-0 flex justify-end">
                    <button type="submit" class="px-3 py-2 w-40 bg-yellow-500 text-white rounded-lg font-semibold">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
