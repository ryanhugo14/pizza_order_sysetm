@extends('admin.layouts.master')

@section('title', 'Customer Message')

@section('content')

    <div class="p-3 pt-10 md:p-8 lg:p-16 ">
        <div class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center space-y-3 md:space-y-0">
            <div class="flex items-center">
                <h3 class="text-xl font-semibold flex md:justify-center items-center">Total -</h3>
                <h3
                    class="text-xl font-semibold ml-2 bg-black rounded-full w-9 h-9 text-white flex items-center justify-center">
                    <span></span>{{ $message->total() }}
                </h3>
            </div>
            <form action="{{ route('user#message') }}" method="GET">
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
        <div class="mt-5">
            <button class="text-xl font-semibold bg-black text-white py-1 px-5 hover:bg-black/90" id="deleteMessage">Delete
                All</button>
        </div>


        @if (count($message) != 0)
            <div class=" overflow-x-scroll lg:overflow-visible">
                <table class="mt-5 lg:mt-10  text-center table-auto w-[150%] md:w-[120%] lg:w-[100%]" id="dataTable">
                    <tr class="columns-12">
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Name</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Email</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Message</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Date</th>
                        <th class=""></th>
                    </tr>
                    @foreach ($message as $m)
                        <tr class="border columns-12 h-20 lg:h-32">
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $m->name }}</td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $m->email }}</td>
                            <td class=" cursor-default">
                                <textarea name="" id=""
                                    class=" w-60 h-20 md:h-32 text-[12px] md:text-sm lg:text-lg border border-slate-100 rounded-md cursor-default" cols="10"
                                    rows="5">{{ $m->message }}</textarea>
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default capitalize">
                                {{ $m->created_at->format('j-F-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="mt-5">
                {{ $message->links() }}
            </div>
        @else
            <h1 class="text-5xl font-bold text-slate-500 mt-20 text-center">There is no Message here.</h1>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#deleteMessage').click(function() {
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/customer/message/delete',
                    data: {
                        'delete': 'delete'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = 'http://localhost:8000/customer/message'
                        }
                    }
                })
            })
        })
    </script>
@endsection
