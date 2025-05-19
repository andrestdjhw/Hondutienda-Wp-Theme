<div class="h-48 overflow-hidden relative">
    <?php
    do_action('woocommerce_before_shop_loop_item');
    do_action('woocommerce_before_shop_loop_item_title');
    ?>
</div>

<div class="p-6">
    <h3 class="font-bold text-gray-800 mb-2">
        <?php the_title(); ?>
    </h3>

    <div class="flex items-center mb-4">
        <?php woocommerce_template_loop_price(); ?>
    </div>

    <?php woocommerce_template_loop_add_to_cart(); ?>
</div>