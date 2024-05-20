<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{url('Dashboard')}}" class="navbar-brand mx-4 mb-3">
           <img src="{{asset('admin/assets/img/logo1.jpg')}}"  height="100px">
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                {{-- <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div> --}}
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{session()->get('name');}}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{url('Dashboard')}}" class="nav-item nav-link {{ request()->is('Dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            
            <a href="{{url('AddQuestionForm')}}" class="nav-item nav-link {{ request()->is('AddQuestionForm') ? 'active' : '' }}"><i class="fa-solid fa-clipboard-question"></i>Add Question</a>
            <a href="{{url('QuestionList')}}" class="nav-item nav-link {{ request()->is('QuestionList') ? 'active' : '' }}"><i class="fa-solid fa-circle-question"></i>Show Question</a>
            <a href="{{url('AddBankForm')}}" class="nav-item nav-link {{ request()->is('AddBankForm') ? 'active' : '' }}"><i class="fa-solid fa-building-columns"></i>Add Bank</a>
            <a href="{{url('ShowBank')}}" class="nav-item nav-link {{ request()->is('ShowBank') ? 'active' : '' }}"><i class="fa-solid fa-building-columns"></i>Show Bank</a>
            <a href="{{url('AddUserForm')}}" class="nav-item nav-link {{ request()->is('AddUserForm') ? 'active' : '' }}"><i class="fa-solid fa-user"></i>Add User</a>
            <a href="{{url('ShowUser')}}" class="nav-item nav-link {{ request()->is('ShowUser') ? 'active' : '' }}"><i class="fa-solid fa-user"></i>Show User</a>
           
        </div>
    </nav>
</div>