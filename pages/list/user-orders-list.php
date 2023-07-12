<table class="th-table">
    <thead>
        <tr>
            <th>NAME</th>
            <th>PRICE</th>
            <th>ORDER QUANTITY</th>
            <th>ORDER TOTAL</th>
            <th>DATE ORDERED</th>
            <th>PAYMENT METHOD</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
    <?php
        GLOBAL $orders;
        GLOBAL $payment_method;
        GLOBAL $order_status;
        GLOBAL $c_peso;
        foreach($orders as $order) {
            $product = read_product($order['product_id']);
            $order['product_name'] = $product['name'];
            $disabled = $order['payment_method'] == 1 ? "th-disabled" : "";
            $cancel_disabled = $order['status'] == 1 ? "" : "th-disabled";
            ?>
            <tr>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $order['quantity'] ?></td>
                <td><?php echo $c_peso.' '.peso_format($order['total']) ?></td>
                <td><?php echo $order['date_ordered'] ?></td>
                <td>
                    <?php echo $payment_method[$order['payment_method']] ?>
                </td>
                <td>
                    <?php echo $order_status[$order['status']] ?>
                </td>
                <td>
                    <a data="<?php echo htmljson($order) ?>" open-modal="viewPayment" class="th-button th-color-blue th-size-small th-modal-toggler view-btn <?php echo $disabled ?>">
                        <i class="fas fa-image"></i>
                    </a>
                    <a type="button" data="<?php echo htmljson($order) ?>" open-modal="cancelOrder" class="th-button th-color-red th-size-small th-modal-toggler cancel-btn <?php echo $cancel_disabled ?>">
                        <i class="fas fa-cancel"></i>
                    </a>
                </td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table>