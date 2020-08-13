<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Thể loại</h4>
    <ul class="list cat-list">
        @foreach($cate as $ct)
            <li>
                <a href="#" class="d-flex">
                    <p>{{$ct->Ten}} </p>
                    <p>({{count($ct->typeNews)}})</p>
                </a>
            </li>
        @endforeach

    </ul>
</aside>
