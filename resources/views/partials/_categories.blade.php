@inject('categories', 'App\Services\CategoryService')
<div class="widget catagory mb-50">
    <h6 class="widget-title mb-30">Categorii</h6>
        <div class="catagories-menu">
            <ul>
                <li @if (app('request')->input('categories_id') == NULL) class="active" @endif><a href="/shop">Toate</a></li>
                @foreach ($categories->getAvailable() as $category)
                    <li  @if (app('request')->input('categories_id') == $category->id) class="active" @endif><a href="/shop?categories_id={{ $category->id }}">{{$category->name}}</a></li>
                @endforeach
            </ul>
    </div>
</div>