<x-index-layout>
  @if (session('error'))
      <div class="alert alert-dangerm text-red-500 text-xl mb-10">
          {{ session('error') }}
      </div>
  @endif

  <div>
  <ul class="w-full divide-y divide-gray-400">
    @foreach($stock_books as $book)
    <li class="pt-4">
      <div class="flex justify-between">
        <a class="flex items-center space-x-4" href="{{ route('book.detail', ['id' => $book->stock_book_id]) }}">
          <div class="flex-shrink-0">
              @if(isset($book->image))
                <img src="{{ $book->image }}" class="cols-span-1" style="height:100px;"><br>
              @endif
          </div>
          <div class="flex flex-col space-y-2">
            <h1 class="cols-span-1 text-xl">{{ $book->title }}</h1>
            <p class="">{{ $book->author }}</p><br>
          </div>
        </a>
        <div class="mt-4 flex flex-col space-y-8 pr-4">
          <div >★★★</div>
          <div class="">{{ $book->author }}</div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
  {{ $bookPaginator->links() }}
</x-index-layout>
