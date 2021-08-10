<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allUsers') }}"
                       aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allPosts') }}"
                       aria-expanded="false">
                        <i class="fas fa-newspaper" aria-hidden="true"></i>
                        <span class="hide-menu">News</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allRoles') }}"
                       aria-expanded="false">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <span class="hide-menu">Roles</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allTags') }}"
                       aria-expanded="false">
                        <i class="fas fa-tags" aria-hidden="true"></i>
                        <span class="hide-menu">Tags</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allCategories') }}"
                       aria-expanded="false">
                        <i class="fas fa-paperclip" aria-hidden="true"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allForbiddenWords') }}"
                       aria-expanded="false">
                        <i class="fas fa-ban" aria-hidden="true"></i>
                        <span class="hide-menu">Forbidden Words</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allComments') }}"
                       aria-expanded="false">
                        <i class="far fa-comments" aria-hidden="true"></i>
                        <span class="hide-menu">Comments</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href=" {{ route('pendingPosts') }}"
                       aria-expanded="false">
                        <i class="fas fa-hourglass-start" aria-hidden="true"></i>
                        <span class="hide-menu">Pending News</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allPermissions') }}"
                       aria-expanded="false">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                        <span class="hide-menu">Permissions</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('allPermissionRoles') }}"
                       aria-expanded="false">
                        <i class="fas fa-lock" aria-hidden="true"></i><i class="fas fa-edit" aria-hidden="true"></i>
                        <span class="hide-menu">PermissionAndRoles</span>
                    </a>
                </li>


            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
