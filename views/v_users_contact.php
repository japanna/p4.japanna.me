 <?php foreach($items as $item): ?>
 <div id="contact_item">
    <div class ="contact_container">
        <form method='POST' action='/users/p_contact/<?=$item['serial_no']?>'>
    <!-- Form for users who are logged in --> 
    <?php if($user): ?>
        <h1>To Glass Faucet Gallery</h1>
        <h2>Questions about price, shipping, artist bio, etc.</h2> 
        <textarea name='mail' wrap="hard" cols="60" rows="10" required></textarea>
        <br><br>
        <p><span>From</span></p>
        <p><?=$user->name?></p>
        <p><?=$user->email?></p>
    <!-- Form for users who are NOT logged in --> 
    <?php else: ?>
        <h1>To Glass Faucet Gallery</h1>
        <h2>Questions about price, shipping, artist bio, etc.</h2> 
        <textarea name='mail' wrap="hard" cols="60" rows="10" required></textarea>
        <br><br>
        <p><span>From</span></p>
        <input type='text' name='from_name' placeholder='name' required>
        <input type='email' name='from_email' placeholder='email' required><br>
    <?php endif; ?>
    <input type='submit' value='Send'>
    <?php if(isset($error)): ?>
        <div class='error'>
            Did not send. Please double-check your email and name.
        </div>
    <?php endif; ?>
    </form>

    </div>
    <div class ="info">
        <a href ="/gallery/item/<?=$item['serial_no']?>.jpg"><img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>.jpg" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
        <h1><?=$item['color']?></h1>
        <h2><?=$item['serial_no']?></h2>
        <p>$<?=$item['price']?> USD </p>
    </div>
<?php endforeach; ?>
</div>
  <script src="/js/item.js"></script>