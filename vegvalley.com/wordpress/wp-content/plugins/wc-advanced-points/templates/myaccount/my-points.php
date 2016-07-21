<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<h2><?php printf( __( 'My %s', 'wc_points_rewards' ), $points_label  ); ?></h2>

<p><?php printf( __( "You have %d %s", 'wc_points_rewards' ), $points_balance, $points_label ); ?></p>

<p><?php
	$points_total = (int)get_user_meta( get_current_user_id() , 'wc_points_level_user',true);
	$args = array(
		'post_type'  => 'level',
		'meta_query' => array(
			array(
				'key'     => 'level_range_from',
				'value'   => $points_total,
				'type'    => 'numeric',	
				'compare' => '<=',
			),
			array(
				'key' => 'level_range_to',
				'value'   => $points_total,
				'type'    => 'numeric',
				'compare' => '>',
			),
		),
	);
	$query = new WP_Query( $args );		
	$image 			= '';	
	if ( $query->have_posts() ) 
	{
		$query->the_post();		
		$thumbnail_id = get_post_meta(get_the_ID(), 'level_image', true);
		if ($thumbnail_id)
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		$image = str_replace( ' ', '%20', $image );
	
		$pw_level_name=get_post_meta(get_the_ID(),'level_name',true);
		printf( __( "You have earned %d Total %s and you are level %s", 'wc_points_rewards' ), $points_total, $points_label,$pw_level_name ); 
		echo '<img src="'.$image.'" width="30" height="30" />';		
	}
	?>
</p>

<?php if ( $events ) : ?>
	<table class="shop_table my_account_points_rewards my_account_orders">

		<thead>
			<tr>
				<th class="points-rewards-event-description"><span class="nobr"><?php _e( 'Event', 'wc_points_rewards' ); ?></span></th>
				<th class="points-rewards-event-date"><span class="nobr"><?php _e( 'Date', 'wc_points_rewards' ); ?></span></th>
				<th class="points-rewards-event-points"><span class="nobr"><?php echo esc_html( $points_label ); ?></span></th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ( $events as $event ) : ?>
			<tr class="points-event">
				<td class="points-rewards-event-description">
					<?php echo $event->description.''; ?>
				</td>
				<td class="points-rewards-event-date">
					<?php echo '<abbr title="' . esc_attr( $event->date_display ) . '">' . esc_html( $event->date_display_human ) . '</abbr>'; ?>
				</td>
				<td class="points-rewards-event-points" width="1%">
					<?php echo ( $event->points > 0 ? '+' : '' ) . $event->points; ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>

	</table>

<?php endif;
