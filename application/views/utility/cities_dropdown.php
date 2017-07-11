
                                        <label for="model">City:</label>
                                        <select id="c1" name="city" class="populate e9" data-live-search="true"
                                                        style="width:300px" >
<?php
if($cities){

            foreach($cities as $city) {
                ?>
                                            
               <option value="<?php echo $city->city_id ;?>"> <?php echo $city->city_name; ?></option>
               
   <?php            
            }
        }

?>

                                            
                                                </select>
                          