<?php
function hippo_settings_list(){

    global $wpdb;
	$table_name = $wpdb->prefix."options";
    $auth_token = $wpdb->get_row("select option_id,option_name,option_value from $table_name where option_name='AUTH_TOKEN'");
	$api_url = $wpdb->get_row("select option_id,option_name,option_value from $table_name where option_name='API_URL'");
  ?>
<div class="row">
<div class="col-md-12">
<div class="col-md-8">
    <h2>Hippo API Settings</h2>    
    <table class="table table-bordered">
        <tr>
            <th>Auth Token</th>
            <td><?= $auth_token->option_value;?></td>
            <td><a href="<?php echo admin_url('admin.php?page=hippo-settings-update&option_id='.$auth_token->option_id)?>" class="btn btn-info">Update</a></td>
        </tr>
        <tr>
            <th>API URL</th>
            <td><?= $api_url->option_value;?></td>
            <td><a href="<?php echo admin_url('admin.php?page=hippo-settings-update&option_id='.$api_url->option_id);?>" class="btn btn-info">Update</a></td>
        </tr>
    </table>
</div>
</div>
<?php
}