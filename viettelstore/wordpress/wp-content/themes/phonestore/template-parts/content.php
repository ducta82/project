<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package phonestore
 */
if(is_archive()){
	?>
		<tr>
	        <td class="title-3" colspan="2">
	            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2> 
	        </td>
	    </tr>
	    <tr class="line-2">
	        <td class="img">
	            <div><a href="<?php the_permalink();?>">
	                <?php the_post_thumbnail();?></a>
	            </div>
	        </td>
	        <td class="noi-dung-2">
	            <h6><?php phonestore_posted_on(); ?></h6>
	            <a href="<?php the_permalink();?>">
	                <h5><?php the_excerpt();?></h5>
	            </a>
	        </td>
	    </tr>
	<?php
}else{
?>
<h1 class="tieu-de"><?php the_title();?></h1>
<div class="thoi-gian"><?php phonestore_posted_on(); ?></div>
<div class="content">
<?php the_content();?>
</div>
<div class="like-fb">
	<table>
		<tbody>
			<tr>
				<td style="width: 165px;position: relative;">
                    <!--<img src="/assets/images/like-fb_03.png" alt="facebook" style="position: absolute; top: -30px;" />-->
                    <i class="icons like-fb-03" title="facebook"></i>
                </td>
				<td>
					<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					<div style="float: left;">
						<div class="g-plusone"></div>
                    </div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php }