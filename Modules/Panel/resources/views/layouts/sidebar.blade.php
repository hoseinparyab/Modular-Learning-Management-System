<nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

    <!-- Navbar brand for xl START -->
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{route('panel.index')}}">
            <img class="navbar-brand-item" src="{{asset('assets/images/logo-mobile.svg')}}" alt="">
        </a>
    </div>
    <!-- Navbar brand for xl END -->

    <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

            <!-- Sidebar menu START -->
            <ul class="navbar-nav flex-column" id="navbar-sidebar">

                <!-- Menu item -->
                <li class="nav-item">
                    <a href="{{route('panel.index')}}" class="nav-link active">
                        <i class="bi bi-house fa-fw me-2"></i>داشبورد</a>
                </li>
                <li class="nav-item">
                    {{-- <a  href="{{route('panel.categories')}}" class="nav-link active"> --}}
                        <i class="bi bi-basket fa-fw me-2"></i>دسته بندی</a>
                </li>
                <li class="nav-item">
                    {{-- <a  href="{{route('panel.roles')}}" class="nav-link active"> --}}
                        <i class="bi bi-basket fa-fw me-2"></i>نقش ها</a>
                </li>
                <li class="nav-item">
                    {{-- <a  href="{{route('panel.permissions')}}" class="nav-link active"> --}}
                        <i class="bi bi-basket fa-fw me-2"></i>مجوز ها</a>
                </li>
                <li class="nav-item">
                    {{-- <a  href="{{route('panel.users')}}" class="nav-link active"> --}}
                        <i class="bi bi-person fa-fw me-2"></i>کاربر ها</a>
                </li>
                <li class="nav-item">
                    {{-- <a  href="{{route('panel.courses')}}" class="nav-link active"> --}}
                        <i class="bi bi-person fa-fw me-2"></i>لیست دوره ها</a>
                </li>
                <li class="nav-item">
                    {{-- <a  href="{{route('panel.teacher_courses')}}" class="nav-link active"> --}}
                        <i class="bi bi-person fa-fw me-2"></i>دوره های مدرس</a>
                </li>

            </ul>
            <!-- Sidebar menu end -->

            <!-- Sidebar footer START -->
            <div class="px-3 mt-auto pt-3">
                <div class="d-flex align-items-center justify-content-between text-primary-hover">
                    <a class="h5 mb-0 text-body" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="تنظیمات">
                        <i class="bi bi-gear-fill"></i>
                    </a>
                    <a class="h5 mb-0 text-body" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="صفحه اصلی">
                        <i class="bi bi-globe"></i>
                    </a>
                    <a class="h5 mb-0 text-body" href="{{route('logout')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="خروج">
                        <i class="bi bi-power"></i>
                    </a>
                </div>
            </div>
            <!-- Sidebar footer END -->

        </div>
    </div>
</nav>
