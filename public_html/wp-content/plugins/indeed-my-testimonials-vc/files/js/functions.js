//////////
function make_inputh_string(divCheck, showValue, hidden_input_id){
    str = jQuery(hidden_input_id).val();
    if(str!='') show_arr = str.split(',');
    else show_arr = new Array();
    if(jQuery(divCheck).is(':checked')){
        show_arr.push(showValue);
    }else{
        var index = show_arr.indexOf(showValue);
        show_arr.splice(index, 1);
    }
    str = show_arr.join(',');
    jQuery(hidden_input_id).val(str);
}
function check_and_h(from, where) {
	if (jQuery(from).is(":checked")) {
		jQuery(where).val(1);
	} else {
		jQuery(where).val(0);
	}
}
function checkandShow(checkID, targetID, display_type){
    if(jQuery(checkID).is(':checked')){
          jQuery(targetID).css('display', display_type);
    }else jQuery(targetID).css('display', 'none');
}
function checkandModfCss(checkID, targetID, cssAttr, cssValue_true, cssValue_false){
    if(jQuery(checkID).is(':checked')){
      jQuery(targetID).css(cssAttr, cssValue_true);
    }else jQuery(targetID).css(cssAttr, cssValue_false);
}
function changeColorScheme(id, value, where ){
    jQuery('#colors_ul li').each(function(){
        jQuery(this).attr('class', 'color_scheme_item');
    });
    jQuery(id).attr('class', 'color_scheme_item-selected');
    jQuery(where).val(value);
}
function update_stars(value, eachStarBaseID, hiddenID, classStarU, classStarS){
	starHoverSelect(value, eachStarBaseID, classStarU, classStarS);
	jQuery(hiddenID).val(value);
}
function starHoverSelect(value, eachStarBaseID, classStarU, classStarS){
	for(i=1;i<=5;i++){
		currentClass = classStarU;
		if(value>=i) currentClass = classStarS;
    		jQuery(eachStarBaseID+i).attr('class', currentClass);
		}
}
function updateStars(value, eachStarBaseID, hiddenID, classStarU, classStarS){
	value = jQuery(hiddenID).val();
	starHoverSelect(value, eachStarBaseID, classStarU, classStarS)
}
function check_mf_selector(checkId, target, cssAttr, valueChecked, valueUnchecked, unselectTarget, unselectCheckbox, hiddenFalse){
    if(jQuery(checkId).is(":checked")){
        jQuery(target).css(cssAttr, valueChecked);
        jQuery(unselectTarget).css(cssAttr, valueUnchecked);
        jQuery(unselectCheckbox).attr('checked', false);
        jQuery(hiddenFalse).val(0);
    }
    else jQuery(target).css(cssAttr, valueUnchecked);
}
function preview_theme_vc(value, dir_url){
	id = '#imtst_theme_preview';
	dir_url_arr = dir_url.split(',');
	for (i=0;i<dir_url_arr.length;i++){
	    img = dir_url_arr[i] + 'themes/' + value + '/' + value + '.jpg';
	    if (imtstvc_image_exist(img)){
	    	imtstvc_printIMG(id, img);
	    	break;
	    }
	}
}

function imtstvc_printIMG(id, img){
    jQuery(id).fadeOut(500, function(){
        jQuery(id).attr('src', img);
        jQuery(id).fadeIn(500, function(){});
    });		
}

function imtstvc_image_exist(url) {
	if(url){
		try{
	        var req = new XMLHttpRequest();
	        req.open('GET', url, false);
	        req.send();
	        return req.status==200;			
		}catch(err){
			return 0;
		}
    } else {
        return false;
    }
}


function imtst_change_post_type_name_vc(base_path){
    jQuery.ajax({
        type : "post",
        url : base_path+'/wp-admin/admin-ajax.php',
        data : {
                   action: "imtst_change_post_type_vc",
                   post_name: jQuery('#imtst_post_type_name').val()
               },
        success: function(response){
        	if(response!='') window.location = base_path+'/wp-admin/edit.php?post_type='+response+'&page=testimonials_general_settings_vc';
        }
     });
}

function imtst_select_team_vc(id, target){
	var the_value = jQuery(id).val();
	if(the_value.indexOf('all')>-1){
		jQuery(id).val('all');
		jQuery(target).val('all');
	}else{
		var new_val = the_value.join(',');
		jQuery(target).val(new_val);
	}
}

function imtst_uncheck_c_hz(c, t, h){
	if (jQuery(c).is(':checked')){
		jQuery(t).attr('checked', false);
		jQuery(h).val(0);
	}
}

function imtstTestiCustomHrefVc(v, t){
	if (v==-1){
		//display
		jQuery(t).fadeIn(200);
		return;
	} 
	jQuery(t).fadeOut(200);
}