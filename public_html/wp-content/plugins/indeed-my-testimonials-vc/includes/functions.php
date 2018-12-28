<?php
function imtst_checkupdatecf_vc($custom_field, $value, $post_id){
    //create or update a custom field
    $data = get_post_meta($post_id, $custom_field, TRUE);
    if(isset($data)) update_post_meta($post_id, $custom_field, $value);
    else add_post_meta($post_id, $custom_field, $value, TRUE);
}
/***********************TESTI FUNCTIONS***************************/
function imtst_metabox_ti_vc($testimonials){
    $job = esc_html(get_post_meta($testimonials->ID, 'imtst_jobtitle', true));
    $client_url = esc_html(get_post_meta($testimonials->ID, 'imtst_clienturl', true));
    $company = esc_html(get_post_meta($testimonials->ID, 'imtst_company', true));
    $company_url = esc_html(get_post_meta($testimonials->ID, 'imtst_companyurl', true));
    ?>
	<div class="ictst_wrap">
    <table class="it-table">
		<tr>
            <td class="it-label"><i class="icon-tags"></i> Client Job: </td>
            <td>
                <input type="text" value="<?php echo $job;?>" name="imtst_jobtitle" />
            </td>
        </tr>
		<tr>
            <td class="it-label"><i class="icon-share"></i> Client URL: </td>
            <td>
                <input type="text" value="<?php echo $client_url;?>" name="imtst_clienturl" />
            </td>
        </tr>
		<tr>
            <td class="it-label"><i class="icon-bookmark"></i> Company: </td>
            <td>
                <input type="text" value="<?php echo $company;?>" name="imtst_company" />
            </td>
        </tr>
		<tr>
            <td class="it-label"><i class="icon-share"></i> Company URL: </td>
            <td>
                <input type="text" value="<?php echo $company_url;?>" name="imtst_companyurl" />
            </td>
        </tr>
	</table>
	</div>
    <div class="clear"></div>
<?php
}
function imtst_save_ti_vc($post_id){
    if( isset($_POST['imtst_jobtitle']) ) imtst_checkupdatecf_vc('imtst_jobtitle', $_POST['imtst_jobtitle'], $post_id);
    if( isset($_POST['imtst_clienturl']) ) imtst_checkupdatecf_vc('imtst_clienturl', $_POST['imtst_clienturl'], $post_id);
    if( isset($_POST['imtst_company']) ) imtst_checkupdatecf_vc('imtst_company', $_POST['imtst_company'], $post_id);
    if( isset($_POST['imtst_companyurl']) ) imtst_checkupdatecf_vc('imtst_companyurl', $_POST['imtst_companyurl'], $post_id);
    if( isset($_POST['imtst_stars']) ) imtst_checkupdatecf_vc('imtst_stars', $_POST['imtst_stars'], $post_id);
	if( isset($_POST['imtst_testi_href']) ) imtst_checkupdatecf_vc('imtst_testi_href', $_POST['imtst_testi_href'], $post_id);
	if( isset($_POST['imtst_testi_href-custom']) ) imtst_checkupdatecf_vc('imtst_testi_href-custom', $_POST['imtst_testi_href-custom'], $post_id);
}
function imtst_metabox_rating_vc($testimonials){
    $stars = esc_html(get_post_meta($testimonials->ID, 'imtst_stars', true));
    ?>
		<div class="ictst_wrap">
        <div class="wrapperStars">
                <?php
                for($i=1;$i<6;$i++){
                $class = 'unselected_star';
                if(isset($stars) && $i<=$stars) $class = 'selected_star';
                ?>
                    <div class="<?php echo $class;?>" id="client_star_<?php echo $i;?>" onClick="update_stars(<?php echo $i;?>, '#client_star_', '#clients_stars', 'unselected_star', 'selected_star');" onMouseOver="starHoverSelect(<?php echo $i;?>, '#client_star_', 'unselected_star', 'selected_star');" onMouseOut="updateStars(<?php echo $i;?>, '#client_star_', '#clients_stars', 'unselected_star', 'selected_star');"></div>
                <?php
                }
            ?>
            <div class="clear"></div>
        </div>
		</div>
        <input type="hidden" value="<?php echo $stars;?>" name="imtst_stars" id="clients_stars" />
    <?php
}
function imtst_return_stars_vc($rating_num){
    $str = "<div class='wrapperStars_fe'>";
    for($i=1;$i<6;$i++){
        $class = 'unselected_star';
        if( $i<=$rating_num) $class = 'selected_star';
        $str .= "<div class='$class'></div>";
    }
    $str .= "<div class='clear'></div></div>";
    return $str;
}
function imtstCustomHrefMetaBox_vc(){
	global $post;
	$data = '';
	$data = get_post_meta($post->ID, 'imtst_testi_href', TRUE);
	$arr = imtst_get_all_pages_and_posts_vc();
	$arr[-2] = 'None';	
	$arr[-1] = 'Custom Link ...';
	ksort($arr);
	?>
		<div>
			Select an option:
			<select name="imtst_testi_href" onChange="imtstTestiCustomHrefVc(this.value, '#imtst_custom_href_div');">
				<?php 
					foreach ($arr as $k=>$v){
						?>
							<option value="<?php echo $k;?>" <?php if ($k==$data) echo 'selected';?> ><?php echo $v;?></option>
						<?php 	
					}
				?>
			</select>
		</div>
		<?php 
			/////custom href	
		$custom = get_post_meta($post->ID, 'imtst_testi_href-custom', TRUE);
		?>
			<div style="margin-top: 10px;<?php if ($data==-1) echo 'display: block;'; else echo 'display:none;'?>" id="imtst_custom_href_div">
				<strong>Custom Link:</strong>
				<input type="text" value="<?php echo $custom;?>" name="imtst_testi_href-custom" style="min-width: 303px;"/>
			</div>
		<?php 	
}
function imtst_get_all_pages_and_posts_vc(){
	$arr = array();
	$args = array(
			'posts_per_page' => 100,
			'sort_order' => 'DESC',
			'sort_column' => 'post_title',
			'post_type' => array( 'page', 'post' ),
			'orderby' => 'menu_order',
			'post_status' => 'publish',
	);
	$items = new WP_Query( $args );
	
	if (isset($items->posts) && count($items->posts)){
		foreach ($items->posts as $item){
			if ($item->post_title=='') $item->post_title = '(no title)';
			$arr[$item->ID] = $item->post_title;
		}
	}
	return $arr;	
}

function imtst_returnCheckString_vc($var){
    if(isset($var) && $var!='') return sanitize_text_field($var);
    else return '';
}
function imtst_check_req_vc($string, $substring){
    if (strpos($string, $substring) !== false) return "<span class='imtst_req_sign'>*</span>";
    else return "";
}
function imtst_ckreqpostval_vc( $req_string, $post_name, $post_value ){
    if(strpos($req_string, $post_name)!==false){
        if($post_value=='') return TRUE;
    }
    return FALSE;
}
function imtst_return_capcha_question_vc( $key ){
	$capcha_q = array(  0 => '3x3+3',
						1 => '4x2+1',
						2 => '5x5-5',
						3 => '10+9-1',
						4 => '1x2/2',
						5 => '4x4+6' );
	return $capcha_q[ $key ];
}
function imtst_return_capcha_answer_vc( $key ){
	$capcha_answers = array(  0 => 12,
							  1 => 9,
							  2 => 20,
							  3 => 18,
							  4 => 1,
							  5 => 22 );
	return $capcha_answers[ $key ];
}

function imtst_general_settings_meta_vc(){
	$arr = array(
			'imtst_responsive_settings_small' => 1,
			'imtst_responsive_settings_medium' => 2,
			'imtst_responsive_settings_large' => 'auto',
			'imtst_custom_page_entry_infos' => 'name,quote,image,job,client_url,company,company_url,stars,date',
			'imtst_custom_css' => '',
			'imtst_rich_snippets' => 0,
			'default_client_img' => IMTST_DIR_URL_VC.'files/images/imtst_default_avatar.jpg',
			'imtst_target_blank' => 0,
	);
	foreach($arr as $key=>$value){
		if(get_option($key)!==FALSE){
			$arr[$key] = get_option($key);
		}
	}
	return $arr;
}

function imtst_save_update_metas_vc(){
	$arr = imtst_general_settings_meta_vc();
	foreach($arr as $key=>$value){
		if(get_option($key)!==FALSE){
			update_option($key, $_REQUEST[$key]);
		}else{
			add_option($key, $_REQUEST[$key]);
		}
	}
}

function imtst_format_quote_vc( $str ){
	$str = preg_replace("/\n\n+/", "\n\n", $str);
	$str_arr = preg_split('/\n\s*\n/', $str, -1, PREG_SPLIT_NO_EMPTY);
	$str = '';

	foreach ( $str_arr as $str_val ) {
		$str .= '<p>' . trim($str_val, "\n") . "</p>\n";
	}
	return $str;
}

function imtst_return_read_more_cq_vc($base_id, $quote, $full_content, $color=''){
	$color_read = '';
	if($color!='') $color_read = 'color: #'.$color.';';
	$str = '';
	$str .= '<div class="imtst_quote_show" id="'.$base_id.'" >'.$quote.'</div>';
	$str .= '<div class="" style="display: block;text-align: right;cursor: pointer;'.$color_read.'" id="read_more-'.$base_id.'" onClick="imtst_full_quote(1, \''.$base_id.'\');" >'.__('Read More', 'imtst').'</div>';
	$str .= '<div id="full_quote-'.$base_id.'" class="imtst_quote_hide">'.$full_content.'</div>';
	$str .= '<div style="text-align: right;display: none;cursor: pointer;'.$color_read.'" id="read_less-'.$base_id.'" onClick="imtst_full_quote(0, \''.$base_id.'\');">'.__('Read Less', 'imtst').'</div>';
	return $str;
}

if(!function_exists('imtst_return_infos_str_for_template')){
	function imtst_return_infos_str_for_template(){
		global $post;
		$str = array('name'=>'',
				'quote'=>'',
				'image'=>'',
				'job'=>'',
				'client_url'=>'',
				'company'=>'',
				'company_url'=>'',
				'rating'=>'',
				'date'=>'' );
		$entry_info = get_option('imtst_custom_page_entry_infos');
		if($entry_info!==FALSE){
			$infos = explode(',', $entry_info);
			////NAME
			if(in_array('name', $infos)) $str['name'] = get_the_title($post->ID);
			////QUOTE
			if(in_array('quote', $infos))$str['quote'] = $post->post_content;
			////IMAGE
			if(in_array('image', $infos)) $str['image'] = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', false, '' );
			////CLIENT JOB
			if(in_array('job', $infos))$str['job'] = get_post_meta( $post->ID, 'imtst_jobtitle', true );
			////CLIENT URL
			if(in_array('client_url', $infos)) $str['client_url'] = get_post_meta( $post->ID, 'imtst_clienturl', true );
			////COMPANY
			if(in_array('company', $infos)) $str['company'] = get_post_meta( $post->ID, 'imtst_company', true );
			////COMPANY URL
			if(in_array('company_url', $infos)) $str['company_url'] = get_post_meta( $post->ID, 'imtst_companyurl', true );
			////STARS
			if(in_array('stars', $infos)) $str['rating'] = get_post_meta( $post->ID, 'imtst_stars', true );
			////DATE
			if(in_array('date', $infos)) $str['date'] = get_the_time('Y-m-d', $post->ID);
		}
		return $str;
	}
}

function imtst_reorder_by_last_name_vc($arr, $order){
	$temp_arr = array();
	$j = 0;
	foreach($arr as $obj){
		$name = get_the_title($obj->ID);
		try {
			if (strpos($name, ' ')!==FALSE){
				$name_arr = explode(' ', $name);
				if ($name_arr){
					$name = '';
					$count_name_arr = count($name_arr);
					for ($x=$count_name_arr-1; $x>=0; $x--){
						$name .= $name_arr[$x];
					}
				}			
			}			
		} catch (Exception $e){}
		
		if (isset($name) && $name!=''){
			if (array_key_exists($name, $temp_arr)){
				$temp_arr[$name.$j] = $obj;
				$j++;
			} else {
				$temp_arr[$name] = $obj;
			}
		} else {
			$temp_arr[] = $obj;
		}
	}
	if ($order=='ASC'){
		ksort($temp_arr);
	} else {
		krsort($temp_arr);
	}
	return $temp_arr;
}

function imtst_return_google_rich_snippets_vc($rich_arr, $type = 'multiple'){
	if(!isset($rich_arr['rating']) || $rich_arr['rating']=='') return '';
	$str = '';
	
	#if($type == 'single') {
		#single
		$str .= '<article class="hentry" style="display: none;">';
		$str .= '<h1 class="entry-title">'.$rich_arr['title'].'</h1>';
		$str .= '<span class="updated">'.$rich_arr['publish_date'].'</span>';
		$str .= '<span class="author vcard"><span class="fn">' . $rich_arr['post_author'] . '</span></span>';
		$str .= '<div class="entry-content">' . $rich_arr['description'] . '</div>';			
		$str .= '</article>';
	#}

	if($type == 'single') $str .= '<div itemscope=" " itemtype="http://schema.org/Product"><meta itemprop="name" content="Testimonials Reviews">';
	
		$str .= '<div itemprop="review" itemscope itemtype="http://schema.org/Review" style="display:none;">';
			$str .= '<span itemprop="name">' . $rich_arr['title'] . '</span>';
			$str .= '<span itemprop="author">' . $rich_arr['title'] . '</span>';
			$str .= '<meta itemprop="datePublished" content="' . $rich_arr['publish_date'] . '">';
			$str .= '<div itemprop="reviewRating" itemscope=" " itemtype="http://schema.org/Rating">';
				$str .= '<meta itemprop="worstRating" content = "1">';
				$str .= '<span itemprop="ratingValue">' . $rich_arr['rating'] . '</span>';
				$str .= '<span itemprop="bestRating">5stars</span>';
			$str .= '</div>';
			$str .= '<span itemprop="description">' . $rich_arr['description'] . '</span>';
		$str .= '</div>';
	
	if($type == 'single') $str .= '</div>';
	
	return $str;
}

function imtstvc_admin_get_all_themes(){
	//standard themes
	$handle = opendir( IMTST_DIR_PATH_VC . 'themes' );
	while (false !== ($entry = readdir($handle))) {
		if ($entry!='.' && $entry!='..'){
			$arr_str = explode('_', $entry);
			$themes_arr[$arr_str[1]] = $arr_str[0];
		}
	}
	ksort($themes_arr);

	//special themes
	$plugins_arr = array('indeed-my-testimonials-theme-pack');//list of plugins where to search for themes
	foreach ($plugins_arr as $name){
		$plugin_dir = str_replace('indeed-my-testimonials-vc', $name, IMTST_DIR_PATH_VC );
		if (file_exists($plugin_dir)){
			$handle = opendir( $plugin_dir . 'themes' );
			while (false !== ($entry = readdir($handle))) {
				if ($entry!='.' && $entry!='..'){
					$arr_str = explode('_', $entry);
					$themes_arr[$arr_str[1]] = $arr_str[0];
				}
			}
		}
	}

	return $themes_arr;
}

function imtst_get_cats_for_vc_admin(){
	$cat_arr = array('-1'=>'...');
	$args = array(
			'taxonomy' => IMTST_TAXONOMY_VC,
			'type' => IMTST_POST_TYPE_VC,
			'hide_empty' => 0
	);
	$cats = get_categories($args);
	if (isset($cats) && count($cats)>0){
		foreach ($cats as $cat){
			$cat_arr[$cat->slug] = $cat->name;
		}
	}
	return $cat_arr;
}

function indeed_print_dashboard_widget_imtstvc() {
	//DASHbOARD WIDGET
	$args = array(
			'posts_per_page'   => 25,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => IMTST_POST_TYPE_VC,
			'post_status'      => 'pending',
	);
	$testimonials = get_posts($args);
	if ($testimonials && count($testimonials)){
		?>
		<div class="indeed-widget-dashboard-wrapp">
			<?php 
			$i = 1;
			foreach ($testimonials as $testimonial){
				$class = 'odd';
				if ($i/2==0) $class = 'even';			
			?>
				<div class="indeed-widget-dashboard-item">
					<?php 
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($testimonial->ID), '', false, '' );
						if (isset($src[0])){
							$img_src = $src[0];
						} else {
							$img_src = get_option('default_client_img');
						}
						if ($img_src){
							?>
								<img src="<?php echo $img_src;?>" class="imtst-dashboard-avatar" height="50" width="50" />
							<?php 	
						}
					?>
					<div class="imtst-dashboard-testimonial-text">
						<h4 class="comment-meta">
							From 
								<span class="comment-author">
									<?php echo $testimonial->post_title;?>
								</span>
							on <span class="comment-date"><?php echo $testimonial->post_date;?></span>
							<span class="imtst-approve">[Pending]</span>
						</h4>
						<blockquote><p>
						<?php 
							$quote = $testimonial->post_content;
							$quote = mb_substr( $quote , 0,  50) . '...';
							echo $quote;
						?>
						</p></blockquote>
					</div>
				</div>
			<?php 
			    $i++;
			}
			?>		
			</div>		
		<?php 
	}
}

function imtst_default_shortcode_values($arr){
	/*
	 * check every shortcode arg if it's not empty
	 * @param array with meta for shortcode
	 * @return array 
	 */
	$default_arr = array(
							'group' => 'all',
							'limit' => 10,
							'max_num_desc' => 250,
							'read_more' => 0,
							'order_by' => 'name',
							'order' => 'ASC',
							'entry_information' => '',
							'show' => 'name,image,quote,job,stars',
							'template' => '',
							'theme' => '',
							'color_scheme' => '0a9fd8',
							'disable_hover' => 0,
							'align_center' => 0,
							'columns' => 2,
							'slider_title' => '',
							'slider_set' => 0,
							'items_per_slide' => 1,
							'slide_speed' => 5000,
							'slide_pagination_speed' => 500, 
							'slide_opt' => 'bullets,nav_button,autoplay,stop_hover,responsive,autoheight,loop',
							'pagination_theme' => 'pag-theme1',
							'animation_in' => 'none',
							'animation_out' => 'none',
							'filter_title' => '',
							'filter_set' => 0,
							'filter_select_t' => 'small_text',
							'filter_align' => 'left',
							'insidepage_title' => '',
							'page_inside' => 0,
							'inside_template' => '',
						);
	foreach ($default_arr as $k=>$v){
		if (empty($arr[$k])) $arr[$k] = $v;	
	}
	return $arr;
}

function imtst_default_shortcode_values_form($arr){
	/*
	 * check every shortcode arg if it's not empty
	 * @param array with meta for shortcode
	 * @return array
	 */
	$cat_arr = imtst_get_cats_for_vc_admin();
	$default_arr = array(
							'show' => 'client_name,client_job,company,quote',
							'd_group' => $cat_arr,
							'required_title' => '',
							'req' => 'client_name,quote',
							'label_title' => '',
							'label' => '',
							'client_name' => __("Name", 'imtst'),
							'client_image' => __("Image", 'imtst'),
							'client_job' => __("Position", 'imtst'),
							'param_name' => __("URL", 'imtst'),
							'company' => __("Company", 'imtst'),
							'company_url' => __("Company URL", 'imtst'),
							'quote' => __("Testimonial", 'imtst'),
							'capcha_label' => __("CapCha", 'imtst'), 
							'rating' => __("Rating", 'imtst'),
							'messages_title' => '',
							'e_msg' => __("Thank you for your submitted testimonial!", 'imtst'),
							'err_msg' => __("An Error has Occurred. Please Try Again and complete all the required fields!", 'imtst'),
						);
	foreach ($default_arr as $k=>$v){
		if (empty($arr[$k])) $arr[$k] = $v;	
	}
	return $arr;
}

if (!function_exists('indeed_convert_date_to_us_format')):
function indeed_convert_date_to_us_format($date=''){
	/*
	 * @param string
	 * @return string
	 */
	if ($date && $date!='-' && is_string($date)){
		@$date = strtotime($date); 
		//$format = 'F j, Y';
		$format = get_option('date_format');
		$return_date = date_i18n($format, $date);
		return $return_date;
	}
	return $date;
}
endif;
