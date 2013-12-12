 <?php foreach($items as $item): ?>
    <img class="img_front" src="/uploads/faucets/<?=$item['img_front']?>" alt="<?=$item['serial_no']?> <?=$item['color']?> front"></a>
    <h1><?=$item['color']?></h1>
    <h2><?=$item['serial_no']?></h2>
    <p>Price: <?=$item['price']?> (USD) </p>
<?php endforeach; ?>
<form method='POST' action='/users/p_contact/<?=$item['serial_no']?>'>
    <!-- Form for users who are logged in --> 
    <?php if($user): ?>
        <h2>To GF Gallery:</h2>
        <h3>Ask questions about price, shipping, artist bio, etc. Or send details about your interest in this work.</h3>
        <textarea name='mail' wrap="hard" cols="100" rows="10" autofocus required></textarea>
        <br><br>
        <p>From <?=$user->name?></p>
        <p><?=$user->email?></p>
    <!-- Form for users who are NOT logged in --> 
    <?php else: ?>
    <h2>To GF Gallery:</h2>
        <h3>Ask questions about price, shipping, artist bio, etc. Or send details about your interest in this work.</h3>
        <textarea name='mail' wrap="hard" cols="100" rows="10" autofocus required></textarea>
        <br><br>
        <p>From</p>
        <input type='text' name='from_name' placeholder='name' required>
        <input type='email' name='from_email' placeholder='email' required><br>
    <?php endif; ?>
	<?php if(isset($error)): ?>
        <div class='error'>
            Did not send. Please double-check your email and name.
        </div>
        <br>
          <?php endif; ?>
    <input type='submit' value='Send'>
</form>