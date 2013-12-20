<?php

/*-----------------------------------------------------------------
 The gallery class takes care of the gallery functionalities, such
 as upload, browse, buy.
 -----------------------------------------------------------------*/

class gallery_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

/* upload() lets a user with admin credentials upload new items */

    public function upload() {
    	# If user is not logged in as admin; redirect them to the login page
        if($this->user->name != "Supersecretuser") {
            Router::redirect('/');
        }
		# If they weren't redirected:

        # Setup view
        $this->template->content = View::instance('v_gallery_upload');
        $this->template->title   = "Upload item";
        
        # Render template
        echo $this->template;
    }

    public function p_upload(){
    	# Again, if user is not logged in as admin; redirect them to the login page
        if($this->user->name != "Supersecretuser") {
            Router::redirect('/');
        }

       	# If they weren't redirected away, continue:

        # Make sure that necessary form fields are filled out (also done client side)
        if(ctype_space($_POST['item_type']) OR ctype_space($_POST['serial_no']) 
        	OR ctype_space($_POST['color']) OR ctype_space($_POST['overall_height_in']) 
            OR ctype_space($_POST['description']) 
            OR ctype_space($_POST['img_front'])) {
            # If any of the fields are empty, display error message
            Router::redirect("/users/signup/error/empty"); 
		} else {
            # Make sure that the provided serial number is not already in database
            # Search the db for this serial_no 
            # Retrieve if exists
            $q = "SELECT serial_no 
            FROM faucets 
            WHERE serial_no = '".$_POST['serial_no']."'";

            $serial_number = DB::instance(DB_NAME)->select_field($q);

	        # If we didn't find this serial number in the database...
	        if(!$serial_number) {
	        # Calculate and store faucet heights and projections in cm
	        $_POST['overall_height_cm']  = ($_POST['overall_height_in'] * 2.54);
	        $_POST['spout_height_cm'] = ($_POST['spout_height_in'] * 2.54);
	        $_POST['projection_cm'] = ($_POST['projection_in'] * 2.54);
	        $_POST['major_diameter_cm'] = ($_POST['major_diameter_in'] * 2.54);
	        $_POST['minor_diameter_cm'] = ($_POST['minor_diameter_in'] * 2.54);
	        
	        # in order to upload more than one image at at time:
	        # make two arrays out of $_FILES items (because upload() expects an array)
	   		$front[0] = $_FILES[img_front];
	        $side[0] = $_FILES[img_side];
 
	        # store and upload one or two file names, depending on how many were provided by admin
	        # if a second image has been provided
	        if(isset($side[0][name])) {
	        	# store both in DB
		        $images = Array("img_front" => $_POST['serial_no']."f", "img_side" => $_POST['serial_no']."s");
		        # upload both
		    	# frontal image
		        Upload::upload($front, "/uploads/faucets/", array("jpg"), $_POST['serial_no']."f");
		    	# side image
		        Upload::upload($side, "/uploads/faucets/", array("jpg"), $_POST['serial_no']."s");
	        }
	        # else store and upload only the first
	    	else {
	    		# store only the first file name
	    		$images = Array("img_front" => $_POST['serial_no']."f", "img_side" => NULL);
		        # If there is less than two images, only upload one
		        Upload::upload($front, "/uploads/faucets/", array("jpg"), $_POST['serial_no']."f");
		    } 
		
	        # Insert data into database
	        # Note we didn't have to sanitize any of the data because we're using the insert and update methods which does it for us
	        $faucet_id = DB::instance(DB_NAME)->insert('faucets', $_POST); 
	        DB::instance(DB_NAME)->update("faucets", $images, "WHERE faucet_id = $faucet_id");
	       
	        $serial_no = $_POST['serial_no'];
	        # redirect to the uploaded item's browse page
	        Router::redirect("/gallery/item/$serial_no");
	        
	        } else {
	            Router::redirect("/users/signup/error/serial_no"); 
	        }
	    } 
	}
/*---------------------------------------------------------------
browse() takes care of displaying the whole gallery 
----------------------------------------------------------------*/

public function browse() {
	# Setup view
    $this->template->content = View::instance('v_gallery_browse');
    $this->template->title   = "Gallery";

    # Build the query to show all faucets
    $q = 'SELECT 
        faucets.*
    	FROM faucets';

    # Run the query
    $posts = DB::instance(DB_NAME)->select_rows($q);
    
    # store the number of items in the database
    $items = count($posts);

    # Pass data to the View
    $this->template->content->posts = $posts;
    $this->template->content->items = $items;
        
        # Render template
        echo $this->template;
}

/*---------------------------------------------------------------
item() displays the item that has been clicked in the gallery
----------------------------------------------------------------*/

public function item($arg) {
	# Setup view
    $this->template->content = View::instance('v_gallery_item');
    $this->template->title   = "Details";

    # Build the query to show this faucet
    $q = "SELECT *
    	FROM faucets
    	WHERE serial_no = '".$arg."'";

    # Run the query
    $items = DB::instance(DB_NAME)->select_rows($q);

	# Pass data to the View
  	$this->template->content->items = $items;

    # Render template
   echo $this->template;
}

/*---------------------------------------------------------------
delete() removes an item from the DB. (Only accessible by admin)
----------------------------------------------------------------*/

public function delete($arg) {
	# only admin has access to deletion
	if($this->user->name != "Supersecretuser") {
        die("Sorry. We can't do that. <a href='/'>Home</a>");
    }

    if(!$arg) {
        die("Sorry. We can't do that. <a href='/'>Home</a>");
    }
    
    # Build the query to find this faucet's faucet_id
    $q = "SELECT faucet_id
    	FROM faucets
    	WHERE serial_no = '".$arg."'";

    # Run the query
    $faucet_id = DB::instance(DB_NAME)->select_field($q);

    # delete row with this faucet_id
    DB::instance(DB_NAME)->delete('faucets', "WHERE faucet_id = '$faucet_id'");

    # reroute to gallery
    Router::redirect('/gallery/browse');
}

/*---------------------------------------------------------------
about() renders the about-page
----------------------------------------------------------------*/


public function about() {
	# Setup view
    $this->template->content = View::instance('v_gallery_about');
    $this->template->title   = "About";

    # Render template
   echo $this->template;
}

/*---------------------------------------------------------------
specs() renders the specs-page
----------------------------------------------------------------*/


public function specs() {
	# Setup view
    $this->template->content = View::instance('v_gallery_specs');
    $this->template->title   = "Specs";

    # Render template
   echo $this->template;
}


} # end of the class