<?php
function imtst_select_cats_settings_field($settings, $value){
    $args = array(
                    'type'                     => IMTST_POST_TYPE_VC,
                    'child_of'                 => 0,
                    'parent'                   => '',
                    'orderby'                  => 'name',
                    'order'                    => 'ASC',
                    'hide_empty'               => 0,
                    'hierarchical'             => 1,
                    'exclude'                  => '',
                    'include'                  => '',
                    'number'                   => '',
                    'taxonomy'                 => IMTST_TAXONOMY_VC,
                    'pad_counts'               => false
                );
    $categories = get_categories( $args );
    if(strpos($value, ',')!==FALSE){
    	$value_arr = explode(',', $value);
    }else $value_arr[] = $value;
    $str = "";
    $str .= "<select onChange='imtst_select_team_vc(this, \"#hidden_select_cats_vc\");' multiple>>";
    $selected = "";
    if($value=='all') $selected = "selected='seleted'";
    $str .="<option value='all' $selected>".__('All', 'imtst')."</option>";
    if(isset($categories) && is_array($categories)){
    	foreach($categories as $cat){
    	    $selected = "";
    	    if(in_array($cat->slug, $value_arr)) $selected = "selected='seleted'";
    		$str .= "<option value='".$cat->slug."' $selected>".$cat->name."</option>";
    	}
    }
    $str .= "</select>";
    $str .= "<input type='hidden' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' name='".$settings['param_name']."' id='hidden_select_cats_vc' value='".$value."' />";
    return $str;
}
function imtst_number_settings_field($settings, $value) {
    $str = "";
    if(isset($settings['label']) && $settings['label']!='') $str .= "<div>".$settings['label']."</div>";
    $str .= "<input name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' min='".$settings['param_min_value']."' type='number' value='$value' />";
    if(isset($settings['wrap_div']) && $settings['wrap_div']==TRUE){
        global $imt_global_set_arr_val;
        if($imt_global_set_arr_val[$settings['slider_or_filter']]==TRUE) $opacity = 1;
        else $opacity = '0.5';
        $str = "<div style='opacity: $opacity;' class='".$settings['wrap_class']."'>".$str."</div>";
    }
    return $str;
}
function imtst_checkbox_block_settings_field($settings, $value) {
	$str = "";
    if(isset($settings['checkboxes']) && count($settings['checkboxes'])>0){
    	foreach($settings['checkboxes'] as $k=>$v){
    	    $checked = "";
    	    if(strpos($value, $k)!==false) $checked = "checked='checked'";
    		$str .= "<div><input type='checkbox' value='$k' onClick=\"make_inputh_string(this, '$k', '#".$settings['hidden_id']."');\" $checked />$v</div>";
    	}
    }
    $str .= "<input name='".$settings['hidden_name']."' class='wpb_vc_param_value  ".$settings['hidden_name']." ".$settings['type']."_field' type='hidden' value='$value' id='".$settings['hidden_id']."' />";
    if(isset($settings['wrap_div']) && $settings['wrap_div']==TRUE){
        global $imt_global_set_arr_val;
        if($imt_global_set_arr_val[$settings['slider_or_filter']]==TRUE) $opacity = 1;
        else $opacity = '0.5';
        $str = "<div style='opacity: $opacity;' class='".$settings['wrap_class']."'>".$str."</div>";
    }
    return $str;
}
function imtst_select_themes_settings_field($settings, $value){
	$themes_arr = imtstvc_admin_get_all_themes();
    $str = "";
    $urls = IMTST_DIR_URL_VC .','. str_replace('indeed-my-testimonials-vc', 'indeed-my-testimonials-theme-pack', IMTST_DIR_URL_VC);
    $str .= "<select class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' name='".$settings['param_name']."' onChange='preview_theme_vc(this.value, \"".$urls."\");'>";
    foreach ($themes_arr as $key=>$theme){
        $v = strtolower($theme) . '_' . $key;
        $label = ucfirst($theme) . ' ' . $key;
        $selected = "";
        if($value==$v){
            $selected = "selected='selected'";
        }
        $str .= "<option value='$v' $selected >$label</option>";
        if ($selected!='' || !isset($img)) $img = $v;
    }
    $str .= "</select>";
    $urls_arr = explode(',', $urls);
    foreach ($urls_arr as $url){
    	$img_src = $url . 'themes/' . $img . '/'.$img.'.jpg';
    	if (@getimagesize($img_src)){
    		break;
    	}    	
    }
    $str .= "<img src='$img_src' class='theme_preview' id='imtst_theme_preview'>";
    return $str;
}
function imtst_color_scheme_settings_field($settings, $value){
    $str = "";
    $str .= "<ul id='colors_ul' class='colors_ul'>";
    $color_scheme = array('0a9fd8', '38cbcb', '27bebe', '0bb586', '94c523', '6a3da3', 'f1505b', 'ee3733', 'f36510', 'f8ba01');
    $i = 0;
    foreach($color_scheme as $color){
        if( $i%5==0 ) $str .= "<div class='clear'></div>";
        $class = "color_scheme_item";
        if($value==$color) $class = 'color_scheme_item-selected';
            $str .= "<li class='$class' onClick=\"changeColorScheme(this, '$color', '#color_scheme');\" style='background-color: #{$color};'></li>";
            $i++;
    }
    $str .= "</ul><div class='clear'></div>";
    $str .= "<input type='hidden' id='color_scheme' value='$value' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' name='".$settings['param_name']."'/>";
    return $str;
}
function imtst_checkbox_field_settings_field($settings, $value){
    $str = "";
    if(isset($settings['slider_or_filter'])){
        global $imt_global_set_arr_val;
        $imt_global_set_arr_val[$settings['slider_or_filter']] = FALSE;
        if($value==1){
            $imt_global_set_arr_val[$settings['slider_or_filter']] = TRUE;
        }
    }
        $checked = "";
        if($value==1){
            $checked = "checked='checked'";
        }
    $str .= "<input type='checkbox' onClick='check_and_h(this, \"#".$settings['id_hidden']."\");".$settings['onClick']."' $checked id='".$settings['id_checkbox']."'/>".$settings['label'];
    $str .= "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='".$settings['id_hidden']."' />";
    if(isset($settings['extra_text']) && $settings['extra_text']!='') $str .= $settings['extra_text'];
    return $str;
}

function imtst_checkbox_field_actv_settings_field($settings, $value){
    $str = "";
    if(isset($settings['slider_or_filter'])){
        global $imt_global_set_arr_val;
        $imt_global_set_arr_val[$settings['slider_or_filter']] = FALSE;
        if($value==1){
            $imt_global_set_arr_val[$settings['slider_or_filter']] = TRUE;
        }
    }
        $checked = "";
        if($value==1){
            $checked = "checked='checked'";
        }
    $str .= "<input type='checkbox' onClick='check_and_h(this, \"#".$settings['id_hidden']."\");".$settings['onClick']."' $checked id='".$settings['id_checkbox']."'/>".$settings['label'];
    $str .= "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='".$settings['id_hidden']."' />";
    if(isset($settings['extra_text']) && $settings['extra_text']!='') $str .= $settings['extra_text'];
    return $str;
}

function imtst_custom_dropdown_settings_field($settings, $value){
	$str = "";
    if(isset($settings['values']) && count($settings['values'])>0){
        $str .= "<div>".(isset($settings['label']) ? $settings['label'] : '')."</div>";
        $str .= "<select class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' name='".$settings['param_name']."'>";
    	foreach($settings['values'] as $k=>$v){
    	    $selected = "";
    	    if(strpos($value, $k)!==false) $selected = "selected='selected'";
    		$str .= "<option value='$k' $selected >$v</option>";
    	}
        $str .= "</select>";
    }
    if(isset($settings['sublabel_div'])) $str .= $settings['sublabel_div'];
    if(isset($settings['wrap_div']) && $settings['wrap_div']==TRUE){
        global $imt_global_set_arr_val;
        if($imt_global_set_arr_val[$settings['slider_or_filter']]==TRUE) $opacity = 1;
        else $opacity = '0.5';
        $str = "<div style='opacity: $opacity;' class='".$settings['wrap_class']."'>".$str."</div>";
    }
    return $str;
}
function imtst_inside_template_settings_field($settings, $value){
    $str = "";
    $str .= "<select name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field'>";
    $str .= "<option value='IMTST_PAGE_TEMPLATE'>Indeed Custom Testimonials Page</option>";
    $str .= "<option value='default'>Default Template</option>";
    $templates = get_page_templates();
    if(isset($templates) && count($templates)>0){
        foreach($templates as $template_name => $template_page){
            $template_page = str_replace('.php', '', $template_page);
            $selected = "";
            if($template_page==$value) $selected = "selected='selected'";
            $str .= "<option value='$template_page' $selected >$template_name</option>";
        }
    }
    $str .= "</select>";
    return $str;
}
function imtst_textarea_settings_field($settings, $value){
    return "<textarea name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field imtst_textarea'>$value</textarea>";
}
function imtst_custom_dd_settings_field($settings, $value){
    $str = "";
    $str .= "<select id='".$settings['select_id']."' onclick=\"".$settings['onclick']."\" name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field imtst_custom_dd'>";
    	foreach($settings['values'] as $k=>$v){
    	    $selected = "";
    	    if(strpos($value, $k)!==false) $selected = "selected='selected'";
    		$str .= "<option value='$k' $selected >$v</option>";
    	}
    $str .= "</select>";
    return $str;
}


function imtst_sepparate_line_settings_field($settings, $value){
	return "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='' />";
}

function imtst_title_block_imtst_bkcolor6_settings_field($settings, $value){
	return "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='' />";
}

function imtst_title_block_imtst_bkcolor1_settings_field($settings, $value){
	return "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='' />";
}

function imtst_title_block_imtst_bkcolor2_settings_field($settings, $value){
	return "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='' />";
}

function imtst_title_block_imtst_bkcolor3_settings_field($settings, $value){
	return "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='' />";
}

function imtst_title_block_imtst_bkcolor5_settings_field($settings, $value){
	return "<input type='hidden' value='$value' name='".$settings['param_name']."' class='wpb_vc_param_value  ".$settings['param_name']." ".$settings['type']."_field' id='' />";
}

//// assign them all to VC
if (defined('WPB_VC_VERSION')){
	if (version_compare(WPB_VC_VERSION, '4.4')==1){
		/// > 4.4
		vc_add_shortcode_param('imtst_select_cats', 'imtst_select_cats_settings_field');
		vc_add_shortcode_param('imtst_number', 'imtst_number_settings_field');
		vc_add_shortcode_param('imtst_checkbox_block', 'imtst_checkbox_block_settings_field');
		vc_add_shortcode_param('imtst_select_themes', 'imtst_select_themes_settings_field');
		vc_add_shortcode_param('imtst_color_scheme', 'imtst_color_scheme_settings_field');
		vc_add_shortcode_param('imtst_checkbox_field', 'imtst_checkbox_field_settings_field');
		vc_add_shortcode_param('imtst_checkbox_field_actv', 'imtst_checkbox_field_actv_settings_field');
		vc_add_shortcode_param('imtst_custom_dropdown', 'imtst_custom_dropdown_settings_field');
		vc_add_shortcode_param('imtst_inside_template', 'imtst_inside_template_settings_field');
		vc_add_shortcode_param('imtst_textarea', 'imtst_textarea_settings_field');
		vc_add_shortcode_param('imtst_custom_dd', 'imtst_custom_dd_settings_field');
		vc_add_shortcode_param('imtst_sepparate_line', 'imtst_sepparate_line_settings_field');
		vc_add_shortcode_param('imtst_title_block_imtst_bkcolor6', 'imtst_title_block_imtst_bkcolor6_settings_field');
		vc_add_shortcode_param('imtst_title_block_imtst_bkcolor1', 'imtst_title_block_imtst_bkcolor1_settings_field');
		vc_add_shortcode_param('imtst_title_block_imtst_bkcolor2', 'imtst_title_block_imtst_bkcolor2_settings_field');
		vc_add_shortcode_param('imtst_title_block_imtst_bkcolor3', 'imtst_title_block_imtst_bkcolor3_settings_field');
		vc_add_shortcode_param('imtst_title_block_imtst_bkcolor5', 'imtst_title_block_imtst_bkcolor5_settings_field');			
	} else {
		/// < 4.4
		add_shortcode_param('imtst_select_cats', 'imtst_select_cats_settings_field');
		add_shortcode_param('imtst_number', 'imtst_number_settings_field');
		add_shortcode_param('imtst_checkbox_block', 'imtst_checkbox_block_settings_field');
		add_shortcode_param('imtst_select_themes', 'imtst_select_themes_settings_field');
		add_shortcode_param('imtst_color_scheme', 'imtst_color_scheme_settings_field');
		add_shortcode_param('imtst_checkbox_field', 'imtst_checkbox_field_settings_field');
		add_shortcode_param('imtst_checkbox_field_actv', 'imtst_checkbox_field_actv_settings_field');
		add_shortcode_param('imtst_custom_dropdown', 'imtst_custom_dropdown_settings_field');
		add_shortcode_param('imtst_inside_template', 'imtst_inside_template_settings_field');
		add_shortcode_param('imtst_textarea', 'imtst_textarea_settings_field');
		add_shortcode_param('imtst_custom_dd', 'imtst_custom_dd_settings_field');
		add_shortcode_param('imtst_sepparate_line', 'imtst_sepparate_line_settings_field');
		add_shortcode_param('imtst_title_block_imtst_bkcolor6', 'imtst_title_block_imtst_bkcolor6_settings_field');
		add_shortcode_param('imtst_title_block_imtst_bkcolor1', 'imtst_title_block_imtst_bkcolor1_settings_field');
		add_shortcode_param('imtst_title_block_imtst_bkcolor2', 'imtst_title_block_imtst_bkcolor2_settings_field');
		add_shortcode_param('imtst_title_block_imtst_bkcolor3', 'imtst_title_block_imtst_bkcolor3_settings_field');
		add_shortcode_param('imtst_title_block_imtst_bkcolor5', 'imtst_title_block_imtst_bkcolor5_settings_field');	
	}
}
