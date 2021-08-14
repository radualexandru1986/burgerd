<div class="col-auto  px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="{{route('admin.dashboard')}}"  class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
            </li>
            <li>
                <a href="{{route('admin.orders')}}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
            </li>
            <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>
            </li>
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">{{\Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <input class="btn bg-light m-0 h-100 w-100" type="submit" value="Logout">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
