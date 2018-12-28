<?php
/*
Plugin Name: Indeed My Testimonials (Visual Composer Version)
Plugin URI: http://www.wpindeed.com/
Description: The most shainny Testimonials Showcase plugin. With predifined themes and colors scheme you can display your testimonials with few clicks and without any line of code.
Version: 3.8
Author: indeed
Author URI: http://www.wpindeed.com
*/
if (get_option('imtst_post_type_name')!==FALSE && get_option('imtst_post_type_name')!='' ){
	define('IMTST_POST_TYPE_VC', get_option('imtst_post_type_name'));
	if (IMTST_POST_TYPE_VC=='tetimonials'){
		define('IMTST_TAXONOMY_VC', 'testimonial_groups');
	} else {
		define('IMTST_TAXONOMY_VC', IMTST_POST_TYPE_VC . '_groups');
	}
} else {
	global $wpdb;
	$temp_check = $wpdb->get_var("SELECT COUNT(*) as c FROM {$wpdb->postmeta} WHERE meta_key='imtst_clienturl';");
	if ($temp_check){
		define('IMTST_POST_TYPE_VC', 'testimonials');
		define('IMTST_TAXONOMY_VC', 'team_cats');	
	} else {
		define('IMTST_POST_TYPE_VC', 'imtst_testimonials');
		define('IMTST_TAXONOMY_VC', 'imtst_testimonial_groups');	
	}
	update_option('imtst_post_type_name', IMTST_POST_TYPE_VC);
} 

define('IMTST_DIR_URL_VC', plugin_dir_url(__FILE__));
define('IMTST_DIR_PATH_VC', plugin_dir_path(__FILE__));

add_action('init', 'imtst_load_language_vc');
function imtst_load_language_vc(){
	load_plugin_textdomain( 'imtst', false, dirname(plugin_basename(__FILE__)).'/languages/' );
}

///FUNCTIONS
include_once IMTST_DIR_PATH_VC . 'includes/functions.php';
/////VISUAL COMPOSER
function imtst_check_vc(){
    if(function_exists('vc_map')){
      //gettings cats
      $args = array(
                    'taxonomy' => IMTST_TAXONOMY_VC,
                    'type' => IMTST_POST_TYPE_VC,
					'hide_empty' => 0,
					'orderby' => 'slug');
      $cats = get_categories($args);
      if(isset($cats) && count($cats)>0){
          foreach($cats as $cat){
                $cat_arr[$cat->slug] = $cat->name;
                $cat_arr_keys[] = $cat->slug;
          }
          $cats_str = implode(',', $cat_arr_keys);
      }else{
            $cat_arr = array();
            $cats_str = '';
      }
        include_once IMTST_DIR_PATH_VC . 'includes/imt_vc_functions.php';
        $dir_url = IMTST_DIR_URL_VC;
        vc_map( array(
        			   "name" => "My Testimonials",
        			   "base" => "indeed-my-testimonials-vc",
        			   "icon" => "icon-wpb-ttp",
                       "description" => "Show My Testimonials",
    			       "class" => "indeed-my-testimonials",
    			       "category" => __('Content', "js_composer"),
        			   "params" => array(
					
        									array(
        										"type" => "imtst_select_cats",
        										"heading" => __("Group", 'imtst'),
        										"param_name" => "group",
                                                "admin_label" => TRUE,
        										"value" => "all",
        										"description" => "Select one or many Groups with Testimonials"
        									),
                                            array(
                                                "type" => "imtst_number",
        										"heading" => __("Number of items", 'imtst'),
        										"param_name" => "limit",
                                                "admin_label" => TRUE,
        										"value" => 10,
        										"param_min_value" => 1,
        										"description" => ""
                                            ),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line1",
												  'value' => '',
											),
        			   						array(
        			   								"type" => "imtst_number",        			   							
        			   								"heading" => __("Maximum Number Of Characters", 'imtst'),        			   								      			   								
        			   								"value" => 250,        			   								
        			   								"param_min_value" => 0,        			   							
        			   								"description" => "If the Quote is bigger than this value it will be cutted.",
        			   							    "param_name" => "max_num_desc",	
														
        			   						),
        			   						array(
        			   								"type" => "imtst_checkbox_field",
        			   								"label" => __(" Read More", 'imtst'),
        			   								"id_checkbox" => "",
        			   								"value" => 0,
        			   								"id_hidden" => "read_more",
        			   								"param_name" => "read_more",
        			   								"onClick" => "",
													"description" => "Add the Expandable option to see the entire Quote.",
        			   								"extra_text" => "<div class='warning_grey_span'>" . __('Is not available with filter display.', 'imtst') . "</div>",	
        			   						),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line2",
												  'value' => '',
											),
        									array(
        										"type" => "imtst_custom_dd",
        										"heading" => __("Order By", 'imtst'),
                                                "select_id" => "order_by_sel",
                                                "onclick" => "",
        										"param_name" => "order_by",
        										"values" => array("date" => __("Date", 'imtst'), "name" => __("Name", 'imtst'), 'last_name' => __('Last Name', 'imtst'), "rand"=> __("Random", 'imtst') ),
        			   							"value" => "name"
        									),
        									array(
        										"type" => "imtst_custom_dd",
        										"heading" => __("Order Type", 'imtst'),
                                                "select_id" => "order_type_sel",
        										"param_name" => "order",
                                                "onclick" => "",
        										"values" => array("ASC" => __("ASC", 'imtst'), "DESC" => __("DESC", 'imtst') ),
												"value" => "ASC"
        									),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line3",
											      'value' => '',
											),
											array(
        										  "type" => 'imtst_title_block_imtst_bkcolor6',
        										  "heading" => __("Entry Information", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "entry_information",
												  "wrap_class" => "imtst_vc_title"
											),
        									array(
        										  "type" => 'imtst_checkbox_block',
        										  "heading" => __("Custom Field To Show:", 'imtst'),
        										  "hidden_name" => "show",
                                                  "hidden_id" => "hidden_i_cf",
        										  "param_name" => "show",
        										  "checkboxes" => array("name" => __(" Name", 'imtst'),
                                                                        "image" => __(" Image", 'imtst'),
                                                                        "quote" => __(" Quote", 'imtst'),
                                                                        "job" => __(" Client Job", 'imtst'),
                                                                        "client_url" => __(" Client URL", 'imtst'),
                                                                        "company" => __(" Company", 'imtst'),
                                                                        "company_url" => __(" Company URL", 'imtst'),
                                                                        "stars" => __(" Stars", 'imtst'),
                                                                        "date" => __(" Date", 'imtst'),
                                                                        ),
        										  "value" => "name,image,quote,job,stars"
        									),
											array(
        										  "type" => 'imtst_title_block_imtst_bkcolor1',
        										  "heading" => __("Template", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "template",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
                                                "type" => "imtst_select_themes",
                                                "heading" => __("Select a Theme", 'imtst'),
                                                "param_name" => "theme",
                                                "value" => "",
                                            ),
                                            array(
                                                "type" => "imtst_color_scheme",
                                                "heading" => __("Select Color Scheme", 'imtst'),
                                                "param_name" => "color_scheme",
                                                "value" => "0a9fd8"
                                            ),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line4",
												  'value' => '',
											),
                                            array(
                                                "type" => "imtst_checkbox_field",
                                                "label" => __(" Disable Hover Effect", 'imtst'),
                                                "id_checkbox" => "",
                                                "value" => 0,
                                                "onClick" => "",
                                                "id_hidden" => "disable_hover_effect",
                                                "param_name" => "disable_hover",
                                            ),
				        			   		array(
				        			   				"type" => "imtst_checkbox_field",
				        			   				"label" => __(" Align The Items Centered", 'imtst'),
				        			   				"id_checkbox" => "align_center",
				        			   				"value" => 0,
				        			   				"id_hidden" => "h_align_center",
				        			   				"param_name" => "align_center",
				        			   				"onClick" => ""
				        			   		), 
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line5",
												  'value' => '',
											),       			   		
                                            array(
        										"type" => "dropdown",
        										"heading" => __("Number of Columns:", 'imtst'),
        										"param_name" => "columns",
        										"value" => array(1,2,3,4,5,6),
                                                "std" => 2
                                            ),
                                            ///////////////SLIDER
											array(
        										  "type" => 'imtst_title_block_imtst_bkcolor2',
        										  "heading" => __("Slider ShowCase", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "slider_title",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
                                                "type" => "imtst_checkbox_field_actv",
                                                "label" => __(" Show as Slider", 'imtst'),
												"heading" => __("Activate the Slider", 'imtst'),
                                                "id_checkbox" => "slider_main_checkbox",
                                                "value" => 0,
                                                "id_hidden" => "show_as_slider",
                                                "param_name" => "slider_set",
                                                "onClick" => "check_mf_selector(this, \".slider_options\", \"opacity\", 1, \"0.5\", \".filter_options\", \"#filter_main_checkbox\",\"#show_as_filter\");",
                                                "slider_or_filter" => "slider",												
												"extra_text" => "<div class='warning_grey_span'>" . __('If Slider Showcase is used, Filter Showcase is disabled.', 'imtst') . "</div>"
                                            ),
        									array(
        										"type" => "imtst_number",
                                                "heading" => __("Items per Slide:", 'imtst'),
        										"param_name" => "items_per_slide",
        										"value" => 1,
                                                "std" => 2,
        										"param_min_value" => 1,
        										"description" => "",
                                                "wrap_div" => TRUE  ,
                                                "wrap_class" => "slider_options",
                                                "slider_or_filter" => "slider"
        									),
        									array(
        										"type" => "imtst_number",
        										"heading" => __("Slide TimeOut", 'imtst'),
        										"param_name" => "slide_speed",
        										"value" => 5000,
        										"param_min_value" => 1,
        										"description" => "",
                                                "wrap_div" => TRUE,
                                                "wrap_class" => "slider_options",
                                                "slider_or_filter" => "slider"
        									),
        									array(
        										"type" => "imtst_number",
        										"heading" => __("Pagination Speed", 'imtst'),
        										"param_name" => "slide_pagination_speed",
        										"value" => 500,
        										"param_min_value" => 1,
        										"description" => "",
                                                "wrap_div" => TRUE,
                                                "wrap_class" => "slider_options",
                                                "slider_or_filter" => "slider"
        									),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line6",
												  'value' => '',
											),
        									array(
        										  "type" => 'imtst_checkbox_block',
        										  "heading" => "Additional Options",
        										  "hidden_name" => "slide_opt",
                                                  "hidden_id" => "hidden_slide_opt",
        										  "param_name" => "slide_opt",
        										  "checkboxes" => array("bullets"=>__(" Bullets", 'imtst'), "nav_button"=>__(" Nav Button", 'imtst'), "autoplay"=>__(" Autoplay", 'imtst'), "stop_hover"=>__(" Stop Hover", 'imtst'), "responsive"=> __(" Responsive", 'imtst'), "autoheight"=> __(" Auto Height", 'imtst'), "lazy_load"=>__(" Lazy Load", 'imtst'), "loop"=>__(" Play in Loop", 'imtst')),
        										  "value" => "bullets,nav_button,autoplay,stop_hover,responsive,autoheight,loop",
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "slider_options",
                                                  "slider_or_filter" => "slider"
        									),
											array(
                                                  "type" => "imtst_custom_dropdown",
                                                  "label" => __("Pagination Theme", 'imtst'),
                                                  "param_name" => "pagination_theme",
                                                  "values" => array("pag-theme1"=>__("Pagination Theme 1", 'imtst'), "pag-theme2"=>__("Pagination Theme 2", 'imtst'), "pag-theme3"=>__("Pagination Theme 3", 'imtst'),),
                                                  "value" => "",
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "slider_options",
                                                  "slider_or_filter" => "slider"
                                            ),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line7",
												  'value' => '',
											),
                                            array(
                                                  "type" => "imtst_custom_dropdown",
                                                  "label" => __("Animation Slide In", 'imtst'),
                                                  "param_name" => "animation_in",
                                                  "values" => array("none"=>__("None", 'imtst'), "fadeIn"=>__("fadeIn", 'imtst'), "fadeInDown"=>__("fadeInDown", 'imtst'), "fadeInUp"=>__("fadeInUp", 'imtst'), "slideInDown"=>__("slideInDown", 'imtst'), "slideInUp"=>__("slideInUp", 'imtst'), "flip"=>__("flip", 'imtst'),
												  					"flipInX"=>__("flipInX", 'imtst'),"flipInY"=>__("flipInY", 'imtst'),"bounceIn"=>__("bounceIn", 'imtst'),"bounceInDown"=>__("bounceInDown", 'imtst'),"bounceInUp"=>__("bounceInUp", 'imtst'),"rotateIn"=>__("rotateIn", 'imtst'),"rotateInDownLeft"=>__("rotateInDownLeft", 'imtst'),
																	"rotateInDownRight"=>__("rotateInDownRight", 'imtst'),"rollIn"=>__("rollIn", 'imtst'),"zoomIn"=>__("zoomIn", 'imtst'),"zoomInDown"=>__("zoomInDown", 'imtst'),"zoomInUp"=>__("zoomInUp", 'imtst')),
                                                  "value" => "",
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "slider_options",
                                                  "slider_or_filter" => "slider"
                                            ),
											 array(
                                                  "type" => "imtst_custom_dropdown",
                                                  "label" => __("Animation Slide Out", 'imtst'),
                                                  "param_name" => "animation_out",
                                                  "values" => array("none"=>__("None", 'imtst'), "fadeOut"=>__("fadeOut", 'imtst'), "fadeOutDown"=>__("fadeOutDown", 'imtst'), "fadeOutUp"=>__("fadeOutUp", 'imtst'), "slideOutDown"=>__("slideOutDown", 'imtst'), "slideOutUp"=>__("slideOutUp", 'imtst'), "flip"=>__("flip", 'imtst'),
												  					"flipOutX"=>__("flipOutX", 'imtst'),"flipOutY"=>__("flipOutY", 'imtst'),"bounceOut"=>__("bounceOut", 'imtst'),"bounceOutDown"=>__("bounceOutDown", 'imtst'),"bounceOutUp"=>__("bounceOutUp", 'imtst'),"rotateOut"=>__("rotateOut", 'imtst'),"rotateOutUpLeft"=>__("rotateOutUpLeft", 'imtst'),
																	"rotateOutUpRight"=>__("rotateOutUpRight", 'imtst'),"rollOut"=>__("rollOut", 'imtst'),"zoomOut"=>__("zoomOut", 'imtst'),"zoomOutDown"=>__("zoomOutDown", 'imtst'),"zoomOutUp"=>__("zoomOutUp", 'imtst')),
                                                  "value" => "",
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "slider_options",
                                                  "slider_or_filter" => "slider"
                                            ),
                                            ////////////FILTER
											array(
        										  "type" => 'imtst_title_block_imtst_bkcolor3',
        										  "heading" => __("Filter ShowCase", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "filter_title",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
                                                "type" => "imtst_checkbox_field_actv",
                                                "label" => __(" Show Filter", 'imtst'),
												"heading" => __("Activate the Filter", 'imtst'),
                                                "id_checkbox" => "filter_main_checkbox",
                                                "value" => 0,
                                                "id_hidden" => "show_as_filter",
                                                "param_name" => "filter_set",
                                                "onClick" => "check_mf_selector(this, \".filter_options\", \"opacity\", 1, \"0.5\", \".slider_options\", \"#slider_main_checkbox\", \"#show_as_slider\");",
                                                "slider_or_filter" => "filter",
												"extra_text" => "<div class='warning_grey_span'>" . __('If Filter Showcase is used, Slider Showcase is disabled.', 'imtst') . "</div>"
                                            ),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line8",
												  'value' => '',
											),
        									array(
        										  "type" => 'imtst_checkbox_block',
        										  "label" => __("Groups", 'imtst'),
												  "heading" => __("Groups List", 'imtst'),
        										  "hidden_name" => "filter_testimonials",
                                                  "hidden_id" => "hidden-filtertestimonials",
        										  "param_name" => "filter_testimonials",
        										  "checkboxes" => $cat_arr,
        										  "value" => '',
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "filter_options",
                                                  "slider_or_filter" => "filter",
        									),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line9",
												  'value' => '',
											),
                                            array(
                                                  "type" => "imtst_custom_dropdown",
                                                  "heading" => __("Theme", 'imtst'),
                                                  "param_name" => "filter_select_t",
                                                  "values" => array('small_text'=>__('Small Text', 'imtst'), 'big_text'=>__('Big Text', 'imtst'), 'small_button'=>__('Small Button', 'imtst'),'big_button'=>__('Big Buttons', 'imtst'),'dropdown'=>__('Drop Down', 'imtst') ),
                                                  "value" => "",
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "filter_options" ,
                                                  "slider_or_filter" => "filter",
                                            ),
                                            array(
                                                  "type" => "imtst_custom_dropdown",
                                                  "heading" => __("Align", 'imtst'),
                                                  "param_name" => "filter_align",
                                                  "values" => array('left'=>__('Left', 'imtst'),'center'=>__('Center', 'imtst'),'right'=>__('Right', 'imtst') ),
                                                  "value" => "",
                                                  "wrap_div" => TRUE,
                                                  "wrap_class" => "filter_options",
                                                  "slider_or_filter" => "filter",
                                            ),
				        			   		array(
				        			   				"type" => "imtst_custom_dropdown",
				        			   				"heading" => __("Layout Mode", 'imtst'),
				        			   				"param_name" => "layout_mode",
				        			   				"values" => array('masonry'=>__('masonry', 'imtst'),'fitRows'=>__('fitRows', 'imtst') ),
				        			   				"value" => "",
				        			   				"wrap_div" => TRUE,
				        			   				"wrap_class" => "filter_options",
				        			   				"slider_or_filter" => "filter",
				        			   		),        			   			   		
                                            //////////end of filter
											array(
        										  "type" => 'imtst_title_block_imtst_bkcolor5',
        										  "heading" => __("Inside Page Options", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "insidepage_title",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
                                                  "type" => "imtst_checkbox_field",
                                                  "label" => __(" Activate Inside Page", 'imtst'),
                                                  "id_checkbox" => "page_inside_c",
                                                  "value" => 0,
                                                  "id_hidden" => "page_inside",
                                                  "param_name" => "page_inside",
                                                  "onClick" => 'imtst_uncheck_c_hz(this, "#tmst_custom_href_c", "#tmst_custom_href");',
                                            ),
                                            array(
                                                  "type" => "imtst_inside_template",
                                                  "param_name" => "inside_template",
                                                  "value" => "",
                                                  "heading" => __("Template", 'imtst'),
                                            ),
											array(
        										  "type" => 'imtst_sepparate_line',
												  "param_name" => "line10",
												  'value' => '',
											),
											array(
				        			   				"type" => "imtst_checkbox_field",
				        			   				"label" => __(" Activate Custom Link", 'imtst'),
				        			   				"id_checkbox" => "tmst_custom_href_c",
				        			   				"value" => 0,
				        			   				"id_hidden" => "tmst_custom_href",
				        			   				"param_name" => "tmst_custom_href",
				        			   				"onClick" => 'imtst_uncheck_c_hz(this, "#page_inside_c", "#page_inside");',
				        			   		),
											array(
        										  "type" => 'imtst_sepparate_line',
                                                  "param_name" => "line13"
											)
        								)
        			)
        );
        
        
        $cat_arr = imtst_get_cats_for_vc_admin();

        
        vc_map( array(
        			   "name" => __("My Testimonials Form Builder", 'imtst' ),
        			   "base" => "indeed-my-testimonials-form-vc",
        			   "icon" => "icon-wpb-ttp",
                       "description" => __("Form Builder", 'imtst'),
    			       "class" => "indeed-my-testimonials-form",
    			       "category" => __('Content', "js_composer"),
        			   "params" => array(
                                            array(
        										  "type" => 'imtst_checkbox_block',
        										  "heading" => __("Fields To Show:", 'imtst'),
        										  "hidden_name" => "show",
                                                  "hidden_id" => "hidden_i_cf",
        										  "param_name" => "show",
        										  "checkboxes" => array("client_name" => __(" Client Name", 'imtst'),
                                                                        "client_image" => __(" Client Image", 'imtst'),
                                                                        "client_job" => __(" Client Job", 'imtst'),
                                                                        "client_url" => __(" Client URL", 'imtst'),
                                                                        "company" => __(" Company", 'imtst'),
                                                                        "company_url" => __(" Company URL", 'imtst'),
                                                                        "quote" => __(" Quote", 'imtst'),
                                                                        "rating" => __(" Rating", 'imtst'),
        										  						"capcha" => __(" Capcha", 'imtst'),
                                                                        ),
        										  "value" => "client_name,client_job,company,quote",
        									),
        			   		array(
        			   				"type" => "imtst_custom_dropdown",
        			   				"heading" => __("Destination Group", 'imtst'),
        			   				"param_name" => "d_group",
        			   				"values" => $cat_arr,
        			   				"value" => "",
        			   		),        			   		
											array(
        										  "type" => 'imtst_title_block',
        										  "heading" => __("Required Fields", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "required_title",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
        										  "type" => 'imtst_checkbox_block',
        										  "heading" => __("Required Fields:", 'imtst'),
        										  "hidden_name" => "req",
                                                  "hidden_id" => "hidden_i_rf",
        										  "param_name" => "req",
        										  "checkboxes" => array("client_name" => __(" Client Name", 'imtst'),
                                                                        "client_image" => __(" Client Image", 'imtst'),
                                                                        "client_job" => __(" Client Job", 'imtst'),
                                                                        "client_url" => __(" Client URL", 'imtst'),
                                                                        "company" => __(" Company", 'imtst'),
                                                                        "company_url" => __(" Company URL", 'imtst'),
                                                                        "quote" => __(" Quote", 'imtst'),
                                                                        "rating" => __(" Rating", 'imtst'),
                                                                        ),
        										  "value" => "client_name,quote",
        									),
											array(
        										  "type" => 'imtst_title_block imtst_bkcolor1',
        										  "heading" => __("Custom Labels", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "label_title",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
                                                    "type" => "imtst_label",
                                                    "param_name" => "label",
                                                    "value" => __("Field Labels:", 'imtst'),
                                                    "class" => "imtst_label",
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Client Name:", 'imtst'),
                                                    "param_name" => "client_name",
                                                    "value" => __("Name", 'imtst'),
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Client Image:", 'imtst'),
                                                    "param_name" => "client_image",
                                                    "value" => __("Image", 'imtst'),
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Client Job:", 'imtst'),
                                                    "param_name" => "client_job",
                                                    "value" => __("Position", 'imtst'),
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Client URL:", 'imtst'),
                                                    "param_name" => "client_url",
                                                    "value" => __("URL", 'imtst'),
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Company:", 'imtst'),
                                                    "param_name" => "company",
                                                    "value" => __("Company", 'imtst'),
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Company URL:", 'imtst'),
                                                    "param_name" => "company_url",
                                                    "value" => __("Company URL", 'imtst'),
                                            ),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Quote:", 'imtst'),
                                                    "param_name" => "quote",
                                                    "value" => __("Testimonial", 'imtst'),
                                            ),
				        			   		array(     			   		
				        			   				"type" => "textfield",      			  
				        			   				"heading" => __("Capcha Label:", 'imtst'),
				        			   				"param_name" => "capcha_label",
				        			   				"value" => __("CapCha", 'imtst'),
				        			   		),
                                            array(
                                                    "type" => "textfield",
                                                    "heading" => __("Rating:", 'imtst'),
                                                    "param_name" => "rating",
                                                    "value" => __("Rating", 'imtst'),
                                            ),
											array(
        										  "type" => 'imtst_title_block imtst_bkcolor5',
        										  "heading" => __("Custom Messages", 'imtst'),
												  "wrap_div" => TRUE,
                                                  "param_name" => "messages_title",
												  "wrap_class" => "imtst_vc_title"
											),
                                            array(
                                                  "type" => "imtst_textarea",
                                                  "param_name" => "e_msg",
                                                  "value" => __("Thank you for your submitted testimonial!", 'imtst'),
                                                  "heading" => __("Success message", 'imtst'),
                                            ),
                                            array(
                                                  "type" => "imtst_textarea",
                                                  "param_name" => "err_msg",
                                                  "value" => __("An Error has Occurred. Please Try Again and complete all the required fields!", 'imtst'),
                                                  "heading" => __("Error message", 'imtst'),
                                            ),
                       )
                      )
        );
        add_action("admin_enqueue_scripts", 'imtst_admin_header');
        function imtst_admin_header(){
            wp_enqueue_style( 'imtst_style_vc', IMTST_DIR_URL_VC . 'files/css/style.css', array(), null );
            wp_enqueue_script( 'imtst_js_functions_vc', IMTST_DIR_URL_VC . 'files/js/functions.js', array(), null );
        }
    }
}
add_action( 'init', 'imtst_check_vc' );
//////// imtst on EACH FUNCTION NAME

add_action( 'init', 'imtst_post_testimonials_vc' );
function imtst_post_testimonials_vc() {
  $labels = array(
    'name'               => __('Testimonials', 'imtst'),
    'singular_name'      => __('Testimonial', 'imtst'),
    'add_new'            => __('Add New Testimonial', 'imtst'),
    'add_new_item'       => __('Add New Testimonial', 'imtst'),
    'edit_item'          => __('Edit Testimonial', 'imtst'),
    'new_item'           => __('New Testimonial', 'imtst'),
    'all_items'          => __('All Testimonials', 'imtst'),
    'view_item'          => __('View Testimonial', 'imtst'),
    'search_items'       => __('Search Testimonial', 'imtst'),
    'not_found'          => __('No Testimonial available', 'imtst'),
    'not_found_in_trash' => __('No Testimonials found in Trash', 'imtst'),
    'parent_item_colon'  => '',
    'menu_name'          => __('My Testimonials', 'imtst'),
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 8,
    'menu_icon'          => IMTST_DIR_URL_VC . 'files/images/ed-gray.png',
    'supports'           => array( 'title', 'editor', 'thumbnail' )
  );
    register_post_type( IMTST_POST_TYPE_VC, $args );
}

////////////TAXONOMY
add_action( 'init', 'imtst_taxonomy_testimonials_vc', 0 );
function imtst_taxonomy_testimonials_vc() {
		$labels = array(
			'name'              => _x( 'Groups', 'taxonomy general name' ),
			'singular_name'     => _x( 'Group', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Groups', 'imtst' ),
			'all_items'         => __( 'All Groups', 'imtst' ),
			'parent_item'       => __( 'Parent Group', 'imtst' ),
			'parent_item_colon' => __( 'Parent Group:', 'imtst' ),
			'edit_item'         => __( 'Edit Group', 'imtst' ),
			'update_item'       => __( 'Update Group', 'imtst' ),
			'add_new_item'      => __( 'Add New Group', 'imtst' ),
			'new_item_name'     => __( 'New Group Name', 'imtst' ),
			'menu_name'         => __( 'Groups', 'imtst' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => IMTST_TAXONOMY_VC ),
		);
	register_taxonomy( IMTST_TAXONOMY_VC, IMTST_POST_TYPE_VC, $args );
}
////RENAME FEATURED IMAGE TO CLIENT IMAGE
add_action('do_meta_boxes', 'imtst_change_image_box_vc');
function imtst_change_image_box_vc(){
    remove_meta_box( 'postimagediv', IMTST_POST_TYPE_VC, 'side' );
    add_meta_box('postimagediv', __('Client Image', 'imtst'), 'post_thumbnail_meta_box', IMTST_POST_TYPE_VC, 'normal', 'low');
}
add_action('admin_head-post-new.php', 'imtst_change_thumbnail_html_vc');
add_action('admin_head-post.php', 'imtst_change_thumbnail_html_vc');
function imtst_change_thumbnail_html_vc( $content ) {
    if ( $GLOBALS['post_type']==IMTST_POST_TYPE_VC )
      add_filter('admin_post_thumbnail_html', 'imtst_rename_thumb_vc');
}
function imtst_rename_thumb_vc($content){
     return str_replace(__('featured image'), __('Client Image', 'imtst'),$content);
}
/////////CUSTOM FIELD
    //////////INFO
    add_action( 'add_meta_boxes', 'imtst_cf_ti_vc' );
    function imtst_cf_ti_vc(){
        add_meta_box('client_personal_info',
                     __('Client Information', 'imtst'),
                     'imtst_metabox_ti_vc', //function available in function.php
                     IMTST_POST_TYPE_VC,
                     'normal',
                     'low');
    }
    add_action('save_post', 'imtst_save_ti_vc');
    //////////RATINGS
    add_action( 'add_meta_boxes', 'imtst_cf_rating_vc' );
    function imtst_cf_rating_vc(){
        add_meta_box('client_rating',
                     __('Ratings', 'imtst'),
                     'imtst_metabox_rating_vc', //function available in function.php
                     IMTST_POST_TYPE_VC,
                     'normal',
                     'low');
    }
	 #CUSTOM LINK
    add_action( 'add_meta_boxes', 'imtst_custom_href_vc' );
    function imtst_custom_href_vc(){
    	add_meta_box('postcustomhref',
    			__( 'Select Target Link', 'imtst'),
    			'imtstCustomHrefMetaBox_vc',
    			IMTST_POST_TYPE_VC,
    			'normal',
    			'high' );
    }    
add_filter('content_save_pre', 'imtst_removeHTMLtags_vc');
function imtst_removeHTMLtags_vc($content) {
    if ( isset($GLOBALS['post_type']) && $GLOBALS['post_type']==IMTST_POST_TYPE_VC ) return strip_tags($content);
    else return $content;
}
//////////CUSTOM ADMIN COLUMNS
///IMAGE COLUMN
add_filter('manage_edit-'.IMTST_POST_TYPE_VC.'_columns', 'imtst_custom_admin_column_vc');
function imtst_custom_admin_column_vc($columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = __('Client Name', 'imtst');
	$new_columns['quote'] = __('Quote', 'imtst');
	$new_columns['postimagecdiv'] = __('Client Image', 'imtst');
	$new_columns['taxonomy-'.IMTST_TAXONOMY_VC] = __('Groups', 'imtst');
	$new_columns['company'] = 'Company';
	$new_columns['rating'] = 'Rating';	
	$new_columns['date'] = _x('Date', 'column name');
	return $new_columns;
}
add_action('manage_posts_custom_column',  'imtst_display_columns_vc' );
function imtst_display_columns_vc($name) {
	global $post;
	if( is_plugin_active('indeed-my-testimonials/indeed-my-testimonials.php') ) return;
	$screen = get_current_screen();
	if($screen->post_type==IMTST_POST_TYPE_VC){
		switch($name){
			case 'postimagecdiv':
				$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail', false, '' );
			    if ($src && isset($src[0])){
	            	echo "<img src='{$src[0]}' width='50' height='50' title='{$post->post_title}'/>";
	            } else {
	            	$src = get_option('default_client_img');
	            	echo "<img src='".$src."' width='50' height='50' title='{$post->post_title}'/>";
	            }
			break;
			case 'quote':
				$the_content = $post->post_content;
				$arr = explode(" ", $the_content);
				if (count($arr) > 15){
					array_splice($arr, 15);
					$the_content = implode(" ", $arr);
					$the_content .= " ...";
				}
				echo $the_content;
			break;
			case 'company':
				$data = get_post_meta($post->ID, 'imtst_company', true);
				if ($data) echo $data;
			break;
			case 'rating':
				$data = get_post_meta($post->ID, 'imtst_stars', true);
				if ($data) echo imtst_return_stars_vc($data);
			break;			
		}
	}
}
////////SHORTCODE
add_shortcode( 'indeed-my-testimonials-vc', 'imtst_shortcode_func_team_vc' );
function imtst_shortcode_func_team_vc($attr){
    $return_str = true;
    include IMTST_DIR_PATH_VC . 'includes/imtst_view.php';
    return $final_str;
}
////////SHORTCODE Form Builder
add_shortcode( 'indeed-my-testimonials-form-vc', 'imtst_form_shortcode_vc' );
function imtst_form_shortcode_vc($attr){
    wp_enqueue_style ( 'imtst_style_vc', IMTST_DIR_URL_VC.'files/css/style.css' );
    wp_enqueue_script ( 'imtst_vc_js', IMTST_DIR_URL_VC.'files/js/functions.js', array(), null );
    $return_str = true;
    $str = '';
    include IMTST_DIR_PATH_VC . 'includes/imtst_form_view.php';
    return $str;
}
////STYLE AND JS
add_action('wp_enqueue_scripts', 'imtst_fe_head_vc');
function imtst_fe_head_vc(){
  wp_enqueue_style( 'imtst_style_vc', IMTST_DIR_URL_VC.'files/css/style.css' );
  wp_enqueue_style( 'imtst_owl_carousel_vc', IMTST_DIR_URL_VC.'files/css/owl.carousel.css' );
  wp_enqueue_style( 'imtst_font-awesome', IMTST_DIR_URL_VC.'files/css/font-awesome.min.css' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'imtst_owl_carousel_js', IMTST_DIR_URL_VC.'files/js/owl.carousel.js', array(), null );
  wp_enqueue_script( 'imtst_front_end_testimonials_js', IMTST_DIR_URL_VC .'files/js/front_end.js', array(), null );
  wp_enqueue_script( 'imtst_isotope_pkgd_min_vc', IMTST_DIR_URL_VC.'files/js/isotope.pkgd.min.js', array(), null );
}
add_action("admin_enqueue_scripts", 'imtst_be_head_vc');
function imtst_be_head_vc(){
	wp_enqueue_style ( 'imtstvc_style-dashboard', IMTST_DIR_URL_VC.'files/css/dashboard.css' );
    $screen = get_current_screen();
    if( $screen->post_type==IMTST_POST_TYPE_VC ){
          wp_enqueue_style( 'imtst_font-awesome', IMTST_DIR_URL_VC.'files/css/font-awesome.min.css' );
          wp_enqueue_style( 'imtst_style_vc', IMTST_DIR_URL_VC.'files/css/style.css' );
          wp_enqueue_style( 'imtst_owl_carousel_css', IMTST_DIR_URL_VC.'files/css/owl.carousel.css' );
          wp_enqueue_script( 'jquery' );
          wp_enqueue_script( 'imtst_functions_vc', IMTST_DIR_URL_VC.'files/js/functions.js', array(), null );
          wp_enqueue_script( 'imtst_owl_carousel_js', IMTST_DIR_URL_VC.'files/js/owl.carousel.js', array(), null );
          if( function_exists( 'wp_enqueue_media' ) ){
          	wp_enqueue_media();
          	wp_enqueue_script ( 'imtst_open_media_3_5-vc', IMTST_DIR_URL_VC . 'files/js/open_media_3_5.js', array(), null );
          }else{
          	wp_enqueue_style( 'thickbox' );
          	wp_enqueue_script( 'thickbox' );
          	wp_enqueue_script( 'media-upload' );
          	wp_enqueue_script ( 'imtst_open_media_3_4-vc', IMTST_DIR_URL_VC . 'files/js/open_media_3_4.js', array(), null );
          }
    }
}
//////  INSIDE TEMPLATE OPTION
add_filter( 'template_include', 'imtst_portfolio_page_template_vc', 99 );
function imtst_portfolio_page_template_vc( $template ) {
    if(get_post_type()==IMTST_POST_TYPE_VC && isset($_REQUEST['imtst_cpt']) && $_REQUEST['imtst_cpt']!=''){
    	if($_REQUEST['imtst_cpt']=='IMTST_PAGE_TEMPLATE'){
    		//return our awesome page template
    		return IMTST_DIR_PATH_VC.'includes/imtst_page_template.php';
    	}
        $template = urldecode($_REQUEST['imtst_cpt']);
        $template .= ".php";
    	$new_template = locate_template( $template );
        return $new_template;
    }
    else return $template;
}

#Enable feature image for IMTST_POST_TYPE
add_action( 'init', 'imtst_theme_suport_vc');
function imtst_theme_suport_vc(){
	$postTypes = get_theme_support( 'post-thumbnails' );
	if(isset($postTypes) && is_array($postTypes)){
		$postTypes[] = IMTST_POST_TYPE;
		add_theme_support( 'post-thumbnails', $postTypes );
	}else{
		add_theme_support( 'post-thumbnails' );
	}
}

///////////////GENERAL SETTINGS
add_action( 'admin_menu', 'imtst_menu_testimonials_vc' );
function imtst_menu_testimonials_vc(){
	if(function_exists('imtst_shortcode_menu_testimonials')) return;
	add_submenu_page( 'edit.php?post_type='.IMTST_POST_TYPE_VC, __('General Settings', 'imtst'), __('General Settings', 'imtst'), 'manage_options', 'testimonials_general_settings_vc', 'imtst_general_settings_vc' );
}

$ext_menu = 'edit.php?post_type=' . IMTST_POST_TYPE_VC;		
//include_once plugin_dir_path(__FILE__) . 'extensions_plus/index.php';


function imtst_general_settings_vc(){
	include_once IMTST_DIR_PATH_VC . 'includes/general_settings.php';
}

///Ajax change post type name
function imtst_change_post_type_vc(){
	if(isset($_REQUEST['post_name']) && $_REQUEST['post_name']!=''){
		if(get_option('imtst_post_type_name')!==FALSE) update_option('imtst_post_type_name', $_REQUEST['post_name']);
		else add_option('imtst_post_type_name', $_REQUEST['post_name']);
		echo $_REQUEST['post_name'];
	}
	die();
}
add_action('wp_ajax_imtst_change_post_type_vc', 'imtst_change_post_type_vc');
add_action('wp_ajax_nopriv_imtst_change_post_type_vc', 'imtst_change_post_type_vc');

/////custom css for admin table
if (is_admin()){
	add_action('admin_head', 'imtst_custom_admin_css_vc');
	function imtst_custom_admin_css_vc(){
		?>
		<style>
			body.post-type-<?php echo IMTST_POST_TYPE_VC;?> #posts-filter .wp-list-table #company{
				width: 10% !important;
			}
			body.post-type-<?php echo IMTST_POST_TYPE_VC;?> #posts-filter .wp-list-table #rating{
				width: 12% !important;
			}
		</style>
		<?php 
	}
}

add_action( 'wp_dashboard_setup', 'imtstvc_register_admindashboard' );
function imtstvc_register_admindashboard() {
	$args = array(
			'posts_per_page'   => 25,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => IMTST_POST_TYPE_VC,
			'post_status'      => 'pending',
	);
	$testimonials = get_posts($args);
	if ($testimonials && count($testimonials)){
		add_meta_box('indeed', 'Indeed My Testimonials - Pending', 'indeed_print_dashboard_widget_imtstvc', 'dashboard', 'normal', 'high');
	}
}


