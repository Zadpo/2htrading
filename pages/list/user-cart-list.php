<?php
    GLOBAL $cart_list;
    GLOBAL $c_peso;
?>
<?php
    foreach($cart_list as $cart)  {
        $product = read_product($cart['product_id']);
        $is_out_of_stock = $product['stocks'] == 0 ? "th-disabled" : "";
        ?>
        <form action="check-out" method="get" class="cart-card">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <div class="cart-card-left">
                <img src="<?php echo $product['image_location'] ?>">
                <div class="cart-card-left-meta">
                    <h1 class="cart-card-left-meta-title"><?php echo $product['name'] ?><span><?php echo $c_peso." ".peso_format($product['price']) ?></span></h1>
                    <p class="cart-card-left-meta-description"><?php echo $product['description'] ?></p>
                    <select name="quantity" class="th-input-select cart-card-left-meta-input">
                        <?php
                            for($i = 1; $i <= $product['stocks']; $i++) {
                                echo "<option value='{$i}'>{$i}pcs</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="th-button th-color-blue <?php echo $is_out_of_stock ?>">
                CHECK OUT
            </button>
        </form>
        <?php
    }
?>