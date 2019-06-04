<header>
        <div class="header-top">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <a href="/">
                        <img src="{{asset('../logo.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-5 col-md-3 col-sm-4 hidden-xs">
                    <div class="search-header hidden-xs">
                        <form action="">
                            <input type="text" class="form-control field" name="s" id="s" placeholder="tìm kiếm nhà đất...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 hidden-xs">
                    <div class="call-header">
                        <img src="{{asset('../phone.png')}}">
                        <span class="title-phone">Miễn Phí Mô Giới</span>
                        <span class="hotline-phone">01655302396</span>
                    </div>
                </div>
            </div>
        </div>
</header>
<nav class="navbar header text-uppercase ">
        <ul class="nav navbar-nav font-weight-bold">
            <li class="active">
                <a href="/"  class="header">Trang chủ</a>
            </li>
            @foreach($theloai as $pl)
            <li class="">
                <a href="/loaitin/{{$pl->slug}}" class="header">{{$pl->Tenloaitin}}</a>
            </li>
            
            @endforeach
            <li>
                <a href="/loaitin/lienhe" class="header">Liên hệ</a>
            </li>
        </ul>
    </nav>
    <div class="body"></div>