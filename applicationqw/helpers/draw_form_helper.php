<?php
/*
  if (!function_exists('drawform')) {

  function drawform($feilds_array, $input_cols = false, $option = array()) {
  $return = '';
  foreach ($feilds_array as $feild):
  $return .= '<div class="form-group">
  <label class="col-md-3 control-label">' . (isset($feild['label']) ? $feild['label'] : '') . '</label>
  <div class="col-md-' . ($input_cols ? $input_cols : "9") . '">';
  if (isset($feild['note'])) {
  if (isset($feild['note_position']) && $feild['note_position'] == 0) {
  $return .= $feild['note'];
  }
  }

  if ($feild['type'] == "form_dropdown") {
  $return .= $feild['type']($feild['name'], $feild['options']['lists'], $feild['options']['def'], $feild['attribute']);
  } elseif ($feild['type'] == "form_label") {
  if (isset($feild['attribute'])) {
  $return .= $feild['type']($feild['value'], '', $feild['attribute']);
  } else {
  $return .= $feild['type']($feild['value']);
  }
  } else {
  $return .= $feild['type']($feild['attribute']);
  }

  //            if (isset($feild['note']) && isset($feild['note_position']) && $feild['note_position'] == 1) {
  //                $return .= $feild['note'];
  //                _pr($feild);
  //            }

  if (isset($feild['html'])) {
  $return .= $feild['html'];
  }
  $return .='
  </div>
  </div>';
  endforeach;
  return $return;
  }

  }
 * 
 */

if (!function_exists('drawform')) {

    function drawform($feilds_array, $lbl_cols, $input_cols, $option = array()) {
        foreach ($feilds_array as $feild):
            ?>

                                    
                                    
            <div class="row">
                <?php if ($lbl_cols) { ?>
                    <div class="col-sm-<?php echo $lbl_cols; ?>" style="margin:5px"> <label class="label" ><?php echo $feild['label'];?></label> </div>
                <?php } ?>
                <div class="form-group col-md-<?php echo $input_cols; ?>" style="margin:5px">
                    
                    <?php
                    if ($feild['type'] == "form_dropdown") {
                        echo $feild['type']($feild['name'], $feild['options']['lists'], $feild['options']['def'], $feild['attribute']);
                    } elseif ($feild['type'] == "form_label") {
                        $feild['for'] = (isset($feild['for']) ? $feild['for'] : '');
                        $feild['attribute'] = (isset($feild['attribute']) ? $feild['attribute'] : '');
                        echo $feild['type']($feild['value'], $feild['for'], $feild['attribute']);
                    } else {
                        
                            if(isset($feild['attribute']['type']) &&$feild['attribute']['type'] == "radio"){?>
                                <div class="radio-inline"  style="padding-top: 0px;">
                                    <label><?php echo $feild['type']($feild['attribute']); echo $feild['attribute']['label'];?></label>
                                </div>
                                <div class="radio-inline"  style="padding-top: 0px;">
                                    <label><?php echo $feild['outer_html'];?></label>
                                </div>
                            <?php
                            }
                            else{
                                echo $feild['type']($feild['attribute']);
                            }
                    }
                    if (isset($feild['helping_note'])) {
                        ?>
                        <p class="help-block"><?php echo $feild['helping_note'] ?></p>
                    <?php } 
                    if(isset($feild['outer_html']) && isset($feild['attribute']['type']) &&$feild['attribute']['type'] != "radio" ){
                            
                            echo '</div><div class="form-group col-sm-'.$input_cols.'" style="margin:5px">';
                            echo ($feild['outer_html']);
                    }?>
                     
                </div>
            </div>
            <?php
        endforeach;
    }

}