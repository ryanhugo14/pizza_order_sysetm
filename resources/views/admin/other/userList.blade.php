@extends('admin.layouts.master')

@section('title', 'Order List')

@section('content')

    <div class="p-3 pt-10 md:p-8 lg:p-16 ">
        <div class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center space-y-3 md:space-y-0">
            <div class="flex items-center">
                <h3 class="text-xl font-semibold flex md:justify-center items-center">Total -</h3>
                <h3
                    class="text-xl font-semibold ml-2 bg-black rounded-full w-9 h-9 text-white flex items-center justify-center">
                    <span></span>{{ $users->total() }}
                </h3>
            </div>
            <form action="{{ route('order#sortingStatus') }}" method="GET">
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


        @if (count($users) != 0)
            <div class=" overflow-x-scroll lg:overflow-visible">
                <table class="mt-5 lg:mt-10  text-center table-auto w-[150%] md:w-[120%] lg:w-[100%]" id="dataTable">
                    <tr class="columns-12">
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Image</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Name</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Email</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Address</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Gender</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Role</th>
                        <th class=""></th>
                    </tr>
                    @foreach ($users as $u)
                        <tr class="border columns-12 h-20 lg:h-32">
                            <input type="hidden" value="{{ $u->id }}" id="userId">
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">
                                @if ($u->image == null)
                                    @if ($u->gender == 'male')
                                        <img src="{{ asset('image/default_male.jpg') }}" alt=""
                                            class="bg-contain w-20 md:w-28 lg:w-32 mx-auto">
                                    @else
                                        <img src="{{ asset('image/default_female.jpg') }}" alt=""
                                            class="bg-contain w-20 md:w-28 lg:w-32 mx-auto">
                                    @endif
                                @else
                                    <img src="{{ asset('storage/' . $u->image) }}" alt=""
                                        class="bg-contain w-20 md:w-28 lg:w-32 mx-auto">
                                @endif
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $u->name }}</td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $u->email }}</td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $u->address }}</td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default capitalize">{{ $u->gender }}
                            </td>
                            <td class=" cursor-default">
                                <select name="role" id="role"
                                    class="border-none shadow-lg text-[12px] md:text-sm lg:text-lg">
                                    <option value="admin" @if ($u->role == 'admin') selected @endif>Admin</option>
                                    <option value="user" @if ($u->role == 'user') selected @endif>User</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="mt-5">
                {{ $users->links() }}
            </div>
        @else
            <h1 class="text-5xl font-bold text-slate-500 mt-20 text-center">There is no User here.</h1>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                $role = $('#role').val();
                $parentNode = $(this).parents('tr');
                $userId = $parentNode.find('#userId').val();
                $data = {
                    'role': $role,
                    'userId': $userId
                }


                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/role/change',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response[0].status == 'success') {
                            window.location.href = "http://localhost:8000/user/list";
                        }
                    }
                })
            })
        })
    </script>
@endsection
