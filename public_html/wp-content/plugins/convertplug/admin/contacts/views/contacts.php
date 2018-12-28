<?php

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

   $smile_lists = get_option('smile_lists');
   $provider = '';
   $list_name = '';
   $list_id = esc_attr( $_GET['list'] );
   if($smile_lists)  {
      if(isset($smile_lists[$list_id])) {
        $list = $smile_lists[$list_id];
        $list_name = $list['list-name'];
        $provider = $list['list-provider'];
      }
   }

   $totalContacts = 0;

   $id = isset( $list['list'] ) ? $list['list'] : '';

   $mailer = str_replace(" ","_",strtolower( trim( $provider ) ) );
   $listName = str_replace(" ","_",strtolower( trim( $list_name ) ) );
   if( $mailer !== "convert_plug" ){
      $listOption = "cp_".$mailer."_".$listName;
      $contacts = get_option($listOption);
   } else {
      $listOption = "cp_connects_".$listName;
      $contacts = get_option($listOption);
   }


   if($contacts) {
      $totalContacts  = count($contacts);
   }

   require_once CP_BASE_DIR.'/admin/contacts/views/cp-paginator.php';

   $limit      = ( isset( $_GET['limit'] ) ) ? esc_attr( $_GET['limit'] ) : 10;
   $page       = ( isset( $_GET['cont-page'] ) ) ? esc_attr( $_GET['cont-page'] ) : 1;
   $links      = ( isset( $_GET['links'] ) ) ? esc_attr( $_GET['links'] ) : 1;
   $orderby    = ( isset( $_GET['orderby'] ) ) ? esc_attr( $_GET['orderby'] ) : 'name';
   $order      = ( isset( $_GET['order'] ) ) ? esc_attr( $_GET['order'] ) : 'asc';
   $listID     = esc_attr( $_GET['list'] );
   $maintainKeys = false;

   if( isset( $_POST['sq'] ) ) {
      $searchKey =  esc_attr($_POST['sq']);
      $redirectString = '?page=contact-manager&view=contacts&list='.$listID.'&limit='.$limit.'&sq='.$searchKey.'&cont-page=1';
      echo "<script>
      window.location.href= '$redirectString';
      </script>";
   } else {
      $searchKey = '';
   }

   if ( isset( $_GET['order'] )  && esc_attr( $_GET['order'] )  === 'asc' )
      $orderLink = "order=desc";
   else
      $orderLink = "order=asc";

   $sortingNameClass = $sortingEmailClass = $sortingDateClass = "sorting";

   if ( isset( $_GET['orderby'] ) ) {
      switch( $_GET['orderby'] ) {
        case "name" :
          $sortingNameClass  = 'sorting-'. esc_attr( $_GET['order'] );
        break;
        case "email" :
          $sortingEmailClass = 'sorting-'. esc_attr( $_GET['order'] );
        break;
        case "date" :
          $sortingDateClass  = 'sorting-'. esc_attr( $_GET['order'] );
        break;
      }
    }

    if( isset( $_POST['sq'] ) && $_POST['sq'] !== '' )
      $searchKey =  $_POST['sq'];
    else
      $searchKey = '';

    if( isset($_GET['sq']) && !empty($_GET['sq']) )
      $sq = esc_attr( $_GET['sq'] );
    else
      $sq = $searchKey;

    if( isset( $_POST['sq'] ) && $_POST['sq'] === '' )
       $sq = '';

    $searchInParams = array('name','email');
    if ($contacts) {

      $Paginator = new CP_Paginator( $contacts );
      $result = $Paginator->getData( $limit , $page ,$orderby, $order , $sq ,$searchInParams , $maintainKeys );

      $contacts = $result->data;
    }

?>

<div class="wrap about-wrap bsf-connect bsf-connect-list bend">
  <div class="wrap-container">

    <div class="bend-heading-section bsf-connect-header bsf-connect-list-header <?php if( empty( $contacts ) ){ echo 'bsf-connect-empty-header'; } ?>">
      <h1><span class="cp-strip-text" style="max-width: 460px;top: 10px;" title="<?php echo esc_attr( $list_name ); ?>"><?php echo esc_attr( $list_name ); ?></span> <a class="add-new-h2" href="?page=contact-manager"><?php _e('Back to Campaigns List', 'smile'); ?></a></h1>
        <?php if( $totalContacts > 0 ){ ?>
        <?php
             $export_list_nonce = wp_create_nonce( 'export-list-'.$list_id );

             $form_action = admin_url( "admin-post.php?action=cp_export_list&list_id=".$list_id . "&_wpnonce=" .$export_list_nonce );

        ?>
        <form method="post" class="cp-export-contact" action="<?php echo esc_url($form_action); ?>">
            <input type="hidden" name="list_id" value="<?php echo $list_id; ?>" />
            <a class="action-list action-download-contact bsf-connect-download-csv" href="#" target="_top" style="margin-right: 25px !important;"><i style="line-height: 30px;" class="connects-icon-download"></i><span class="action-tooltip"><?php _e( "Export CSV", "smile" ); ?></span></a>
        </form>       
        <a href="?page=contact-manager&view=analytics&campaign=<?php echo $listID;?>"  style="margin-right: 25px !important;" class="bsf-connect-download-csv"><i class="connects-icon-bar-graph-2" style="line-height: 30px;"></i>
        <?php _e( "Analytics", "smile" ); ?>
        </a>
        <?php $searchActiveClass = $sq !== '' ? "bsf-cntlist-top-search-act" : ''; ?>
        <span class="bsf-contact-list-top-search <?php echo $searchActiveClass; ?>"><i class="connects-icon-search" style="line-height: 30px;"></i>
          <form method="post" class="bsf-cntlst-top-search">
            <input class="bsf-cntlst-top-search-input" type="search" id="post-search-input" name="sq" placeholder="<?php _e( "Search", "smile" ); ?>" value="<?php echo esc_attr($sq ); ?>">
            <i class="bsf-cntlst-top-search-submit connects-icon-search"></i>
          </form>
        </span><!-- .bsf-contact-list-top-search -->
      <?php } ?>

      <div class="bend-head-logo <?php echo esc_attr( str_replace(" ", "-", strtolower( $provider ) ) ); ?>">
      </div>

    </div><!-- bend-heading section -->

    <div class="msg"></div>

    <div class="bend-content-wrap">
      <hr class="bsf-extensions-lists-separator" style="margin: 22px 0px 30px 0px;"></hr>
      <div class="container bsf-connect-content">
        <table  class="wp-list-table widefat fixed bsf-connect-optins bsf-connect-optins-list">
          <thead>
            <tr>
              <th scope="col" id="list-id" class="manage-column column-name <?php echo $sortingNameClass; ?>">
              <a href="?page=contact-manager&view=contacts&orderby=name&list=<?php echo $listID; ?>&<?php echo $orderLink; ?>&sq=<?php echo $searchKey; ?>&cont-page=<?php echo $page; ?>">
                <span class="connects-icon-head"></span>
                <?php _e( "Name", "smile" ); ?></a></th>
              <th scope="col" id="provider" class="manage-column column-email <?php echo $sortingEmailClass; ?>">
              <a href="?page=contact-manager&view=contacts&orderby=email&list=<?php echo $listID; ?>&<?php echo $orderLink; ?>&sq=<?php echo $searchKey; ?>&cont-page=<?php echo $page; ?>">
              <span class="connects-icon-mail"></span>
                <?php _e( "Email", "smile" ); ?></a></th>
              <th scope="col" id="date" class="manage-column column-date <?php echo $sortingDateClass; ?>">
                <a href="?page=contact-manager&view=contacts&orderby=date&list=<?php echo $listID; ?>&<?php echo $orderLink; ?>&sq=<?php echo $searchKey; ?>&cont-page=<?php echo $page; ?>">
              <span class="connects-icon-marquee-plus"></span>
                <?php _e( "Subscribed On", "smile" ); ?></a></th>
              <th scope="col" id="delete" class="manage-column column-delete <?php echo $sortingDateClass; ?>">
                <a href="?page=contact-manager&view=contacts&orderby=date&list=<?php echo $listID; ?>&<?php echo $orderLink; ?>&sq=<?php echo $searchKey; ?>&cont-page=<?php echo $page; ?>">
              <span class="connects-icon-trash"></span>
                <?php _e( "Delete", "smile" ); ?></a></th>
            </tr>
          </thead>
          <tbody id="the-list" class="smile-style-data">
            <?php

    if( !empty( $contacts ) ){
      foreach( $contacts as $key => $list ){
        $name = ( isset( $list['name'] ) && $list['name'] !== "" ) ? $list['name'] : 'NA';
        if($name === 'NA'){
          $name   = ( isset( $list['FName'] ) && $list['FName'] !== "" ) ? $list['FName'] : 'NA';
        }
        $email = ( isset( $list['email'] ) && !empty( $list['email'] ) ) ? $list['email'] : 'NA';
        $user_id = ( isset( $list['user_id'] ) && !empty( $list['user_id'] ) ) ? $list['user_id'] : '';
        $date = date("j M Y",strtotime($list['date']));
        $url = CP_BASE_URL . 'admin/images/default-gravtar.png';
        $delete_contact_nonce = wp_create_nonce( 'cp-delete-contact' );
        ?>
            <tr>  
              <td scope="col" class="manage-column column-name" data-href="<?php echo admin_url(); ?>admin.php?page=contact-manager&view=contact-details&list=<?php echo esc_attr( $_GET['list'] ); ?>&id=<?php echo esc_attr( $user_id ); ?>&email=<?php echo $email; ?>" ><span class="connect-list-gravtar-img"><?php echo get_avatar($email,'96','https://support.brainstormforce.com/wp-content/uploads/2015/07/default-gravtar.png' ); ?></span><?php echo esc_attr( $name ); ?></td>
              <td scope="col" class="manage-column column-email" data-href="<?php echo admin_url(); ?>admin.php?page=contact-manager&view=contact-details&list=<?php echo esc_attr( $_GET['list'] ); ?>&id=<?php echo esc_attr( $user_id ); ?>&email=<?php echo $email; ?>"><?php echo esc_attr( $email ); ?></td>
              <td scope="col" class="manage-column column-date" data-href="<?php echo admin_url(); ?>admin.php?page=contact-manager&view=contact-details&list=<?php echo esc_attr( $_GET['list'] ); ?>&id=<?php echo esc_attr( $user_id ); ?>&email=<?php echo $email; ?>"><?php echo esc_attr( $date ); ?></td>
              <input type="hidden" id="delete-contact-nonce" value="<?php echo $delete_contact_nonce; ?>" />
              <td scope="col" class="manage-column column-delete"><a class="action-list delete-contact" style="margin-left: 6px;" data-list-id="<?php echo $key; ?>" data-list="<?php echo esc_attr( $_GET['list'] ); ?>" data-user-id="<?php echo esc_attr( $user_id ); ?>" data-email="<?php echo $email; ?>" href="#" data-mailer = "<?php echo $mailer;?>"><i class="connects-icon-trash"></i><span class="action-tooltip"><?php _e( "Delete", "smile" ); ?></span></a></td>
            </tr>
            <?php
      }
    } else {
      ?>
            <tr data-href="<?php echo admin_url(); ?>admin.php?page=contact-manager&view=contacts&list=<?php echo $list_id; ?>">
              <?php if( isset( $_GET['sq'] ) && esc_attr( $_GET['sq'] ) !== '' ) { ?>
                  <th scope="col" class="manage-column bsf-connect-column-empty" colspan="3"><?php _e( "No results available.", "smile" ); ?><a class="add-new-h2" style="position:relative;top:-2px;" href="javascript:void(0);"><?php _e( "Back to Contact List", "smile" ); ?></a></th>
            </tr>
              <?php } else { ?>
            <tr>
                  <th scope="col" class="manage-column bsf-connect-column-empty" colspan="3"><?php _e( "No contacts available.", "smile" ); ?></th>
              <?php } ?>
            </tr>
            <?php
    }
      ?>
          </tbody>
        </table>
      </div>
      <!-- .container -->

      <div class="row">
        <div class="container" style="max-width:100% !important;width:100% !important;">
          <div class="col-sm-6">
            <p class="search-box">
              <form method="post" class="bsf-cntlst-search">
                <label class="screen-reader-text" for="post-search-input"><?php _e( "Search Contacts:", "smile" ); ?></label>
                <input type="search" id="post-search-input" name="sq" value="<?php echo esc_attr($sq ); ?>">
                <input type="submit" id="search-submit" class="button" value="Search">
              </form>
            </p>
          </div><!-- .col-sm-6 -->
          <div class="col-sm-6">
            <?php
            if($contacts) {
              $basePageLink = '?page=contact-manager&view=contacts';
              echo $Paginator->createLinks( $links, 'pagination bsf-cnt-pagi', $listID , $sq ,$basePageLink);
            }
            ?>
            <div class="bsf-cnt-total-contancts"><?php echo $totalContacts; ?> <?php _e( "Contacts", "smile" ); ?></div>
          </div><!-- .col-sm-6 -->
        </div><!-- .container -->
      </div><!-- .row -->


    </div>
    <!-- .bend-content-wrap -->
  </div>
  <!-- .wrap-container -->
</div>
<!-- .wrap -->

<script type="text/javascript">
  jQuery(".action-download-contact").click(function(e){
   e.preventDefault();
    var form = jQuery(this).parents('form');
    form.submit();
  });
  jQuery(document).on("focus",'.bsf-cntlst-top-search-input', function(){
    jQuery(".bsf-contact-list-top-search").addClass('bsf-cntlist-top-search-act');
  });
   jQuery(document).on("focusout",'.bsf-cntlst-top-search-input', function(){
    jQuery(".bsf-contact-list-top-search").removeClass('bsf-cntlist-top-search-act');
  });
  jQuery(document).on("click",".bsf-cntlst-top-search-submit", function(){
      jQuery('.bsf-cntlst-top-search').submit();
  });

  jQuery( document ).ready(function() {

      jQuery('table tbody td').click(function(){
          if( !jQuery(this).hasClass('column-delete') ){
              window.location = jQuery(this).data('href');
          }
          return false;
      });

      if( jQuery('.bsf-contact-list-top-search').hasClass('bsf-cntlist-top-search-act') )  {
        jQuery('.bsf-cntlst-top-search-input').focus().trigger('click');
      }

      //delete contacts

      jQuery(".delete-contact").click(function(e){
        e.preventDefault();      
        var $this = jQuery(this);  
        swal({
          title: "<?php _e( "Are you sure?", "smile" ); ?>",
          text: "<?php _e( "You will not be able to recover this Contact!", "smile" ); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?php _e( "Yes, delete it!", "smile" ); ?>",
          cancelButtonText: "<?php _e( "No, cancel it!", "smile" ); ?>",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },
        function(isConfirm){
          if (isConfirm) {        
            jQuery(document).trigger('trashContact',[$this]);
          } else {
            swal("<?php _e( "Cancelled", "smile" ); ?>", "<?php _e( "Your contact is safe :)", "smile" ); ?>", "error");
          }
        });

        //delete contact 
        jQuery(document).on("trashContact", function(e,$this){
            var action  = 'cp_trash_contact',
                list_id = $this.data('list'),
                user_id = $this.data('user-id'),
                email_id = $this.data('email'),
                mailer  = $this.data('mailer'),
                msg = jQuery(".msg"),
                data = {
                    list_id: list_id,
                    user_id:user_id,
                    email_id:email_id,
                    action: action,
                    mailer : mailer,
                    security_nonce: jQuery("#delete-contact-nonce").val()
                };

            jQuery.ajax({
                url: ajaxurl,
                data: data,
                method: "POST",
                dataType: "JSON",
                success: function(result){
                    console.log(result);
                    if( result.status === "success" ){
                        swal({
                            title: "<?php _e( "Removed!", "smile" ); ?>",
                            text: "<?php _e( "The contact you have selected is removed.", "smile" ); ?>",
                            type: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        swal({
                            title: "<?php _e( "Error!", "smile" ); ?>",
                            text: "<?php _e( "Something went wrong! Please try again.", "smile" ); ?>",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                    setTimeout(function(){
                            document.location = document.location;
                    },800);

                },
                error: function(error){
                    console.log(error);
                }
            });
        });

      });

  });
</script>
