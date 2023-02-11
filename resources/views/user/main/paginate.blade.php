     <div class="grid grid-cols-2 md:grid-cols-3 mt-10 gap-7" id="dataList">
         @foreach ($pizza as $p)
             <div class="w-full lg:w-72 shadow-lg overflow-hidden rounded-lg">
                 <div class="w-full lg:w-72 md:h-52 h-32 relative mainShowIcon" id="mainShowIcon">
                     <img src="{{ asset('storage/' . $p->image) }}" class="w-full lg:w-72 object-cover md:h-52  h-32"
                         alt="">
                     <div
                         class="bg-white/50 lg:w-72 md:h-52 w-full h-32 absolute top-0 flex justify-center items-center space-x-2 iconHidden showIcon transition duration-100 ease-in-out">
                         <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                             href="#">
                             <i class="fa-solid fa-cart-shopping"></i>
                         </a>
                         <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                             href="{{ route('pizza#detailPage', $p->id) }}" id="info">
                             <i class="fa-solid fa-circle-info"></i>
                         </a>
                         <input type="hidden" value="{{ $p->id }}" id="pizzaId">
                     </div>
                 </div>
                 <div class="px-4 py-2 pb-3">
                     <h1 class="text-2xl font-semibold mt-5 cursor-default">{{ $p->name }}</h1>
                     <h3 class="text-md font-semibold text-slate-600 mt-2 cursor-default">
                         {{ $p->price }} MMK</h3>
                 </div>
             </div>
         @endforeach
     </div>
     <div class="mt-5">
         {{ $pizza->links() }}
     </div
