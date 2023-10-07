<x-index-layout>
    <div class="flex flex-col sm:flex-row justify-between">
      <div class="col mb-6">
        @if(isset($stock_book->image))
          <img src="{{ $stock_book->image }}" class="mt-4 cols-span-1" style="height:300px; object-fit: cover;"><br>
        @endif
        <div class="flex flex-col space-y-2">
          <h1 class="cols-span-1 text-xl">{{ $stock_book->title }}</h1>
          <div class="">{{ $stock_book->author }}</div>
        </div>
      </div>
      <div class="col ">
        <div class="pl-2 text-gray-500 font-semibold text-lg">
          Comments
        </div>
        <div class=" md:block bg-gray-100 p-4 rounded-2xl scrollbar-hide border-4 border-gray-500/70" style="overflow-y: auto; max-height: 250px; max-width: 350px; ">
          <div class="block max-w-sm p-6 mb-3 bg-white border border-gray-200 rounded-lg shadow">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">面白かった</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
          </div>
          <div class="block max-w-sm p-6 mb-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">とても面白かった</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
          </div>
          <div class="block max-w-sm p-6 mb-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">すごく面白かった</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
          </div>
        </div>
        <div class="mt-4 pl-2 text-gray-500 font-semibold text-lg">
          Recommend
        </div>
        <div class="md:block bg-gray-100 p-4 rounded-2xl scrollbar-hide border-4 border-gray-500/70 text-center">
          <div class="text-yellow-400 text-3xl">
            ★★★★★
          </div>
        </div>
      </div>
      <p class="">{{ $stock_book->auther }}</p>
    </div>
    </div>
</x-index-layout>
