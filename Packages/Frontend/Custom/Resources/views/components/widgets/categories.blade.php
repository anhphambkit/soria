<!-- Categories -->
<div class="row sidebar-box purple">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="sidebar-box-heading">
            <i class="icons icon-folder-open-empty"></i>
            <h4>Categories</h4>
        </div>

        <div class="sidebar-box-content">
            <ul>
                @foreach(config('frontend.home.categories') as $slug)
                    <?php $cat = $catServices->filter(['slug'  => $slug ])->first(); ?>
                    <li><a href="{{ $cat->slug }}">{{ $cat->name }} <i class="icons icon-right-dir"></i></a></li>
                @endforeach
                <li><a class="purple" href="#">All Categories</a></li>
            </ul>
        </div>

    </div>

</div>
<!-- /Categories -->