<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light d-flex">
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('assets/images/logo.png')}}" alt="" style="width: 50px; height: 50px; object-fit: cover">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ ucwords($user_data->name ? $user_data->name : 'Login') }}</h6>
                <span>Dashboard</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="#" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Service</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="#" class="dropdown-item"> <i class="fa fa-plane me-2"></i> Flight </a>
                    <a href="#" class="dropdown-item"><i class="fa fa-building me-2"></i> Hotel</a>
                    <a href="#" class="dropdown-item"><i class="fa fa-lock me-2"></i> Visa</a>
                </div>
            </div>
            <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i></a> -->
            <!-- <a href="{{route('agencies')}}" class="nav-item nav-link"><i class="fa fa-building me-2"></i> Agency</a> -->
            <a href="#" class="nav-item nav-link"><i class="fa fa-users me-2"></i> Clients</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-user-lock me-2"></i> Profile Settings</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-user"></i> Logout</a>
        </div>
    </nav>



    <nav class="navbar bg-light navbar-light d-flex" style="margin-top: 50px">
        <div class="navbar-nav w-100">
            <a href="https://himsoftsolution.com" target="_blank" class="nav-item nav-link active"><i class="fa fa-heart me-2"></i>By Him Soft Solution</a>
            <a href="javascript:void(0)" class="nav-item nav-link"><i class="fa fa-mobile"></i> Version 1.0.1</a>
            <a href="javascript:void(0)" class="nav-item nav-link"><i class="fa fa-eye"></i> Terms & Conditions</a>
            <a href="javascript:void(0)" class="nav-item nav-link"><i class="fa fa-eye-slash"></i> Privacy Policies</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
