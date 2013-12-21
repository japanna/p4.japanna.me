<script src="/js/login.js"></script>
    <div id="contact_item">
        <div class="contact_container">
            <form method='POST' action='/users/p_login'>
                 <h1>log in</h1>
                 <h2>Logging in allows you to save favorite items.</h2>
                 <h2>Your prvacy is very important. You will not receive emails from us unless you contact us first.</h2> 
                    
                <p><span>email</span></p>    
                <input type='email' name='email' required>

                <p><span>password</span></p>  
                <input type='password' name='password' required>
            	<br><br>

            	<?php if(isset($error)): ?>
                    <div class='error'>
                        Login failed. Please double check your email and password.
                    </div>
                    <br>
                <?php endif; ?>

                <input type='submit' value='Log in'>
            </form>
        </div>
    </div>