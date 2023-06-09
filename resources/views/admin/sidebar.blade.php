<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Category Menu -->
    @canany(['category-list','category-create','category-edit','category-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
                aria-expanded="true" aria-controls="collapseCategory">
                <i class="fas fa-fw fa-cog"></i>
                <span>Category</span>
            </a>
            <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.categories.index') }}">All Category</a>
                    <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add Category</a>
                    <a class="collapse-item" href="{{ route('admin.categories.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item - Pages Slider Menu -->
    @canany(['slider-list','slider-create','slider-edit','slider-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSlider"
                aria-expanded="true" aria-controls="collapseSlider">
                <i class="fas fa-fw fa-cog"></i>
                <span>Slider</span>
            </a>
            <div id="collapseSlider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.sliders.index') }}">All Slider</a>
                    <a class="collapse-item" href="{{ route('admin.sliders.create') }}">Add Slider</a>
                    <a class="collapse-item" href="{{ route('admin.sliders.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item - Pages Product Menu -->
    @canany(['product-list','product-create','product-edit','product-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                aria-expanded="true" aria-controls="collapseProduct">
                <i class="fas fa-fw fa-cog"></i>
                <span>Product</span>
            </a>
            <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.products.index') }}">All Product</a>
                    <a class="collapse-item" href="{{ route('admin.products.create') }}">Add Product</a>
                    <a class="collapse-item" href="{{ route('admin.products.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item - Pages Color Menu -->
    @canany(['color-list','color-create','color-edit','color-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColor"
                aria-expanded="true" aria-controls="collapseColor">
                <i class="fas fa-fw fa-cog"></i>
                <span>Color</span>
            </a>
            <div id="collapseColor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.colors.index') }}">All Color</a>
                    <a class="collapse-item" href="{{ route('admin.colors.create') }}">Add Color</a>
                    <a class="collapse-item" href="{{ route('admin.colors.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item - Pages Size Menu -->
    @canany(['size-list','size-create','size-edit','size-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSize"
                aria-expanded="true" aria-controls="collapseSize">
                <i class="fas fa-fw fa-cog"></i>
                <span>Size</span>
            </a>
            <div id="collapseSize" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.sizes.index') }}">All Size</a>
                    <a class="collapse-item" href="{{ route('admin.sizes.create') }}">Add Size</a>
                    <a class="collapse-item" href="{{ route('admin.sizes.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item - Product Image  Menu -->
    @canany(['productImage-list','productImage-create','productImage-edit','productImage-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproductImages"
                aria-expanded="true" aria-controls="collapseproductImages">
                <i class="fas fa-fw fa-cog"></i>
                <span>Product Image</span>
            </a>
            <div id="collapseproductImages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.productImages.index') }}">All ProductImage</a>
                    <a class="collapse-item" href="{{ route('admin.productImages.create') }}">Add ProductImage</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item -  Role Menu -->
    @canany(['role-list','role-create','role-edit','role-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
                aria-expanded="true" aria-controls="collapseRole">
                <i class="fas fa-fw fa-cog"></i>
                <span>Role</span>
            </a>
            <div id="collapseRole" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.roles.index') }}">All Role</a>
                    <a class="collapse-item" href="{{ route('admin.roles.create') }}">Add Role</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Nav Item - User Menu -->
    @canany(['user-list','user-create','user-edit','user-delete'])
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-fw fa-cog"></i>
                <span>User</span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.users.index') }}">All User</a>
                    <a class="collapse-item" href="{{ route('admin.users.create') }}">Add User</a>
                </div>
            </div>
        </li>
    @endcanany

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
