<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{url("/dashboard")}}" class="app-brand-link">
        <img src="{{Auth::user()->logo}}" style="height: 30px;width: auto;">
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{request()->segment(1)=='dashboard'?'active':'' }}">
        <a href="{{url("/dashboard")}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{request()->segment(1)=='account'?'active':''}}">
        <a href="{{url("/account")}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Analytics">Account</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-user-badge"></i>
          <div data-i18n="Layouts">Employees</div>
        </a>

        <ul class="menu-sub">

          <li class="menu-item">
            <a href="{{url('/add-employee')}}" class="menu-link">
              <div data-i18n="Without menu">Add</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{route('manage')}}" class="menu-link">
              <div data-i18n="Without navbar">Manage</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{request()->segment(1)=='salary'?'active':''}}">
        <a href="{{url('/salary')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Analytics">Salary</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="#" class="menu-link">
          <i class="menu-icon tf-icons bx bx-export"></i>
          <div data-i18n="Analytics">Reports</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('changePwd')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cog"></i>
          <div data-i18n="Analytics">Settings</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('logout')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-exit"></i>
          <div data-i18n="Analytics">Logout</div>
        </a>
      </li>
    </ul>
  </aside>