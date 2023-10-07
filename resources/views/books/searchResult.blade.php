<x-registration-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if (session('error'))
      <div class="alert alert-dangerm text-red-500 text-xl mb-10">
          {{ session('error') }}
      </div>
    @endif
        @foreach($books as $book)
            @if(isset($book[0]->volumeInfo))
            <div>
            <div class="grid grid-row-2">
                <div class="grid grid-cols-2">
                    <div class="grid grid-row-2">
                    <h1 class="cols-span-1 text-3xl">{{ $book[0]->volumeInfo->title }}</h1>
                    <p class="">{{ $book[0]->volumeInfo->authors[0] }}</p><br>
                    </div>
                @if(isset($book[0]->volumeInfo->imageLinks->thumbnail))
                    <img src="{{ $book[0]->volumeInfo->imageLinks->thumbnail }}" class="cols-span-1"><br>
                @endif
                </div>
            <div>
                <p class="">{{ $book[0]->volumeInfo->publishedDate }}</p>
            </div>
            </div>
            <br><br>
            </div>
            @endif
            @endforeach
        </div>
</x-registration-layout>
