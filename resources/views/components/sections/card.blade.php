<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 14:23
 */
?>
<?php
/** Check parameters */
$title = isset($title) ? $title : '';
$subTitle = isset($subTitle) ? $subTitle : '';
$content = isset($content) ? $content : '';
$controls = isset($controls) ? $controls : [];
$class = isset($class) ? $class : '';
$id = isset($id) ? $id : '';
?>
<section class="card {{ $class }}" id="{{ $id }}">
    @if(!empty($title) || sizeof($controls) > 0)
        <div class="card-header">
        @if(!empty($title))
            <h4 class="card-title">
                {{ $title }}
                @if(!empty($subTitle))
                    <small class="block">
                        {{ $subTitle }}
                    </small>
                @endif
            </h4>
        @endif
        @if(sizeof($controls) > 0)
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    @foreach($controls as $control)
                        @switch($control)
                            @case('collapse')
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                @break
                            @case('reload')
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                @break
                            @case('expand')
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                @break
                            @case('close')
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                @break
                            @case('edit')
                                <li><a data-action="edit"><i class="far fa-edit"></i></a></li>
                                @break
                        @endswitch
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @endif
    <div class="card-content collapse show">
        <div class="card-body">
            {{ $content }}
        </div>
    </div>
</section>