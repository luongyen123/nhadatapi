<footer>
        <div class="row content top-footer">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h3 class="tt-footer">Bất Động Sản Quang Minh land
                 <div class="body-footer"></div>
                </h3>
                <p>Địa chỉ: Số T97A, Lô B4 - 23, Khu đô 31HA,<br>Công Ty Cổ phần Tư Vấn
                        Quy hoạch & Phát Triển Công nghệ Á Châu Hà Nội</p>
                <p>Hotline: 01655302396 - 02436760659 - 0868247959</p>
                <p>Email: nhadatachau2018@gmail.com</p>
                <p>Website: http://nhadatachau.vn/</p>
                <p>Fanpage: https://www.facebook.com/nhadatachau333/</p>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <h3 class="panel-title text-uppercase"><a href="/muaban-bds/{{$gialam[0]->qh_slug}}">Nhà đất {{$gialam[0]->tenqh}}</a></h3>
                 <div class="body-footer"></div>
                
                <ul class="menu-footer">
                    @foreach($gialam as $value)
                        <li> <a href="/muaban/{{$value->slug}}"> Mua bán Nhà Đất {{$value->tenxa}}</a></li>
                    @endforeach
                    
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                 <h3 class="panel-title text-uppercase"><a href="/muaban-bds/{{$longbien[0]->qh_slug}}">Nhà đất {{$longbien[0]->tenqh}}</a></h3>
                 <div class="body-footer"></div>
                
                <ul class="menu-footer">
                    @foreach($longbien as $value)
                        <li> <a href="/muaban/{{$value->slug}}"> Mua bán Nhà Đất {{$value->tenxa}}</a></li>
                    @endforeach
                </ul>

            </div>
        </div>
    </footer>  