<?php
    GLOBAL $session;
    GLOBAL $page_index;

    $products = sql_get_results("SELECT * FROM products WHERE is_archived = 0");
    $stocks = 0;
    foreach($products as $product) {
        $stocks += $product['stocks'];
    }
    $users = sql_count_rows("SELECT * FROM users WHERE is_archived = 0");

    $orders = sql_count_rows("SELECT * FROM orders WHERE status = 1 AND is_archived = 0");
    $deliveries = sql_count_rows("SELECT * FROM orders WHERE status = 2 OR status = 3 AND is_archived = 0");
    $stocks = not_bound_number($stocks, 99, '+');
    $customers = not_bound_number($users, 99, '+');
?>
<div class="app-sidebar">
    <div class="app-sidebar-meta">
        <div class="app-sidebar-meta-image">
            <img src="repository/assets/images/logo.png">
        </div>
    </div>
    <div class="app-sidebar-menu">
        <a href="admin-dashboard" class="app-sidebar-menu-item <?php echo condition($page_index, 1, 'active') ?>">
            <span class="app-sidebar-menu-item-icon">
                <i class="fad fa-gauge-max"></i>
            </span>
            <span class="app-sidebar-menu-item-text">
                Home
            </span>
        </a>
        <a href="admin-orders" class="app-sidebar-menu-item <?php echo condition($page_index, 2, 'active') ?>">
            <span class="app-sidebar-menu-item-icon">
                <i class="fad fa-shopping-cart"></i>
            </span>
            <span class="app-sidebar-menu-item-text">
                Orders
            </span>
            <span class="app-sidebar-menu-item-badge">
                <?php echo $orders ?>
            </span>
        </a>
        <a href="admin-deliveries" class="app-sidebar-menu-item <?php echo condition($page_index, 3, 'active') ?>">
            <span class="app-sidebar-menu-item-icon">
                <i class="far fa-truck-container"></i>
            </span>
            <span class="app-sidebar-menu-item-text">
                Deliveries
            </span>
            <span class="app-sidebar-menu-item-badge">
                <?php echo $deliveries ?>
            </span>
        </a>
        <a href="admin-products" class="app-sidebar-menu-item <?php echo condition($page_index, 4, 'active') ?>">
            <span class="app-sidebar-menu-item-icon">
                <i class="far fa-bags-shopping"></i>
            </span>
            <span class="app-sidebar-menu-item-text">
                Products
            </span>
            <span class="app-sidebar-menu-item-badge">
                <?php echo $stocks ?>
            </span>
        </a>
        <a href="admin-customers" class="app-sidebar-menu-item <?php echo condition($page_index, 5, 'active') ?>">
            <span class="app-sidebar-menu-item-icon">
                <i class="far fa-user"></i>
            </span>
            <span class="app-sidebar-menu-item-text">
                Customers
            </span>
            <span class="app-sidebar-menu-item-badge">
                <?php echo $customers ?>
            </span>
        </a>
    </div>
</div>