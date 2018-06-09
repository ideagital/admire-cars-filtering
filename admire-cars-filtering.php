<?php
/**
 * @package Admire cars filtering
 */
/*
Plugin Name: Admire cars filtering
Plugin URI: https://github.com/savepong/admire-cars-filtering
Description: 
Version: 1.1
Author: Pongsiri Chuaychoonoo
Author URI: https://savepong.com
*/

add_shortcode('admire-cars-filtering', 'car_filter');
add_shortcode('admire-cars', 'get_cars');

function car_filter() {

	$type 		= isset($_GET['type']) 		? $_GET['type'] : '';
	$brand 		= isset($_GET['brand']) 	? $_GET['brand'] : '';		
	$model 		= isset($_GET['model']) 	? $_GET['model'] : '';
	$year 		= isset($_GET['y']) 		? $_GET['y'] : '';
	$price 		= isset($_GET['price']) 	? $_GET['price'] : '';
	$installment 	= isset($_GET['installment']) 	? $_GET['installment'] : '';

    $types	= get_categories( array(
        'orderby' 	=> 'name',
        'order'		=> 'ASC',
        'parent'  	=> 162 
    ));

    $brands = get_categories( array(
        'orderby' => 'name',
        'parent'  => 84
    ));

    if(!empty($brand)){
        $models = get_categories( array(
                    'orderby' 	=> 'name',
                    'order'	=> 'asc',
                    'parent'  	=> $brand
        ));
    }

    $years 	= get_categories( array(
        'orderby' => 'name',
        'order'	=> 'desc',
        'parent'  => 126
    ));

    $prices = get_categories( array(
        'orderby' => 'name',
        'parent'  => 121
    ));

    $installments	= get_categories( array(
        'orderby' 	=> 'id',
        'order'		=> 'ASC',
        'parent'  	=> 144 
    ));


    echo '
	<div class="container">
		<div class="template-page content  av-content-full alpha units">
			<div class="post-entry post-entry-type-page post-entry-6690">
				<div class="entry-content-wrapper clearfix">
                    <section class="av_textblock_section" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
	                    <div class="avia_textblock " itemprop="text" >
                            <form action="" method="get" class="searchandfilter">
                            <div>
                                <ul>
                                    <li style="display:none">
                                        <label>ประเภท:</label>
                                        <select name="brand" class="postform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                            <option value="?type=&brand='.$brand.'&model='.$model.'&y='.$year.'&price='.$price.'&installment='.$installment.'" selected="selected">ทุกประเภท</option>';
                                            foreach($types as $item):				    
                                                $selected = ($type==$item->cat_ID) ? 'selected' : '';
                                                echo '<option value="?type='.$item->cat_ID.'&brand='.$brand.'&model='.$model.'&y='.$year.'&price='.$price.'&installment='.$installment.'" '.$selected.'>'.$item->name.'</option>';
                                            endforeach;
                                        
                                        echo '
                                        </select>
                                    </li>
                                    <li>
                                        <label>ยี่ห้อ:</label>
                                        <select name="brand" class="postform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                            <option value="?type='.$type.'&brand=&model='.$model.'&y='.$year.'&price='.$price.'&installment='.$installment.'" selected="selected">ทุกยี่ห้อ</option>';
                                            foreach($brands as $item):				    
                                                $selected = ($brand==$item->cat_ID) ? 'selected' : '';
                                                echo '<option value="?type='.$type.'&brand='.$item->cat_ID.'&model='.$model.'&y='.$year.'&price='.$price.'&installment='.$installment.'" '.$selected.'>'.$item->name.'</option>';
                                            endforeach;
                                        echo '
                                        </select>
                                    </li>';

                                    if(!empty($brand)):
                                    echo '
                                    <li>
                                        <label>รุ่น:</label>
                                        <select name="brand" class="postform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                            <option value="?type='.$type.'&brand='.$brand.'&model=&y='.$year.'&price='.$price.'&installment='.$installment.'" selected="selected">ทุกรุ่น</option>';
                                            foreach($models as $item):				    
                                                $selected = ($model==$item->cat_ID) ? 'selected' : '';
                                                echo '<option value="?type='.$type.'&brand='.$brand.'&model='.$item->cat_ID.'&y='.$year.'&price='.$price.'&installment='.$installment.'" '.$selected.'>'.$item->name.'</option>';
                                            endforeach;
                                        echo '
                                        </select>
                                    </li>';
                                    endif;

                                    echo '
                                    <li>
                                        <label>ปี:</label>
                                        <select name="brand" class="postform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                            <option value="?type='.$type.'&brand='.$brand.'&model='.$model.'&y=&price='.$price.'&installment='.$installment.'" selected="selected">ทุกปี</option>';
                                            foreach($years as $item):				    
                                                $selected = ($year==$item->cat_ID) ? 'selected' : '';
                                                echo '<option value="?type='.$type.'&brand='.$brand.'&model='.$model.'&y='.$item->cat_ID.'&price='.$price.'&installment='.$installment.'" '.$selected.'>'.$item->name.'</option>';
                                            endforeach;
                                            
                                        echo '
                                        </select>
                                    </li>
                                    <li>
                                        <label>ช่วงราคา:</label>
                                        <select name="brand" class="postform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                            <option value="?type='.$type.'&brand='.$brand.'&model='.$model.'&y='.$year.'&price=&installment='.$installment.'"  selected="selected">ทุกช่วงราคา</option>';
                                            foreach($prices as $item):				    
                                                $selected = ($price==$item->cat_ID) ? 'selected' : '';
                                                echo '<option value="?type='.$type.'&brand='.$brand.'&model='.$model.'&y='.$year.'&price='.$item->cat_ID.'&installment='.$installment.'" '.$selected.'>'.$item->name.'</option>';
                                            endforeach;
                                            
                                        echo '
                                        </select>
                                    </li>
                                    <li>
                                        <label>ค่างวด:</label>
                                        <select name="brand" class="postform" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                            <option value="?type='.$type.'&brand='.$brand.'&model='.$model.'&y='.$year.'&price='.$price.'&installment=" selected="selected">ค่างวดทั้งหมด</option>';
                                            foreach($installments as $item):				    
                                                $selected = ($installment==$item->cat_ID) ? 'selected' : '';
                                                echo '<option value="?type='.$type.'&brand='.$brand.'&model='.$model.'&y='.$year.'&price='.$price.'&installment='.$item->cat_ID.'" '.$selected.'>'.$item->name.'</option>';
                                            endforeach;
                                        echo '
                                        </select>
                                    </li>
                                    <li>
                                        <a href="?all">ดูรถทั้งหมด</a>
                                    </li>
                                </ul>
                            </div>
                            </form>
                        </div>
                    </section>
                </div>
			</div>
		</div><!-- close content main div -->
	</div>
    ';
}


function get_cars( $args = null ) {

    $type 		= !empty($_GET['type']) 	? $_GET['type'] : 84;
    $brand 		= !empty($_GET['brand']) 	? $_GET['brand'] : 84;
    $model 		= !empty($_GET['model']) 	? $_GET['model'] : 84;
    $year 		= !empty($_GET['y']) 		? $_GET['y'] : 84;
    $price 		= !empty($_GET['price']) 	? $_GET['price'] : 84;
    $installment 	= !empty($_GET['installment']) 	? $_GET['installment'] : 84;

    
    $the_query = new WP_Query( array( 
			'category__and' => array($type, $brand, $model, $year, $price, $installment) 
		));
    
    
    // The Loop
    if ( $the_query->have_posts() ) {

    echo '
        <div id="use-car" class="main_color  avia-builder-el-5  el_after_av_section  avia-builder-el-last  masonry-not-first container_wrap fullsize">
            <div id="av-masonry-1" class="av-masonry noHover av-flex-size av-large-gap av-hover-overlay- av-masonry-col-3 av-caption-always av-caption-style-  avia_sortable_active">
                <div class="av-masonry-container isotope" style="position: relative; height: 1792.94px;">
                    <div class="av-masonry-entry isotope-item av-masonry-item-no-image all_sort 2_sort  mazda_sort  usecar_sort  525d_sort  bmw_sort  x1_sort  accord_sort  honda_sort  mini-cooper_sort  r56_sort  s_sort  toyota_sort  yaris_sort  3_sort  alphard_sort  benz_sort  clk-240_sort  av-masonry-item-loaded" style="position: absolute; left: 0px; top: 0px;"></div>
                    ';

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        echo '
                            <a href="' . get_the_permalink() . '" id="av-masonry-1-item-6527" data-av-masonry-item="6527" class="av-masonry-entry isotope-item post-6527 post type-post status-publish format-standard has-post-thumbnail hentry category-86 category-mazda category-usecar all_sort 2_sort  mazda_sort  usecar_sort  av-masonry-item-with-image av-masonry-item-loaded" title="'.get_the_title().'" itemscope="itemscope" itemtype="https://schema.org/CreativeWork" style="position: absolute; left: 0px; top: 0px;">
                                <div class="av-inner-masonry-sizer"></div>
                                <figure class="av-inner-masonry main_color">
                                    <div class="av-masonry-outerimage-container">
                                        <div class="av-masonry-image-container" style="background-image: url('.get_the_post_thumbnail_url( get_the_ID() ).');">
                                            <img src="'.get_the_post_thumbnail_url( get_the_ID() ).'" title="car-01-01" alt="" scale="0">
                                        </div>
                                    </div>
                                    <figcaption class="av-inner-masonry-content site-background">
                                        <div class="av-inner-masonry-content-pos">
                                            <div class="av-inner-masonry-content-pos-content">
                                                <div class="avia-arrow"></div>
                                                <h3 class="av-masonry-entry-title entry-title" itemprop="headline">' . get_the_title() . '</h3>
                                                <span class="av-masonry-date meta-color updated">' . get_the_date() . '</span>
                                                <span class="av-masonry-text-sep text-sep-author">/</span>
                                                <span class="av-masonry-author meta-color vcard author">
                                                    <span class="fn">by Admin</span>
                                                </span>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                            <!--end av-masonry entry-->
                        ';          
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                
                    echo '
                    </div>
                </div>
            </div>
        </div>
        ';

    } else {
    ?>
        <div class="container" style="text-align:center">
            <p><b>ไม่พบรถที่คุณค้นหา</b></p>
        </div>
    <?php
    }
 
}
