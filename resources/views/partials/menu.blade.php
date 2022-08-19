<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- @can('user_management_access') --}}
                    {{-- <li
                        class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li> --}}
                {{-- @endcan --}}
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cog nav-icon"> </i>
                            <p>
                                Settings
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <a class="nav-link {{ request()->routeIs('admin.setting.*') ? 'actives' : '' }}"
                                href="{{ route('admin.setting.index') }}">
                                <i class="fa-fw fas fa-cog nav-icon"></i>
                                <p>
                                    Web Setting
                                </p>
                            </a>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.invoices.*') ? 'active' : '' }}"
                                    href="{{ route('admin.main-page.index') }}">
                                    <i class="fa-fw fas fa-file nav-icon"></i>
                                    <p>
                                        Main Page Setting
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"
                            href="{{ route('admin.pages.index') }}">
                            <i class="fa-fw fas fa-file nav-icon">
                            </i>
                            <p>
                                Pages
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}"
                            href="{{ route('admin.authors.index') }}">
                            <i class="fa-fw fas fa-user nav-icon">
                            </i>
                            <p>
                                Authors
                            </p>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('') --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                            href="{{ route('admin.categories.index') }}">
                            <i class="fa-fw fas fa-list-alt nav-icon">
                            </i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('') --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}"
                            href="{{ route('admin.menus.index') }}">
                            <i class="fa-fw fas fa-box nav-icon">
                            </i>
                            <p>
                                Menus
                            </p>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('') --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}"
                            href="{{ route('admin.tags.index') }}">
                            <i class="fa-fw fas fa-tags nav-icon">
                            </i>
                            <p>
                                Tags
                            </p>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('') --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"
                            href="{{ route('admin.posts.index') }}">
                            <i class="fa-fw fas fa-desktop nav-icon">
                            </i>
                            <p>
                                Posts
                            </p>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('') --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}"
                            href="{{ route('admin.comments.index') }}">
                            <i class="fa-fw fas fa-comment nav-icon">
                            </i>
                            <p>
                                Comments
                            </p>
                        </a>
                    </li> --}}
                {{-- @endcan --}}
                {{-- @can('') --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"
                            href="{{ route('admin.contacts.index') }}">
                            <i class="fa-fw fas fa-phone nav-icon">
                            </i>
                            <p>
                                Contact Queries
                            </p>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('') --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"
                            href="{{ route('admin.blogs.index') }}">
                            <i class="fa-fw fas fa-copy nav-icon">
                            </i>
                            <p>
                                Blogs
                            </p>
                        </a>
                    </li> --}}
                {{-- @endcan --}}
                {{-- @can('') --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.customers.*') ? 'actives' : '' }}"
                            href="{{ route('admin.customers.index') }}">
                            <i class="fa-fw fas fa-user-plus nav-icon"></i>
                            <p>
                                Customers List
                            </p>
                        </a>
                    </li> --}}
                {{-- @endcan --}}
                @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
