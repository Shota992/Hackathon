<div class="flex justify-center mt-8 mb-20">
  <ul class="flex gap-4">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
          <li class="text-sm px-3 py-1.5 bg-gray-200 text-gray-400 rounded">Prev</li>
      @else
          <li>
              <a href="{{ $paginator->previousPageUrl() }}"
                  class="text-sm px-3 py-1.5 bg-gray-600 text-white rounded">Prev</a>
          </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
          @if ($page == $paginator->currentPage())
              <li>
                  <a href="#" class="px-4 py-2 bg-gray-700 text-white rounded">{{ $page }}</a>
              </li>
          @else
              <li>
                  <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 rounded">{{ $page }}</a>
              </li>
          @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
          <li>
              <a href="{{ $paginator->nextPageUrl() }}"
                  class="text-sm px-3 py-1.5 bg-gray-600 text-white rounded">Next</a>
          </li>
      @else
          <li class="text-sm px-3 py-1.5 bg-gray-200 text-gray-400 rounded">Next</li>
      @endif
  </ul>
</div>
