<form method='POST' id='upload_form' enctype="multipart/form-data" action='/gallery/p_upload'>
<h1> Upload new item</h1>
    Serial number *<br>
    <input type='text' name='serial_no' required placeholder='required for all items' autofocus >
    <br><br>
    Color *<br>
    <input type='text' name='color' required placeholder='required for all items'>
	<br><br>
    Overall height (in) *<br>
    <input type='text' name='overall_height_in' required placeholder='required for all items'>
    <br><br>
    Spout height (in)<br>
    <input type='text' name='spout_height_in' placeholder='spouts only'>
    <br><br>
    Projection (in)<br>
    <input type='text' name='projection_in' placeholder='spouts only'>
    <br><br>
    Price *<br>
    <input type='text' name='price' required placeholder='required for all items'>
    <br><br>
    Major diameter (in)<br>
    <input type='text' name='major_diameter_in' placeholder='bowls only'>
    <br><br>
    Minor diameter (in)<br>
    <input type='text' name='minor_diameter_in' placeholder='bowls only'>
    <br><br>
    Hardware finish<br>
    <select name="hardware_finish" form="upload_form">
      <option value="">controls only</option>
      <option value="Chrome">Chrome</option>
      <option value="Polished Chrome">Polished Chrome</option>
      <option value="Brass">Brass</option>
      <option value="Satin Nickel">Satin Nickel</option>
    </select>
    <br><br>
    Description *<br>
    <textarea name='description' wrap="hard" cols="45" rows="5" placeholder='item description' required></textarea>
    <br><br>
    Frontal image *<br>
    <input type='file' name='img_front' required><br>
    <br><br>
    Side image<br>
    <input type='file' name='img_side'><br>
    <br><br>
    <input type='submit' value='Upload item'>

</form>