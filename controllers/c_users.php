<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";

        # Render template
            echo $this->template;
    }

    public function p_signup() {
        # Make sure user can't access /users/p_signup/ without submitting the form
        if(empty($_POST['email'])) {
        die("Please submit email address. <a href='/users/signup'>Sign up</a>");
        }

        # If they weren't redirected away, continue:

        # Make sure that all of the form fields are filled out (also done client side)
        if(ctype_space($_POST['email']) OR ctype_space($_POST['password'])
            OR ctype_space($_POST['name'])) {
            # If any of the fields are empty, display error message
            Router::redirect("/users/signup/error/empty"); 
        } else {
            # Make sure that the provided email is not already in database
            
            # Search the db for this email 
            # Retrieve if exists
            $q = "SELECT email 
            FROM users 
            WHERE email = '".$_POST['email']."'";

            $email = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find this email in the database, sign up
        if(!$email) {

        # Store the time that the account was created and modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password  
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

        # User is automatically logged in after signing up
        setcookie("token", $_POST['token'], strtotime('+4 weeks'), '/');

        # send signup confirmation email (+1 feature #1) 
            $to[] = Array("name" => $_POST['name'], "email" => $_POST['email']);
            $from = Array("name" => APP_NAME, "email" => APP_EMAIL);
            $subject = $_POST['name']." just signed up for Glass Faucet Gallery!";
            $body = $_POST['name'].",  welcome to Glass Faucet.";
            $cc  = "";
            $bcc = "";
            $email = Email::send($to, $from, $subject, $body, false, $cc, $bcc);

        # Redirect to start page
        Router::redirect("/");

        } else {
            Router::redirect("/users/signup/error/email"); 
        }
        }       
    }

    public function login($error = NULL) {
        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;
    }

    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token 
            FROM users 
            WHERE email = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find a matching token in the database, it means login failed
        if(!$token) {
            # Send them back to the login page
            Router::redirect("/users/login/error");

        # But if we did, login succeeded! 
        } else {
            /* 
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+2 weeks'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/");
        }
    }

    public function logout() {
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
    }

    public function profile($user_name = NULL) {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
        Router::redirect('/users/login');
        }

        # If they weren't redirected away, continue:

        # Setup view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title   = "Profile of".$this->user->name;

        # Render template
        echo $this->template;
    }

    public function favorite() {
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
        die("Please log in or sign up to favorite a piece. <a href='/users/login'>Login</a> <a href='/users/signup'>Sign up</a>");
        }
        # If they weren't redirected away, continue:
       
        # Set up the View
        $this->template->content = View::instance('v_users_favorite');
        $this->template->title = "My favorites";
 
        # Build the query
        
        $q = 'SELECT *
            FROM faucets
            INNER JOIN users_faucets
            ON faucets.faucet_id = users_faucets.faucet_id
            WHERE users_faucets.user_id = '.$this->user->user_id.'';

        # Run the query
        $items = DB::instance(DB_NAME)->select_rows($q);

        # store the number of favorites
        $no_of_favs = count($items);

        
        # Pass data to the View
        $this->template->content->items = $items;
        $this->template->content->no_of_favs = $no_of_favs;

        # Render the View
        echo $this->template;
    }

    public function p_favorite($arg) {
        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Please log in or sign up to favorite a piece. <a href='/users/login'>Login</a> <a href='/users/signup'>Sign up</a>");
        }

        if(!$arg) {
            die("Please click on a piece to favorite it. <a href='/gallery/browse'>Browse</a>");
        }

        # query the database for the favorited faucet's faucet_id
        $q = "SELECT faucet_id
        FROM faucets
        WHERE serial_no = '".$arg."'";

        $faucet_id = DB::instance(DB_NAME)->select_field($q);

        # Make sure that the user has not already favorited this item
        # Search the db for this user and faucet in the same post
        # Retrieve if exists
        $q = "SELECT user_id  
            FROM users_faucets
            WHERE user_id = '".$this->user->user_id."' AND faucet_id = '".$faucet_id."'";

        $duplicates = DB::instance(DB_NAME)->select_field($q);
        # If we didn't find this serial number in the database...
        if(!$duplicates) {
            # build an array with the values to be inserted
            $fav_array = Array("user_id" => $this->user->user_id, "faucet_id" => $faucet_id);
            # insert values
            $user_faucet_id = DB::instance(DB_NAME)->insert('users_faucets', $fav_array); 
            Router::redirect('/users/favorite');
        }
        else {
            # if this was a duplicate favorite, reroute to favorites
            Router::redirect("/users/favorite");
        }
    }

    public function p_unfavorite($arg) {
        
        # query the database for the un-favorited faucet's faucet_id
        $q = "SELECT faucet_id
        FROM faucets
        WHERE serial_no = '".$arg."'";

        $faucet_id = DB::instance(DB_NAME)->select_field($q);

        # Delete this connection
        $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND faucet_id = '.$faucet_id;
        DB::instance(DB_NAME)->delete('users_faucets', $where_condition);

        # Send them back
        Router::redirect("/users/favorite");
    }

/*---------------------------------------------------------------
contact() sends admin an email from user. 
----------------------------------------------------------------*/
    public function contact($arg){
        # Setup view
        $this->template->content = View::instance('v_users_contact');
        $this->template->title   = "Contact";

        # Build the query to show this faucet
        $q = "SELECT *
        FROM faucets
        WHERE serial_no = '".$arg."'";

        # Run the query
        $items = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->items = $items;
        $this->template->content->error = $error;        

        # Render template
        echo $this->template;
    }

    public function p_contact($arg){
        if(!$arg) {
            die("Sorry. We can't do that. <a href='/'>Home</a>");
        }
         # if user is logged in
        if($this->user) {

            # send email to admin
            $to[] = Array("name" => APP_NAME, "email" => APP_EMAIL);
            $from = Array("name" => $this->user->name, "email" => $this->user->email);
            $subject = "Interest in item no. ".$arg;
            $body = $_POST['mail'];
            $cc  = "";
            $bcc = "";
            $email = Email::send($to, $from, $subject, $body, false, $cc, $bcc);
        }
        # else user is not logged in
        else {
            # send email to admin
            $to[] = Array("name" => APP_NAME, "email" => APP_EMAIL);
            $from = Array("name" => $_POST['from_name'], "email" => $_POST['from_email']);
            $subject = "Interest in item no. ".$arg;
            $body = $_POST['mail'];
            $cc  = "";
            $bcc = "";
            $email = Email::send($to, $from, $subject, $body, false, $cc, $bcc);
        } 
         Router::redirect("/gallery/item/$arg");
    }


/*---------------------------------------------------------------
delete() removes a user from the DB. (Only accessible by logged in user)
----------------------------------------------------------------*/

    public function delete($arg) {
        # only user has access to deletion
        if($this->user->user_id != "$arg") {
            die("Sorry. We can't do that. <a href='/'>Home</a>");
        }

        if(!$arg) {
            die("Sorry. We can't do that. <a href='/'>Home</a>");
        }

        # delete row with this user_id
        DB::instance(DB_NAME)->delete('users', "WHERE user_id = '$arg'");

        # reroute to home
        Router::redirect('/');
    }


} # end of the class