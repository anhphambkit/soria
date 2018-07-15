<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="{{ $id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! $label !!}</button>
    <div class="dropdown-menu" aria-labelledby="{{ $id }}">
        @foreach($options as $option)
            <a
                class="dropdown-item"
                href="{{ $option['link'] }}"
                @if(isset($option['onclick']))
                    onclick="{{ $option['onclick'] }}"
                @endif
            >
                <?php echo $option['label']; ?>
            </a>
        @endforeach
    </div>
</div>