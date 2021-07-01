<?php

add_action('init','custom_shortcode');

function custom_shortcode(){
    add_shortcode('myform','custom_form');
} 

function custom_form(){
    ?>
   
<div class="row">
<div class="col-md-offset-2 col-md-10">
<form method="POST" class="form-horizontal" id="myform">
<div class="form-group">
<label class="col-md-4">First Name <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Middle Name <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Last Name <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Street Address <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="saddress" id="saddress" class="form-control" placeholder="Street Address">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Unit <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="unit" id="unit" class="form-control" placeholder="Unit">
</div>
</div>

<div class="form-group">
<label class="col-md-4">City <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="city" id="city" class="form-control" placeholder="City">
</div>
</div>

<div class="form-group">
<label class="col-md-4">State <sup style="color:red;">*</sup></label>
<div class="col-md-6">
<select name="state" class="form-control" id="state">
<option value="CA">CA</option>
<option value="alabama">Alabama</option>
<option value="alaska">Alaska</option>
<option value="arizona">Arizona</option>
<option value="arkansas">Arkansas</option>
<option value="california">California</option>
<option value="colorado">Colorado</option>
<option value="connecticut">Connecticut</option>
<option value="delaware">Delaware</option>
<option value="florida">Florida</option> 
<option value="georgia">Georgia</option> 
<option value="hawaii">Hawaii</option> 
<option value="idaho">Idaho</option> 
<option value="illinois">Illinois</option>
<option value="indiana">Indiana</option> 
<option value="iowa">Iowa</option> 
<option value="kansas">Kansas</option> 
<option value="kentucky">Kentucky</option> 
<option value="louisiana">Louisiana</option>   
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-4">Zipcode <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode">
</div>
</div>

<div class="form-group">
<label class="col-md-4">DOB <sup>*</sup></label>
<div class="col-md-6">
<input type="date" name="dob" id="dob" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Phone <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Email <sup>*</sup></label>
<div class="col-md-6">
<input type="text" name="email" id="email" class="form-control" placeholder="Email">
</div>
</div>

<div class="form-group">
<label class="col-md-4">Is This House <sup>*</sup></label>
<div class="col-md-6">
<input type="radio" name="rd" value="house" class="rd" checked> House
<input type="radio" name="rd" value="condo" class="rd"> Condo
<input type="radio" name="rd" value="ho5" class="rd"> Ho5
</div>
</div>

<div class="form-group">
<div class="col-md-6">
<input type="submit" value="submit" class="btn btn-success" id="submit">
</div>
</div>

</form>
</div>
</div>
<div class="row" id="response">
</div> 
    <?php
}