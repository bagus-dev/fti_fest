<option value="0">Pilih Kota / Kabupaten</option>
<?php
    foreach($kota_kab as $k){
?>
<option value="<?php echo $k->id_kota; ?>"><?php echo $k->kota; ?></option>
<?php } ?>