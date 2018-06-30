<div class="col-lg-12 col-md-12 col-sm-12">

    <div class="sidebar-box-heading">
        <i class="icons icon-award-2"></i>
        <h4>{{ $title }}</h4>
    </div>

    <div class="sidebar-box-content">
        <table class="bestsellers-table">
            @foreach($products as $p)
                @if(empty($p->thumbImg()))
                    @continue
                @endif
            <tr>
                <td class="product-thumbnail"><a href="{{ route('frontend.product.detail', $p->slug) }}"><img src="{{ asset('storage/'. $p->thumbImg()->path_org) }}" alt="{{ $p->name }}"></a></td>
                <td class="product-info">
                    <p><a href="{{ route('frontend.product.detail', $p->slug) }}">{{ $p->name }}</a></p>
                    <span class="price">{{ number_format($p->price) }} đ</span>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>