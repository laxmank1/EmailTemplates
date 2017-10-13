

 <div class="row">
            <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
                </div>
                <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">


@if ($paginator->hasPages())

    <ul class="pagination">

        {{-- Previous Page Link --}}

        @if ($paginator->onFirstPage())

        <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"> Previous</a></li>

        @else
           
              <li class="paginate_button page-item previous" id="dataTable_previous"><a href="{{ $paginator->previousPageUrl() }}" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">
             Previous</a></li>

        @endif


        {{-- Pagination Elements --}}

        @foreach ($elements as $element)

            {{-- "Three Dots" Separator --}}

            @if (is_string($element))

                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">
              {{ $element }}</a></li>

            @endif


            {{-- Array Of Links --}}

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())
                       <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a></li>

                    @else
                    <li class="paginate_button page-item"><a href="{{ $url }}" aria-controls="dataTable" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">
                     {{ $page }}</a></li>

                    @endif

                @endforeach

            @endif

        @endforeach


        {{-- Next Page Link --}}

        @if ($paginator->hasMorePages())
            <li class="paginate_button page-item next" id="dataTable_next"><a href="{{ $paginator->nextPageUrl() }}" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">
            Next →</a></li>

        @else
        <li class="paginate_button page-item next disabled" id="dataTable_next"><a href="{{ $paginator->nextPageUrl() }}" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">
          Next →</a></li>

        @endif

    </ul>
    </div
              ></div></div>


@endif