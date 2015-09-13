<!-- TOP10 列表面板 -->
<div class=" bg-info">
    <div class="info-base">
        <div class="info-title">
            <i class="fa fa-list-ol"></i>&nbsp;TOP 10
        </div>
        <ol class="top10">
            @foreach($tops as $v)
                <li><a href="/article/{{$v->id}}">{{$v->title}}</a></li>
            @endforeach
        </ol>
    </div>
</div>