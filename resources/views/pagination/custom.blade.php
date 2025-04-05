{{--  @if ($paginator->hasPages())
    <ul class="pagination">
        <!-- Pulsante Precedente -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo; Precedente</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Precedente</a></li>
        @endif

        <!-- Pagine: Mostra solo un range di 4 pagine -->
        @php
            $start = max(1, $paginator->currentPage() - 2); // Inizio: massimo tra 1 e la pagina corrente - 2
            $end = min($start + 3, $paginator->lastPage()); // Fine: massimo tra (start + 3) e l'ultima pagina
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $paginator->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        <!-- Pulsante Successivo -->
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Successivo &raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link"> Successivo &raquo;</span></li>
        @endif
    </ul>
@endif --}}



<div class="container">
    @if ($paginator->hasPages())
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li>Precedente</li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"> Precedente</a></li>
            @endif
            <!-- Pagine: Mostra solo un range di 4 pagine -->
            @php
                $start = max(1, $paginator->currentPage() - 2); // Inizio: massimo tra 1 e la pagina corrente - 2
                $end = min($start + 3, $paginator->lastPage()); // Fine: massimo tra (start + 3) e l'ultima pagina
            @endphp
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $paginator->currentPage())
                    <li><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endfor
            <!-- Pulsante Successivo -->
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                        Successivo
                    </a>
                </li>
            @else
                <li>
                    <span> 
                        Successivo
                    </span>
                </li>
            @endif
        </ul>
    @endif

    </ul>
</div>
