<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '';}}" href="{{ route('admin.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link {{ Request::is('admin/category') ? 'collapse active' : 'collapsed' ;}} || {{ Request::is('admin/add-category') ? 'collapse active' : 'collapsed';}} || {{ Request::is('admin/edit-category/*') ? 'collapse active' : 'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ Request::is('admin/category') ? 'show' : '' ;}} || {{ Request::is('admin/add-category') ? 'show' : '';}} || {{ Request::is('admin/edit-category/*') ? 'show' : ''}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ Request::is('admin/add-category') ? 'active' : '';}}" href="{{ route('admin.addcategory') }}">Add Category</a>
                                    <a class="nav-link {{ Request::is('admin/category') ? 'active' : ''}} || {{ Request::is('admin/edit-category/*') ? 'active' : ''}}" href="{{ route('admin.category') }}">View Category</a>
                                </nav>
                            </div>

                            <a class="nav-link {{ Request::is('admin/posts') ? 'collapse active' : 'collapsed' ;}} || {{ Request::is('admin/add-posts') ? 'collapse active' : 'collapsed';}} || {{ Request::is('admin/edit-post/*') ? 'collapse active' : 'collapsed';}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Posts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ Request::is('admin/posts') ? 'show' : '' ;}} || {{ Request::is('admin/add-posts') ? 'show' : '';}} || {{ Request::is('admin/edit-post/*') ? 'show' : '';}}" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ Request::is('admin/add-posts') ? 'active' : '';}}" href="{{ route('admin.addposts') }}">Add Post</a>
                                    <a class="nav-link {{ Request::is('admin/posts') ? 'active' : '';}} || {{ Request::is('admin/edit-post/*') ? 'active' : '';}}" href="{{ route('admin.posts') }}">View Posts</a>
                                </nav>
                            </div>

                            <a class="nav-link {{ Request::is('admin/users') ? 'active' : '';}}" href="{{ route('admin.users') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                View Users
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link {{ Request::is('admin/settings') ? 'active' : '';}}" href="{{ route('admin.settings') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-setting"></i></div>
                                Settings
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                           Admin
                    </div>
                </nav>
</div>