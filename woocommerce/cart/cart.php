<div class="divide-y divide-gray-200">
    <?php
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        echo '<div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-gray-50 transition-colors duration-200">';
        // Your cart item design
        _e('Product image/name/price here', 'textdomain');
        echo '</div>';
    }
    ?>
</div>