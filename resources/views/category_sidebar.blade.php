<aside class="widget widget-categories box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Categories</h6>
    <div id="cat-treeview" class="product-cat">
        <ul class="treeview">
            @foreach ($categories as $category)
            <a href="{{url('shop/' . $category->curl)}}">{{$category->ctitle}}</a>
            <br>
            <br>
            @endforeach
        </ul>
    </div>
</aside>
