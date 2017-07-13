<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$orders_columns = array();
$post_list_table = _get_list_table( 'WP_Posts_List_Table' );
$orders_columns = apply_filters( 'manage_shop_order_posts_columns', $post_list_table->get_columns() );
$orders_columns = YITH_Purchased_Order_Items_Column()->filter_orders_columns( $orders_columns );

return apply_filters( 'yith_poic_panel_options', array(

    'settings' => array(

        'poic_options_start' => array(
            'type' => 'sectionstart',
        ),

        'poic_options_title' => array(
            'title' => __( 'General Settings', 'yith-purchased-column-for-woocommerce' ),
            'type'  => 'title',
        ),

        'poic_position'    => array(
            'title'   => sprintf( '%s:', __( 'Show the purchased column after column', 'yith-purchased-column-for-woocommerce' ) ),
            'type'    => 'select',
            'options' => $orders_columns,
            'id'      => 'yith_poic_position',
            'default' => YITH_Purchased_Order_Items_Column()->get_default_after_column_arg()
        ),

        'poic_options_end'   => array(
            'type' => 'sectionend',
        ),
    )
), 'settings'
);