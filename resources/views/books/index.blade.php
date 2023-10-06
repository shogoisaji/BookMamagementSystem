<x-index-layout>
  @foreach($books as $book)
  <div>
  <div class="grid grid-row-2">
    <div class="grid grid-cols-2">
        <div class="grid grid-row-2">
          <h1 class="cols-span-1 text-3xl">{{ $book->volumeInfo->title }}</h1>
          <p class="">{{ $book->volumeInfo->authors[0] }}</p><br>
        </div>
      @if(isset($book->volumeInfo->imageLinks->thumbnail))
          <img src="{{ $book->volumeInfo->imageLinks->thumbnail }}" class="cols-span-1"><br>
      @endif
    </div>
  <div>
    <p class="">{{ $book->volumeInfo->publishedDate }}</p>
  </div>
  </div>
  <br><br>
  @endforeach
  {{ $bookPaginator->links() }}
</x-index-layout>
