<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Admin</a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
            <img alt="image" src="{{$user->avartar}}">
            </div>
            <div class="sidebar-user-details">
            <div class="user-name">{{$user->name}}</div>
              <div class="user-role">
                Administrator
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li id="home">
              <a href="/admin/home"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
            </li>
            <li id="vietbai">
              <a href="/admin/vietbai"><i class="ion ion-paper-airplane"></i><span>Viết bài</span></a>
            </li>
            <li id="tinmuaban">
              <a href="/admin/tinmuaban"><i class="ion ion-card"></i><span>Tin mua bán</span></a>
            </li>
            @foreach($theloai as $pl)
            <li id="tintucduan{{$pl->id}}">
              <a href="/admin/tintucnhadat/{{$pl->id}}"><i class="ion ion-ios-paper"></i><span>{{$pl->Tenloaitin}}</span></a>
            </li>
            @endforeach
            <li id="theloai">
              <a href="/admin/loaiTin"><i class="ion ion-ios-location-outline"></i><span>Loại tin tức</span></a>
            </li>
            <li id="quanhuyen">
                    <a href="/admin/quanhuyen"><i class="ion ion-ios-location-outline"></i><span>Quận huyện Hà Nội</span></a>
            </li>
            <li id="quanlyuser">
                    <a href="/admin/getUser"><i class="ion ion-ios-people-outline"></i><span>Quản lý user</span></a>
            </li>
            <li id="tailieu">
                    <a href="/admin/tailieu"><i class="ion ion-ios-book"></i><span>Quản lý tai lieu</span></a>
            </li>
        </aside>
      </div>
