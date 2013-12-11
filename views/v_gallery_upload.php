<form method='POST'  enctype="multipart/form-data" action='/gallery/p_upload'>
<h1> Upload new item</h1>
    Serial number<br>
    <input type='text' name='serial_no'>
    <br><br>
    Color<br>
    <input type='text' name='color'>
	<br><br>
    Overall height (in)<br>
    <input type='text' name='overall_height_in'>
    <br><br>
    Spout height (in)<br>
    <input type='text' name='spout_height_in'>
    <br><br>
    Projection (in)<br>
    <input type='text' name='projection_in'>
    <br><br>
    Price<br>
    <input type='text' name='price'><br>
    <br><br>
    Description<br>
    <textarea name='description' wrap="hard" cols="45" rows="5" placeholder='Describe the faucet' autofocus required></textarea>
    <br><br>
    Frontal image<br>
    <input type='file' name='img_front'><br>
    <br><br>
    Side image<br>
    <input type='file' name='img_side'><br>
    <br><br>
    <input type='submit' value='Upload item'>

</form>