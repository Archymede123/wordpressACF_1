<script>
    var dir_url = '<?php echo IMTST_DIR_URL_VC;?>';
    jQuery(document).ready(function(){
        imtst_preview_form();
    });
</script>
<div class="ictst_wrap">
    <h1>Form Builder</h1>
     <div>
        <div class="box-title">
            <h3><i class="icon-cogs"></i>Settings</h3>
            <div class="actions pointer">
			    <a onclick="jQuery('#the_formb_settings').slideToggle();" class="btn btn-mini content-slideUp">
                    <i class="icon-angle-down"></i>
                </a>
			</div>
            <div class="clear"></div>
        </div>
     </div>
     <div id="the_formb_settings" class="the_formb_settings">
          <table>
                <tr>
                    <td>
                        <b>Show</b>
                    </td>
                    <td>
                        <b>Option Name</b>
                    </td>
                    <td>
                        <b>Label</b>
                    </td>
                    <td>
                        <b>Required</b>
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_name" onClick="imtst_preview_form();"  checked />
                    </td>
                    <td style="font-weight:bold;">
                        Client Name
                    </td>
                    <td>
                        <input type="text" value="Name" id="client_name_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_name_req" onClick="imtst_preview_form();" checked/>
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_image" onClick="imtst_preview_form();" />
                    </td>
                    <td style="font-weight:bold;">
                        Client Image
                    </td>
                    <td>
                        <input type="text" value="Image" id="client_image_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_image_req" onClick="imtst_preview_form();" />
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_job" onClick="imtst_preview_form();"  checked />
                    </td>
                    <td style="font-weight:bold;">
                        Client Job
                    </td>
                    <td>
                        <input type="text" value="Position" id="client_job_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_job_req" onClick="imtst_preview_form();" checked/>
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_url" onClick="imtst_preview_form();" />
                    </td>
                    <td style="font-weight:bold;">
                         Client URL
                    </td>
                    <td>
                        <input type="text" value="URL" id="client_url_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="client_url_req" onClick="imtst_preview_form();" />
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="company" onClick="imtst_preview_form();"  checked />
                    </td>
                    <td style="font-weight:bold;">
                         Company
                    </td>
                    <td>
                        <input type="text" value="Company" id="company_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="company_req" onClick="imtst_preview_form();" />
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="company_url" onClick="imtst_preview_form();" />
                    </td>
                    <td style="font-weight:bold;">
                         Company URL
                    </td>
                    <td>
                        <input type="text" value="Company URL" id="company_url_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="company_url_req" onClick="imtst_preview_form();" />
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="quote" onClick="imtst_preview_form();"  checked />
                    </td>
                    <td style="font-weight:bold;">
                         Quote
                    </td>
                    <td>
                        <input type="text" value="Testimonial" id="quote_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="quote_req" onClick="imtst_preview_form();" checked />
                    </td>
                </tr>
                <tr>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="rating" onClick="imtst_preview_form();"  checked />
                    </td>
                    <td style="font-weight:bold;">
                         Rating
                    </td>
                    <td>
                        <input type="text" value="Rating" id="rating_label" class='imtst_input' onKeyUp="imtst_preview_form();" />
                    </td>
                    <td class="imtst_td_align">
                        <input type="checkbox" id="rating_req" onClick="imtst_preview_form();" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td valign="top" style="font-weight:bold;">Success message</td>
                    <td>
                        <textarea id="s_msg" class='imtst_input' onKeyUp="imtst_preview_form();">Thank you for your submitted testimonial!</textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td valign="top"  style="font-weight:bold;">Error message</td>
                    <td>
                        <textarea id="err_msg" class='imtst_input' onKeyUp="imtst_preview_form();" >An Error has Occurred. Please Try Again and complete all the required fields!</textarea>
                    </td>
                    <td></td>
                </tr>
          </table>
     </div>
    <div class="shortcode_wrapp">
        <div class="content_shortcode">
            <div>
                <span style="font-weight:bolder; color: #333; font-style:italic; font-size:11px;">ShortCode : </span>
                <span class="the_shortcode"></span>
            </div>
            <div style="margin-top:10px;">
                <span style="font-weight:bolder; color: #333; font-style:italic; font-size:11px;">PHP Code: </span>
                <span class="php_code"></span>
            </div>
        </div>
    </div>
    <div class="ictst_preview_wrapp">
        <div class="box_title">
            <h2><i class="icon-eyes"></i>Preview</h2>
                <div class="actions_preview pointer">
    			    <a onclick="jQuery('#preview').slideToggle();" class="btn btn-mini content-slideUp">
                        <i class="icon-angle-down"></i>
                    </a>
    			</div>
            <div class="clear"></div>
        </div>
        <div id="preview" class="ictst_preview"></div>
    </div>
</div>