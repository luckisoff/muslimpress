@include('admin.shared.topbar')
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="#" class="brand-link">
    <img src="{{admin()->image?:asset('images/nopic.png')}}" alt="{{admin()->name}}" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{admin()->name}}</span>
</a>


<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

        <!-- common -->
        <li class="nav-header">
            <span class="badge badge-success">{{ucfirst(admin()->role)}}</span>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>
        <!-- /common -->
        <!-- menus other than developers -->

        @if(isAdmin())
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Admins
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Admins</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Admins</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(isAdmin())
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Users
                </p>
            </a>
        </li>
        @endif

        @if(isAdmin())
        <!-- category -->
        <li class="nav-item has-treeview {{menuOpen('admin.category')||menuOpen('admin.category.create')}}">
        
            <a href="#" class="nav-link {{isRoute('admin.category')||isRoute('admin.category.create')}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    Categories
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                <a href="{{route('admin.category')}}" class="nav-link {{isRoute('admin.category')}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Categories</p>
                </a>
                </li>
                @if(isAdmin())
                <li class="nav-item">
                    <a href="{{route('admin.category.create')}}" class="nav-link {{isRoute('admin.category.create')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Category</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if(isAdmin() || isWritter())
        <li class="nav-item has-treeview {{menuOpen('admin.news')||menuOpen('admin.news.create')}}">
        
            <a href="#" class="nav-link {{isRoute('admin.news')||isRoute('admin.news.create')}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                News
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                <a href="{{route('admin.news')}}" class="nav-link {{isRoute('admin.news')}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View News</p>
                </a>
                </li>
                @if(isAdmin() || isWritter())
                <li class="nav-item">
                    <a href="{{route('admin.news.create')}}" class="nav-link {{isRoute('admin.news.create')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create News</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>

        <li class="nav-item has-treeview {{menuOpen('admin.news')||menuOpen('admin.news.create')}}">
        
            <a href="#" class="nav-link {{isRoute('admin.news')||isRoute('admin.news.create')}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                Articles
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                <a href="{{route('admin.news', 'article')}}" class="nav-link {{isRoute('admin.news')}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Articles</p>
                </a>
                </li>
                @if(isAdmin() || isWritter())
                <li class="nav-item">
                    <a href="{{route('admin.news.create', 'article')}}" class="nav-link {{isRoute('admin.news.create')}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Article</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif


         <!-- add menu -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ad"></i>
                <p>
                Advertisements
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Ads</p>
                </a>
                </li>
                @if(isAdmin() || isWritter())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Ad</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>


        <!-- language -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-language"></i>
                <p>
                Languages
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Language</p>
                </a>
                </li>
                @if(isAdmin())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Language</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>


        <!-- menu for developers -->

        @if(isAdmin())
        <li class="nav-item">
            <a href="{{route('admin.setting')}}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>Settings</p>
            </a>
        </li>
        @endif
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
