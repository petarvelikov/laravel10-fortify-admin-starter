<aside class="navbar navbar-expand-lg0 bg-primary">
    <div class="nav-item text-center w-100">
        <?php if(Auth::check() && Auth::user()->is_admin == 1): ?>
            <strong><a class="navbar-brand text-success" href="/">Is Admin</a></strong>
        <?php else: ?>
            <strong><a class="navbar-brand text-success text-danger" href="/">Not Admin</a></strong>
        <?php endif; ?>
    </div>

    <div style="color: aquamarine;">
        <ul class="navbar-nav mt-3">
            <li class="admin-aside-item"><a class="nav-link" href="/admin"><i class="bi bi-speedometer2">&nbsp;</i>Dashboard</a></li>
            <li class="admin-aside-item"><a class="nav-link" href="/admin/orders"><i class="bi bi-backpack3-fill">&nbsp;</i>Orders</a></li>
            <li class="admin-aside-item"><a class="nav-link" href="/admin/users"><i class="bi bi-people">&nbsp;</i>Users</a></li>
            <li class="admin-aside-item"><a class="nav-link" href="/admin/products"><i class="bi bi-shop-window">&nbsp;</i>Products</a></li>
            <li class="admin-aside-item"><a class="nav-link" href="/admin/categories"><i class="bi bi-shop-window">&nbsp;</i>Categories</a></li>
            <li class="admin-aside-item"><a class="nav-link" href="/admin/settings"><i class="bi bi-gear">&nbsp;</i>Settings</a></li>
        </ul>
    </div>
</aside><?php /**PATH C:\Users\petar\Desktop\TEST\l10-admin-fortify\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>