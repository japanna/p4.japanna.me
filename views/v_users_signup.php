<script src="/js/signup.js"></script>
<div id="contact_item">
    <div class="contact_container">
        <form method='POST' action='/users/p_signup'>
            <h1>Sign up</h1>
            <h2>Signing up allows you to save favorite items.</h2>
            <h2>Your prvacy is very important. You will not receive emails from us unless you contact us first.</h2> 
                
            <p><span>Full name</span></p>    
            <input type='text' name='name' required>

            <p><span>email</span></p>    
            <input type='email' name='email' required>

            <p><span>password</span></p>  
            <input type='password' name='password' required>
            <br><br>

            <?php if(isset($source)): ?>
        <div class='error'>
            <?php if($source == "empty") {
                echo "All fields are required. Please try again."; 
                } else {
                echo "Email already in use. Please try a different email address."; }?>
        </div>
        <br>
    <?php endif; ?>

            <input type='submit' value='Sign up'>
        </form>
    </div>
</div>


