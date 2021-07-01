<?php
function twentytwenty_register_styles() {

	
	wp_enqueue_style('bootstrap-css','https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',array(),3.4,'all');
	wp_enqueue_script('jquery-js','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',array(),3.4,true);
	wp_enqueue_script('jquery-validate','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js',array(),3.4,true);
    wp_enqueue_script('bootstrap-js','https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js',array(),3.4,true);
	wp_enqueue_script('custom-js',get_template_directory_uri().'/assets/js/custom.js',array('jquery-js'),1.0,true);
	wp_localize_script('custom-js','my_ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));

	

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

add_action('wp_ajax_my_first_call','get_data');  // for login user use this
add_action('wp_ajax_nopriv_my_first_call','get_data'); //for logout user use this

function get_data(){
	
    global $wpdb;
	$table_name = $wpdb->prefix.'options';
	$auth_token = $wpdb->get_row("select option_value from $table_name where option_name='AUTH_TOKEN'");
	$api_url = $wpdb->get_row("select option_value from $table_name where option_name='API_URL'");
	$auth_token = $auth_token->option_value;
	$api_url = $api_url->option_value;

	$street = str_replace(' ','%',$_GET['saddress']);
	$city = str_replace(' ','%',$_GET['city']);
	$state = $_GET['state'];
	$zipcode = $_GET['zipcode'];
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$email = str_replace(' ','%',$_GET['email']);
	$phone = $_GET['phone'];
	$dob = $_GET['dob'];
	//$dob_array = explode('-',$dob);
    //$dob = $dob_array[1].''.$dob_array[2].''.$dob_array[0];
	$dob = '05061979';
	
	$curl_url = "https://api.staging.myhippo.io/v1/herd/quote?auth_token=".$auth_token."&street=".$street."&city=".$city."&state=".$state."&zip=".$zipcode."&first_name=".$fname."&last_name=".$lname."&email=".$email."&phone=".$phone."&date_of_birth=".$dob;
    //print_r($curl_url);die;

	$curl = curl_init();
	

	curl_setopt_array($curl, array(
	  CURLOPT_URL => $curl_url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: 0ee813ce-7548-a680-f794-93ea9b69a1f7"
	  ),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
	
    wp_die();
}
