<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="mm-active">
                    <a href="{{route('dashboard')}}" class="waves-effect mm-active">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-blog">Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-add-blog">Add Blog</a></li>
                        <li><a href="#" key="t-manage-blog">Manage Blog</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-list-ul'></i>
                        <span key="t-category">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('category.create')}}" key="t-add-category">Add Category</a></li>
                        <li><a href="{{route('category.index')}}" key="t-manage-category">Manage Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-user'></i>
                        <span key="t-users">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-manage-users">Manage Users</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
