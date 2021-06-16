{{-- resources/views/vendor/pagination/default.blade.php --}}
@if ($paginator->hasPages())
<div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
    <span class="flex items-center col-span-3">
        <p class="text-sm leading-5 dark:text-gray-300">
            {{ __('pagination.showing') }}
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {{ __('pagination.to') }}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
            {{ __('pagination.of') }}
                <span class="font-medium">{{ $paginator->total() }}</span>
            {{ __('pagination.results') }}
        </p>
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
      <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
          <li>
            @if ($paginator->onFirstPage())
            <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
            @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple hover:bg-purple-700 hover:text-white" aria-label="Previous">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </a>
            @endif
          </li>
          {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                <span
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-400 bg-white border border-gray-300 cursor-default dark:text-gray-200 dark:bg-secondary-700 dark:border-secondary-600">{{ $element }}</span>
                </span>
                @endif

                {{-- Array Of Links Disable --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        {{-- <span aria-current="page">
                        <span
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-400 bg-white border border-gray-300 dark:text-gray-400 dark:border-secondary-600 dark:bg-secondary-700">{{ $page }}p</span>
                        </span> --}}
                        <li>
                            <button class="px-3 mx-1 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                              {{$page}}
                            </button>
                        </li>
                        @else
                        {{-- Array Of Links Enable --}}
                        <li>
                            <a href="{{ $url }}">
                                <button class="px-3 mx-1 py-1 rounded-md focus:outline-none focus:shadow-outline-purple hover:bg-purple-600 hover:text-white">
                                    {{ $page }}
                                </button>
                            </a>
                          </li>
                        @endif
                    @endforeach
                    @endif
            @endforeach
          <li>
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple hover:bg-purple-700 hover:text-white" aria-label="Next">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </a>
            @else
            <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
            @endif
          </li>
        </ul>
      </nav>
    </span>
  </div>
@endif