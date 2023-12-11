@if ($paginator->hasPages())



    @if ($paginator->onFirstPage())
    <a href="#" class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        {{-- <span aria-hidden="true">&lsaquo;</span> --}}
       <i class="fas fa-angle-double-left" ></i>
        </a>
   
@else
    
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
            {{-- &lsaquo; --}}
            <i class="fas fa-angle-double-left"></i>
        </a>
    
@endif

 {{-- Pagination Elements --}}
 @foreach ($elements as $element)
 {{-- "Three Dots" Separator --}}
 @if (is_string($element))
 <a href="#" class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
 @endif

 {{-- Array Of Links --}}
 @if (is_array($element))
     @foreach ($element as $page => $url)
         @if ($page == $paginator->currentPage())
         <a href="#" class="active" aria-current="page"><span>{{ $page }}</span></a>
         @else
             <a href="{{ $url }}">{{ $page }}</a>
         @endif
     @endforeach
 @endif
@endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
            <i class="fas fa-angle-double-right"></i>
        </a>
   
@else
        <a href="#" class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <i class="fas fa-angle-double-right"></i>
        </a>
@endif



    {{-- <a href="#"> <i class="fas fa-angle-double-left"></i></a> --}}
    {{-- <a href="#" class="active">1</a>
    <a href="#">2</a>
    <a href="#">3</a> --}}
    {{-- <a href="#"><i class="fas fa-angle-double-right"></i></a> --}}




@endif











