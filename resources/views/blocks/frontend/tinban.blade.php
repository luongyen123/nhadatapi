<div class="panel-body tintuc row">
        @foreach($tinban as $tin)
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-commom">
            <div class="thumbnail">
                <a href="/tinban/{{$tin->slug}}"><img src="{{$tin->anhdaidien}}" alt="" /></a>
                <div class="caption">
                    <h3 class="tintuc-title">
                        <a href="/tinban/{{$tin->slug}}">{{$tin->tieude}}</a>
                    </h3>
                    <ul class="list-tintuc">
                        <li><div class="price"><span class="icon-product"><i class="fas fa-dollar-sign"></i></span> Giá: <span class="price-Gia">{{$tin->gia}}{{$tin->tiente}}</span></div>
                        </li>
                        <li><div class="price"><span class="icon-product"><i class="fas fa-star"></i></span> Diện tích: {{$tin->dientich}}{{$tin->dvdt}}</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>