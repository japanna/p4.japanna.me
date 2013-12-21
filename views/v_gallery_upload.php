<div id="upload">
    <form method='POST' id='upload_form' enctype="multipart/form-data" action='/gallery/p_upload'>
        <h1>Upload new item</h1>
        <div class="upload_col">
            <h2>1. All items</h2>
            <h3>Item type *</h3>
            <select name="item_type" form="upload_form">
              <option value="">select type</option>
              <option value="Spout">Spout</option>
              <option value="Control">Control</option>
              <option value="Bowl">Bowl</option>
            </select>
            <h3>Serial number *</h3>
            <input type='text' name='serial_no' required placeholder='required'>
            <br><br>
            <h3>Color *</h3>
            <input type='text' name='color' required placeholder='required'>
        	<br><br>
            <h3>Overall height (in) *</h3>
            <input type='text' name='overall_height_in' required placeholder='required'>
            <br><br>
            <h3>Price *</h3>
            <input type='text' name='price' required placeholder='required'>
            <br><br>
            <h3>Description *</h3>
            <textarea name='description' wrap="hard" cols="15" rows="3" placeholder='required' required></textarea>
            <br><br>
            <h3>Front image *</h3>
            <h4>Must be jpg-format</h4>
            <input type='file' name='img_front' required><br>
        </div>
        <div class="upload_col">
            <h2>2. Spouts</h2>
            <h3>Spout twist type</h3>
            <select name="spout_type" form="upload_form">
              <option value="">Faucets only</option>
              <option value="single">Single</option>
              <option value="double">Double</option>
            </select>
            <br><br>
            <h3>Opacity</h3>
            <select name="opacity" form="upload_form">
              <option value="">Faucets only</option>
              <option value="Transparent">Transparent</option>
              <option value="Opaque">Opaque</option>
            </select>
            <br><br>
            <h3>Spout height (in)</h3>
                <input type='text' name='spout_height_in' placeholder='spouts only'>
                <br><br>
            <h3>Projection (in)</h3>
            <input type='text' name='projection_in' placeholder='spouts only'>
            <br><br>
            <h3>Side image</h3>
            <h4>Must be jpg-format</h4>
            <input type='file' name='img_side'><br>
            <br><br>
        </div>
        <div class="upload_col">
            <h2>3. Bowls</h2>
            <h3>Major diameter (in)</h3>
            <input type='text' name='major_diameter_in' placeholder='bowls only'>
            <br><br>
            <h3>Minor diameter (in)</h3>
            <input type='text' name='minor_diameter_in' placeholder='bowls only'>
            <br><br>
        </div>
        <div class="upload_col">
            <h2>4. Controls</h2>
            <h3>Hardware finish</h3>
            <select name="hardware_finish" form="upload_form">
              <option value="">controls only</option>
              <option value="Chrome">Chrome</option>
              <option value="Polished Chrome">Polished Chrome</option>
              <option value="Brass">Brass</option>
              <option value="Satin Nickel">Satin Nickel</option>
            </select>
        </div>
        <br><br>
        <input id="upload_submit" type='submit' value='Upload item'>
    </form>
</div>
<script src="/js/upload.js"></script>