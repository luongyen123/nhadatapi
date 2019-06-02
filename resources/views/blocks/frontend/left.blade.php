<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="panel box-side-bar">
            <div class="panel-heading text-uppercase header">
                <h3 class="panel-title"><a href="/muaban-bds/{{$gialam[0]->qh_slug}}">Nhà đất {{$gialam[0]->tenqh}}</a></h3>
            </div>
            <div class="panel-body" style="
            margin-left: -50px;">
                <ul class="menu-sidebar">
                    @foreach($gialam as $value)
                        <li> <a href="/muaban/{{$value->slug}}"> Mua bán Nhà Đất {{$value->tenxa}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="panel box-side-bar">
                <div class="panel-heading text-uppercase header">
                        <h3 class="panel-title"><a href="/muaban-bds/{{$longbien[0]->qh_slug}}">Nhà đất {{$longbien[0]->tenqh}}</a></h3>
                </div>
                <div class="panel-body" style="
                margin-left: -50px;">
                    <ul class="menu-sidebar">
                        @foreach($longbien as $value)
                            <li> <a href="/muaban/{{$value->slug}}"> Mua bán Nhà Đất {{$value->tenxa}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>              
    </div>
