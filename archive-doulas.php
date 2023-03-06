<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Okkanti_Website
 */

get_header();

$argsDistance = array( 'post_type' => 'doulas' ,'posts_per_page' => -1) ;

$loopDistance = new WP_Query( $argsDistance );

$arrDistance = array();

while ( $loopDistance->have_posts() ) { $loopDistance->the_post();
	//echo "ID : ".$post->ID;
	$distanceValue = get_field( "distance", $post->ID );
	//echo " Val : ".$distanceValue;
	$arrDistance[] = $distanceValue;
}

wp_reset_postdata();			  

?>
    <div id="main_wrap">
      <section id="okn_section-about-hero">
        <div class="okn_page-full-width">
          <div class="okn_catalogue-page-header">
            <h1 class="headline_one">Find Care</h1>

            <ul class="tab">
              <li>
                  <input id="tab1" checked="checked" type="radio" name="tab" />
                  <label for="tab1">View as List</label>
              </li>
              <li>
                  <input id="tab2" type="radio" name="tab" />
                  <label for="tab2">View as Map</label>
              </li>
            </ul>
          </div>

<div class="filter-wrapper">

	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
		<div class="fl-left">
	<?php
			if( $terms = get_terms( array(
				'taxonomy' => 'specialty', // to make it simple I use default categories
				'orderby' => 'name'
			) ) ) : 
				// if categories exist, display the dropdown
				echo '<select name="categoryfilter" id="categoryfilter"><option value="">Specialty</option>';
				foreach ( $terms as $term ) :
					echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as an option value
				endforeach;
				echo '</select>';
			endif;

			if( $termsvt = get_terms( array(
				'taxonomy' => 'visit_type', // to make it simple I use default categories
				'orderby' => 'name'
			) ) ) : 
				// if categories exist, display the dropdown
				echo '<select name="visit_typefilter" id="visit_typefilter"><option value="">Visit Type</option>';
				foreach ( $termsvt as $termv ) :
					echo '<option value="' . $termv->term_id . '">' . $termv->name . '</option>'; // ID of the category as an option value
				endforeach;
				echo '</select>';
			endif;

	?>
	<input type="text" name="zipcode" id="zipcode" placeholder="Location (Enter the zipcode)">
	
	<?php 
	if( !empty($arrDistance) ) : 
		// if categories exist, display the dropdown
		echo '<select name="distance" id="distance"><option value="">Distance</option>';
		foreach ( $arrDistance as $arrDistanceIterm ) :
			echo '<option value="' . $arrDistanceIterm . '">' . $arrDistanceIterm . '</option>'; // ID of the category as an option value
		endforeach;
		echo '</select>';
	endif;
	?>
</div>
	<div class="fl-right">
		<input type="reset" id="clearfilter" name="clearfilter"></button>
		<button id="btnFilter" class="searchfilter okn_btn okn_dark-green-btn">Search</button>
			<input type="hidden" name="action" value="myfilter">
</div>
		</form>
	
</div>


      <div class="okn_catalogue-item-wrapper" id="ajax_filter_doula">
			 <?php



                  $args = array( 'post_type' => 'doulas' ,'posts_per_page' => 2,'paged' => $paged ,'orderby' => 'name' ) ;
                  
                  //$_POST['visit_typefilter'] = 6;
                  if( isset($_POST['visit_typefilter']) && !empty($_POST['visit_typefilter']) && empty($_POST['categoryfilter']) ){
                    $args['tax_query'] = array(
                      array(
                        'taxonomy' => 'visit_type',
                        'field'    => 'id',
                        'terms'    => $_POST['visit_typefilter'],
                      )
                    );
                  }


                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post();
                  ?>
            <div class="okn_catalogue-item">
              <div class="okn_catalogue-title-section">
                <div class="okn_catalogue-avatar-wrapper">
                  <img class="okn_catalogue-avatar" src="<?php the_post_thumbnail();?>" alt="me"/>
                </div>
                <div class="okn_w-100">
                  <div class="okn_catalogue-item-name"><?php the_title(); ?></div>
                  <div class="okn_catalogue-item-details">
                                  <div class="okn_catalogue-item-subtexts">
                              <?php
    
                                 $terms_specialty = get_the_terms( $post->ID, 'specialty' );
                                 $release_years_str = get_the_term_list( $post->ID,'specialty','', ',' );

                                 
                                 if(!empty($terms_specialty)){
                                 foreach($terms_specialty as $termspeIterm){
                                 	?>
                              <div class="okn_catalogue-item-subtxt">
                                 <?php 
                                    echo $termspeIterm->name;
                                    ?>
                              </div>
                              <?php }
                                 }
                                 
                                 	?>
                            
                              <?php 
                                 //}
                                  ?>
                             
                           </div>
                    <div class="okn_catalogue-item-icons">
					

					<?php
					$terms_specialty = get_the_terms( $post->ID, 'specialty' );
						
					if(!empty($terms_specialty)){
						 foreach($terms_specialty as $termspeIterm){
							$terms = get_term_meta($termspeIterm->term_id);									
							$imageID = $terms['taxonomy_image'][0];
							
							if(!empty($imageID)){
								$attachment_image = wp_get_attachment_url( $imageID ); ?>
								<img class="okn_catalogue-item-icon" src="<?php echo $attachment_image; ?>" />
								<?php
							}

							
							
						}
					}
								 
								 
						?>

                    </div>
                  </div>
                </div>
              </div>
              <div class="okn_catalogue-body-section">
                <div class="okn_catalogue-features">
                  <div class="okn_catalogue-feature">Hour Rate &nbsp;<span class="okn_bold-txt"><?php the_field('hour_rate'); ?></span></div>
                  <div class="okn_catalogue-feature">Visit Duration &nbsp;<span class="okn_bold-txt"><?php the_field('visit_duration'); ?></span></div>
                </div>
                <div class="okn_catalogue-description">
                  <p><?php the_content(); ?></p>
                </div>
              </div>
              <hr class="okn_grey-horizontal-line"/>
              <div class="okn_catalogue-item-footer">
                <div class="okn_footer-text">Next Available:</div>
                <div class="okn_catalogue-footer-button-wrapper">
                  <button class="okn_btn okn_dark-green-outlined-btn">21st Oct, 12:00 am</button>
                  <button class="okn_btn okn_dark-green-btn">Check availability</button>
                </div>
              </div>
            </div>

			  <?php
      endwhile;
      ?>
      <?php wp_reset_postdata();?>
</div>
	  <!-- Pagination Goes Here -->
<div class="pagination-wrapper" id="pagination_result">
  <div class="row">
    <div class="small-12 columns">
    <?php
    the_posts_pagination( array(
      'mid_size'  => 2,
      'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="22" viewBox="0 0 14 22" fill="none">
<path d="M1.08769 11.6794L11.5371 21.6356C11.7114 21.8018 11.9431 21.8945 12.1839 21.8945C12.4248 21.8945 12.6565 21.8018 12.8308 21.6356L12.8421 21.6244C12.9269 21.5438 12.9944 21.4468 13.0406 21.3393C13.0867 21.2318 13.1105 21.116 13.1105 20.999C13.1105 20.8821 13.0867 20.7663 13.0406 20.6588C12.9944 20.5513 12.9269 20.4543 12.8421 20.3737L3.00206 10.9987L12.8421 1.62748C12.9269 1.5469 12.9944 1.44991 13.0406 1.34241C13.0867 1.23491 13.1105 1.11915 13.1105 1.00216C13.1105 0.885176 13.0867 0.769413 13.0406 0.661913C12.9944 0.554413 12.9269 0.457426 12.8421 0.376852L12.8308 0.365601C12.6565 0.199392 12.4248 0.10667 12.1839 0.10667C11.9431 0.10667 11.7114 0.199392 11.5371 0.365601L1.08769 10.3219C0.99579 10.4094 0.922629 10.5147 0.87264 10.6314C0.822651 10.7481 0.796875 10.8737 0.796875 11.0006C0.796875 11.1275 0.822651 11.2531 0.87264 11.3698C0.922629 11.4865 0.99579 11.5918 1.08769 11.6794Z" fill="black"/>
</svg>',
      'next_text' => '
	  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="22" viewBox="0 0 14 22" fill="none">
		<path d="M12.9123 10.3206L2.46294 0.364398C2.28858 0.198189 2.05694 0.105469 1.81606 0.105469C1.57518 0.105469 1.34354 0.198189 1.16919 0.364398L1.15794 0.375648C1.07312 0.456223 1.00558 0.553209 0.959435 0.660709C0.913283 0.768208 0.889484 0.883973 0.889484 1.00096C0.889484 1.11795 0.913283 1.23371 0.959435 1.34121C1.00558 1.44871 1.07312 1.5457 1.15794 1.62627L10.9979 11.0013L1.15794 20.3725C1.07312 20.4531 1.00558 20.5501 0.959435 20.6576C0.913283 20.7651 0.889484 20.8808 0.889484 20.9978C0.889484 21.1148 0.913283 21.2306 0.959435 21.3381C1.00558 21.4456 1.07312 21.5426 1.15794 21.6231L1.16919 21.6344C1.34354 21.8006 1.57518 21.8933 1.81606 21.8933C2.05694 21.8933 2.28858 21.8006 2.46294 21.6344L12.9123 11.6781C13.0042 11.5906 13.0774 11.4853 13.1274 11.3686C13.1773 11.2519 13.2031 11.1263 13.2031 10.9994C13.2031 10.8725 13.1773 10.7469 13.1274 10.6302C13.0774 10.5135 13.0042 10.4082 12.9123 10.3206Z" fill="black"/>
	</svg>
	  ',
    ) );?>
    </div>
  </div>
  
  
          </div>

          <div class="pagination-wrapper" id="paginationFilterResult" style="display: none;">
            <div class="row">
              <div class="small-12 columns">
                <input type="hidden" name="hiddenMaxNumPages" id="hiddenMaxNumPages" value="">
                <input type="hidden" name="hiddenTotalPost" id="hiddenTotalPost" value="">
                <input type="hidden" name="hiddenvisit_typefilter" id="hiddenvisit_typefilter" value="">
                <div id="filterPagination"></div>
                custom Pagination without load page
          </div>
            </div> 
        </div>


        </div>
      </section>
      
    </div>
    
	
 
	
		

<?php

get_footer();
