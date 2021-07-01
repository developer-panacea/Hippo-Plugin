<?php
function hippo_settings_update(){
    $option_id = $_GET['option_id'];
    global $wpdb;
    $table_name = $wpdb->prefix."options";
		
    
    
    if(isset($_POST['update'])){
        $option_value = $_POST['option_value'];
        $wpdb->update(
                $table_name, //table
                array('option_value' => $option_value), //data
                array('option_id' => $option_id), //where
                array('%s'), //data format
                array('%s') //where format
        );
    }else{
        $key_detail = $wpdb->get_row("select option_id,option_name,option_value from $table_name where option_id = $option_id");
		
    }
    
   ?>
<div class="row">
    <div class="col-md-12">
     <div class="col-md-6">   
    <h2>Update API Configuration</h2>
    <?php 
    if(isset($_POST['update'])){?>
        
        <div class="updated"><p>Key Updated Successfully</p></div>
        <a href="<?php echo admin_url('admin.php?page=hippo-settings-list') ?>">&laquo; Back to API list</a>
        
    <?php }else{ ?>
    <form method="post" action="" class="form-horizontal" >
        <div class="form-group">
         <label class="col-md-3"><?php echo ($key_detail->option_name == "AUTH_TOKEN") ? 'AUTH TOKEN':"API URL";?></label>   
          <div class="col-md-6">
          <input class="form-control" type="text" name="option_value" value="<?= $key_detail->option_value;?>">
          </div>
        </div>
        <div class="form-group">
        <input type="submit" value="Update" name="update" class="btn btn-info">
        </div>
    </form>
    <?php
    }
    ?>
</div>
</div>
</div>
<?php
}
