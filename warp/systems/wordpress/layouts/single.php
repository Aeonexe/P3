 <?php 
	
	$categories = get_the_category();

	foreach( $categories as $category ) {

		$category_filtered = $category->slug . ' '; 		

	}

?>

<div class="tm-content-container article-<?php echo $category_filtered; ?>">	
			 
		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<style>
							.thumbnail-container {
							display: block;
							height: 35vw;
							min-height: 200px;
							max-height: 400px;
							width: 100%;
							background-size: cover;
							background-position: center;
							}
							
							body.single .avatar {
							width: 140px;
							height: auto;
							border-radius: 130px;
							border: 1px solid lightgray;
							}

							body.single .uk-align-medium-left.container {
							box-sizing: border-box;
							padding: 39px 0 39px 39px;
							height: 140px;
							}

							body.single .uk-panel.uk-panel-box {
							border-width: 1px;
							border-style: solid;
							border-color: gray;
							border-left: 0;
							border-right: 0;
							background: white;
							margin: auto;
							display: -webkit-box;
							display: -webkit-flex;
							display: -ms-flexbox;
							display: flex;
							-webkit-box-pack: center;
							-webkit-justify-content: center;
									-ms-flex-pack: center;
											justify-content: center;
							}

							@media all and ( max-width: 756px ) {
								body.single .uk-align-medium-left.container {
									text-align: left;
									margin-left: 14px;
								}

								h3 {
									text-align: left;
								}
							}

							.single .this_menu_item_is_blog {
							    border-bottom-color: transparent; 
							}

							.section-servicio.single .this_menu_item_is_servicios {
							    border-bottom: 4px solid white;
							}


				</style>

				<article class="uk-article single-article" data-permalink="<?php the_permalink(); ?>">
					 
					<span class="title-container" style="display: block; text-align: center; margin-bottom: 22px;">
								
								 <h1 style="font-size: 22px; display: inline-block;" class="condensed remate strong"><?php the_title(); ?></h1>

					</span>

						<?php if (has_post_thumbnail()) : 
							
								$featured_img_id = get_post_thumbnail_id($post->id); 					
								$featured_img_large_attr = wp_get_attachment_image_src( $featured_img_id, 'large' );
								$featured_img_thumb_attr = wp_get_attachment_image_src( $featured_img_id, 'thumbnail' );
								$featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);   
							
							?>
							 <span class="thumbnail-container" style="background-image: url(<?php echo $featured_img_large_attr[0]; ?>)">
							
							</span> 
						<?php endif; ?>

						<?php if( $category_filtered == 'servicio ' ) : ?>

							<p class="uk-article-meta"></p>

						<?php else : ?>

							<p class="uk-article-meta">
								<?php
									$date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
									printf(__('Escrito por %s en %s. Categoría: %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
								?>
							</p>

						<?php endif; ?>
						
						<div class="content"><?php the_content(''); ?></div>

						<?php if( $category_filtered == 'servicio ' ) : ?>

							<div class="mrt-blog-button-container" style="text-align: center;">
														    	
					    		<a class="mrt-blog-button" href="<?php bloginfo( 'url' ) . the_field( 'mrt_servicio_link_diagnostico' ); ?>" title="Método Birkman">Recibir diagnóstico</a>
								
							</div>

						<?php endif; ?>
							
						<div class="share-buttons" style="display: block; text-align: center; margin: 42px 0;">
								 
									<span class="button-share button-share-fb" style="margin-right: 10px;"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo post_permalink(); ?>" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo post_permalink(); ?>','pagename','resizable,height=400,width=480'); return false;"><i class="fa fa-facebook"></i></a></span>
								 
									<span class="button-share button-share-tw" style="margin-right: 10px;"><a href="https://twitter.com/home?status=<?php echo post_permalink(); ?>" onClick="window.open('https://twitter.com/home?status=<?php echo post_permalink(); ?>','pagename','resizable,height=400,width=480'); return false;"><i class="fa fa-twitter"></i></a></span>

									<span class="button-share button-share-print"><a href="#" onClick="window.print()"><i class="fa fa-print"></i></a></span>


						</div>
									

						<?php wp_link_pages(); ?>

						<?php if( $category_filtered != 'servicio ' ) : ?>

							<?php the_tags('<p>'.__('Tags: ', 'warp'), ', ', '</p>'); ?>

						<?php endif; ?>

						<?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

						<?php if (pings_open()) : ?>
							<p><?php //printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
						<?php endif; ?>

						<?php if( $category_filtered != 'servicio ' ) : ?>

							<div id="author" class="uk-panel uk-panel-box">

								<div class="uk-align-medium-left">


									<?php 

									$author_id = get_the_author_meta('ID');
									$author_avatar = get_field('wk_profile_avatar', 'user_'. $author_id );
									$author_avatar_thumbnail = $author_avatar[sizes][thumbnail];
									$default_avatar = 'http://codecase.work/marte/p3/wp-content/themes/warp_p3/images/default-avatar.png';

									?>

									<img class="avatar photo" src="<?php if( $author_avatar ) : echo $author_avatar_thumbnail; else : echo $default_avatar; endif; ?>">

								</div>
									
									<div class="uk-align-medium-left container">
											
											<span>Escrito por:</span>

											<h2 class="uk-h3 uk-margin-top-remove color" style="text-transform: uppercase;font-size: 19px;font-weight: 400;letter-spacing: 1px;"><?php the_author(); ?></h2>
												
									</div>            

							</div>  

						<?php endif; ?>   

				</article>

		<?php endwhile; ?>

 <?php endif; ?>

 			<?php if( $category_filtered != 'servicio ' ) : ?>
			 
				<div class="related-posts">						 

					<?php 

						$post_id = get_the_ID();
						 
						$args = array(
									'post_type'       => 'post',
									'author'          => $author_id,
									'post__not_in'   => array(  $post_id ),
						);

						$wp_query = new WP_Query( $args );        

					 ?>


					<?php  if( $wp_query->have_posts() ) : ?>

								<span class="title-container" style="display: block; text-align: center; margin-bottom: 22px;">
											<h3 class="condensed remate strong" style="display: inline-block;"> Artículos relacionados al autor </h3>
								</span>

								<div class="related-posts-container">
									
									 <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

												<?php 

												$featured_img_id = get_post_thumbnail_id($post->id); 					
												$featured_img_large_attr = wp_get_attachment_image_src( $featured_img_id, 'large' );
												$featured_img_thumb_attr = wp_get_attachment_image_src( $featured_img_id, 'thumbnail' );
												$featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true); 

												?>


												<div class="related-post">
															<a href="<?php the_permalink(); ?>" class="container">
																		<span style="background-image: url(<?php echo $featured_img_large_attr[0]; ?>)">
																		</span>
																		<h1 class="strong condensed"> <?php the_title(); ?></h1>
															</a>
												</div>

									<?php endwhile; ?>
									
								</div>


					 <?php endif; ?>

				 </div>

			<?php endif; ?>

</div>


