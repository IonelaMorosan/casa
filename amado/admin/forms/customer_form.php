<fieldset>
    <div class="form-group">
        <label for="f_name">Listing Name *</label>
          <input type="text" name="listing_name" value="<?php echo htmlspecialchars($edit ? $customer['listing_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Listing Name" class="form-control" required="required" id = "f_name" >
    </div> 

    <div class="form-group">
        <label for="l_name">Price *</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($edit ? $customer['price'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Price" class="form-control" required="required" id="l_name">
    </div> 


    <div class="form-group">
        <label for="l_color">Color *</label>
        <input type="text" name="color" value="<?php echo htmlspecialchars($edit ? $customer['color'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Color" class="form-control" required="required" id="l_color">
    </div> 
    
    <div class="form-group">
        <label>Category *</label>
            <?php $opt_arr = array("Chairs", "Beds", "Accesories"); ?>

            <select name="category" class="form-control selectpicker" required>
                <option value=" " >Please select your category</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['category']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>
    <div class="form-group">
        <label>Brand *</label>
            <?php $opt_arr = array("Amado", "Ikea", "Furniture Inc"); ?>

            <select name="brand" class="form-control selectpicker" required>
                <option value=" " >Please select your brand</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['brand']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>
    <div class="form-group">
        <label for="image" >Image *</label>
        <input type="file" name="listing_image" id="image">
    </div>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>
