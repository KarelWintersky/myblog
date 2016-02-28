@if ($breadcrumbs)
    <aside class="container">
        <ul class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->last)
                    <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="active">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
    </aside>
@endif