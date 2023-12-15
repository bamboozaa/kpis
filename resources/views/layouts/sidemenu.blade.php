<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #2e2f82;">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            {{-- <li class="nav-item">
                <a href="#" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('home') }}" class="nav-link px-0 align-middle text-white {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fs-4 bi-speedometer2"></i><span class="ms-2 d-none d-sm-inline">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('goals.index') }}" class="nav-link px-0 align-middle text-white {{ request()->routeIs('goals.*') ? 'active' : '' }}">
                    {{-- <a href="{{ route('goals.create', ['id' => Auth::user()->id]) }}" class="nav-link px-0 align-middle text-white {{ request()->routeIs('goals.*') ? 'active' : '' }}"> --}}
                    <i class="bi bi-bullseye fs-4" style="color: forestgreen"></i><span class="ms-2 d-none d-sm-inline">{{ __('[ บันทึกเป้าหมาย ]') }}</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('indicators.create') }}" class="nav-link px-0 align-middle text-white {{ request()->routeIs('indicators.*') ? 'active' : '' }}">
                    <i class="bi bi-app-indicator fs-4" style="color: crimson"></i><span class="ms-2 d-none d-sm-inline">{{ __('[ บันทึกตัวชี้วัด KPI ]') }}</span>
                </a>
            </li> --}}
            {{-- <li class="text-nowrap">
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white {{ request()->routeIs('advisers.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard fs-4"></i>
                    <span class="ms-1 d-none d-sm-inline">{{ __('ข้อมูลอาจารย์ที่ปรึกษา') }}</span>
                    <i class="bi bi-caret-down"></i>
                </a>
                <ul class="collapse nav flex-column ms-1 {{ request()->routeIs('advisers.*') ? 'show' : '' }}" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0 text-white ms-2 {{ request()->routeIs('advisers.create') ? 'active' : '' }}"><i class="bi bi-plus-lg fs-5"></i><span
                                class="d-none d-sm-inline ms-2">{{ __('สร้างอาจารย์ที่ปรึกษาใหม่') }}</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-white ms-2 {{ request()->routeIs('advisers.index') ? 'active' : '' }}"><i class="bi bi-display fs-5"></i><span
                                class="d-none d-sm-inline ms-2">{{ __('แสดงรายชื่ออาจารย์ที่ปรึกษา') }}</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-people"></i><span class="ms-1 d-none d-sm-inline">ข้อมูลนักศึกษา</span> <i
                        class="bi bi-caret-down"></i>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0 text-white ms-2"><i class="bi bi-plus-lg fs-5"></i><span
                                class="d-none d-sm-inline ms-2">{{ __('เพิ่มข้อมูลนักศึกษา') }}</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-white ms-2"><i class="bi bi-display fs-5"></i><span
                                class="d-none d-sm-inline ms-2">{{ __('แสดงรายชื่อนักศึกษา') }}</span></a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
