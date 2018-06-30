<li class="@if($item->getItemClass()){{ $item->getItemClass() }}@endif @if($active)active @endif @if($item->hasItems())treeview @endif clearfix">
    <a href="{{ $item->getUrl() }}" class="@if(count($appends) > 0) hasAppend @endif" @if($item->getNewTab())target="_blank"@endif>
        @if($item->getIcon())
            <i class="{{ $item->getIcon() }}"></i>
        @endif
        <span>{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

        @if($item->hasItems())<i class="{{ $item->getToggleIcon() }} pull-right"></i>@endif
    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="nav-second-level">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
