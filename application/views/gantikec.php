<option value="0">Pilih Kecamatan</option>
<?php
    foreach($kecamatan as $k){
?>
<option value="<?php echo $k->id_kecamatan; ?>"><?php echo $k->kecamatan; ?></option>
<?php } ?>