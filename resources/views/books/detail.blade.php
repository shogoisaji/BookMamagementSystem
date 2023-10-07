<x-index-layout>
  <div class="flex flex-col sm:flex-row justify-between">
    <div class="col ml-4 mb-6">
      @if(isset($stock_book->image))
        <img src="{{ $stock_book->image }}" class="mt-4 cols-span-1" style="height:300px; object-fit: cover;"><br>
      @else
        <lottie-player src="{{ asset('animations/no_book.json') }}" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
      @endif
      <div class="flex flex-col space-y-2">
        <h1 class="cols-span-1 text-2xl">{{ $stock_book->title }}</h1>
        <div class="">{{ $stock_book->author }}</div>
      </div>
      <div class="mt-4 flex space-x-8 pr-4">
        <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded px-2 py-1" type="button">
          Rental
        </button>
        <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="items-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-sm max-h-full mx-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Rental Check
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="staticModal">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex">
                      <div class="p-6 space-y-6">
                        <p class="text-lg leading-relaxed font-semibold text-blue-500">貸出日 : {{ now()->format('Y/m/d') }}
                        </p>
                        <p class="text-lg leading-relaxed font-semibold text-red-500">返却日 : {{ now()->addDays(7)->format('Y/m/d') }}
                        </p>
                      </div>
                      <lottie-player src="{{ asset('animations/dog_walk.json') }}" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay class="-ml-8 -mr-2"></lottie-player>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-col items-end p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <form method="POST" action="{{ route('rental', ['id' => $stock_book->stock_book_id]) }}">
                          @csrf
                          <button type="submit" class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded px-2 py-1">
                            Rental
                          </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('searchForm') }}">
            @csrf
            <button type="submit" class="shadow-lg bg-red-500 shadow-red-500/50 text-white rounded px-2 py-1">
              Add Comment
            </button>
        </form>
      </div>
    </div>
    <div class="col ml-10">
      <div class="pl-2 text-gray-500 font-semibold text-lg">
        Comments
      </div>
      <div class=" block bg-gray-100 p-6 rounded-2xl scrollbar-hide border-4 border-gray-500/70" style="overflow-y: auto; min-height:300px; min-width:350px; max-height: 500px; max-width: 450px; ">
        @foreach($stock_book->comments as $comment)
        <div class="block max-w-md p-6 mb-3 bg-white border border-gray-200 rounded-lg shadow">
            <h1 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $comment->comment }}</h1>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $comment->user->name }}</p>
            <div class="text-yellow-400 text-3xl">
              @for ($i = 0; $i < $comment->recommend + 1; $i++)
                  ★
              @endfor
            </div>
        </div>
        @endforeach
      </div>
    </div>
    <p class="text-mg">{{ $stock_book->auther }}</p>
  </div>
</x-index-layout>
