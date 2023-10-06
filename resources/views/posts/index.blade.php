<x-guest-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl">
                <div class="p-2 bg-white border-b border-gray-200">

                    <div>
                        <div class="flex w-full justify-between items-center sm:mb-2">
                            <h2 class="text-3xl pl-7 pt-7 font-extrabold tracking-tight text-gray-700 sm:text-4xl sm:mb-4"><a href="/">Book List</a> </h2>
                        </div>
                        <form action="{{ route('posts.search') }}" method="GET">
                            <div class="flex mb-4 justify-between items-center pr-8 pl-5">
                                <div class="block w-3/4">
                                    <div class="flex flex-col sm:flex-row justify-start items-center pl-2">
                                    <input type="search" name="keyword" class="form-control w-full sm:w-5/6 " type="text" value="@if (isset($keyword)) {{ $keyword }} @endif" placeholder="{{ __('Enter search keyword') }}">
                                    <button class="collapse sm:visible inline-block align-left text-base sm:w-20 rounded-xl border border-gray-700 bg-red-400 sm:p-2 sm:ml-4" type="submit">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if($posts ?? false)
                        <div class="container">
                            <div class="bg-white">
                              <div class="max-w-2xl mx-auto px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 lg:max-w-7xl lg:px-8 lg:grid-cols-1">
                                <div>

                                  <dl class="sm:mt-8 grid grid-cols-1 gap-x-6 gap-y-2 grid-cols-1 sm:grid-cols-7 sm:gap-y-2 lg:gap-x-8">

                                    <div class="border-t border-gray-200 sm:col-span-2">
                                      <dt class="text-sm sm:text-base sm:font-medium text-gray-900">
                                        {{ __('Title') }}
                                      </dt>
                                    </div>

                                    <div class="border-t border-gray-200 sm:col-span-4">
                                      <dt class="text-sm sm:text-base font-medium text-gray-900">
                                        {{ __('Body') }}
                                      </dt>
                                    </div>

                                    @foreach($posts as $post)

                                        <div class="border-t border-gray-200 pt-1 sm:col-span-2">
                                            <dd class="sm:mt-2 text-sm text-gray-500">
                                                <span class="block m-1">{{ $post->title }}</span>
                                            </dd>
                                        </div>

                                        <div class="border-t border-gray-200 pt-1 sm:col-span-4">
                                          <dd class="sm:mt-2 text-sm text-gray-500">
                                              <span class="block m-1 line-break">{{ $post->body }}</span>
                                          </dd>
                                        </div>

                                    @endforeach
                                  </dl>
                                </div>

                                  <div>
                                    {{ $posts->links() }}
                                  </div>

                              </div>
                            </div>
                        </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>