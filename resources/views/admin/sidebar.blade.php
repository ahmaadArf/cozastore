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

    <!-- Divider -->
    <hr class="sidebar-divider">

     <!-- Nav Item - Pages Category Menu -->
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
    <hr class="sidebar-divider">

     <!-- Nav Item - Pages Slider Menu -->
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
    <hr class="sidebar-divider">

     <!-- Nav Item - Pages Product Menu -->

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
    <hr class="sidebar-divider">

 <!-- Nav Item - Pages Color Menu -->

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
<hr class="sidebar-divider">

 <!-- Nav Item - Pages Size Menu -->

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
<hr class="sidebar-divider">

 <!-- Nav Item - Pages Size Menu -->

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
<hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
