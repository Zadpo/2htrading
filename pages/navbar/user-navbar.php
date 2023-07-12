<?php
    GLOBAL $session;
    GLOBAL $index;
    $orders = sql_count_results("SELECT * FROM orders WHERE user_id = {$session['id']} AND is_archived = 0");
    $orders = not_bound_number($orders, 99, '+');
    $cart = sql_count_results("SELECT * FROM cart_list WHERE user_id = {$session['id']} AND is_archived = 0");
    $cart = not_bound_number($cart, 99, '+');
?>
<nav class="top">
    <p>#141F. Blumentritt St., San Juan City, 1500 Philippines</p>
</nav>
<nav class="bottom">
    <div class="nav-logo">
        <a href="home">
            <img src="repository/assets/images/logo.png">
        </a>
    </div>
    <div class="app-navbar-searchbar">
        <span class="app-navbar-searchbar-icon">
            <i class="fad fa-search"></i>
        </span>
        <input type="text" class="app-navbar-searchbar-input" placeholder="SEARCH PRODUCTS..">
    </div>
    <div class="nav-items">
        <a href="orders">
            <i class="<?php echo $index == 1 ? 'fas' : 'far' ?> fa-truck-container"></i>
            <span class="nav-items-badge-quantity">
                <?php echo $orders ?>
            </span>
        </a>
        <a href="cart">
            <i class="<?php echo $index == 2 ? 'fas' : 'far' ?> fa-basket-shopping-simple"></i>
            <span class="nav-items-badge-quantity">
                <?php echo $cart ?>
            </span>
        </a>
        <div id="navbarMenu" class="app-navbar-dropdown">
            <a type="button" open-dropdown="navbarMenu" class="app-navbar-actions-item th-dropdown-toggler">
                <i class="<?php echo $index == 3 ? 'fas' : 'far' ?> fa-cog"></i>
            </a>
            <div class="app-navbar-dropdown-menu">
                <a href="profile" class="app-navbar-dropdown-menu-item">Profile</a>
                <a href="sign-out" class="app-navbar-dropdown-menu-item">Sign Out</a>
            </div>
        </div>
    </div>
</nav>