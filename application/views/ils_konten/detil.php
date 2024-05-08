<style type="text/css">
fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style untuk rating star *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS untuk hover nya *****/

.rating > input:checked ~ label, /* memperlihatkan warna emas pada saat di klik */
.rating:not(:checked) > label:hover, /* hover untuk star berikutnya */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover untuk star sebelumnya  */

.rating > input:checked + label:hover, /* hover ketika mengganti rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* seleksi hover */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

</style>
<form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>

            <?php foreach ($list as $value) {
                    if($value->cStockID == $cStockID){
                  ?>
            <input type="hidden" name="cStockID" value="<?php echo $value->cStockID ?>">
            <input type="hidden" name="nSale" value="<?php echo $value->nSale ?>">
            <input type="hidden" name="nHpp" value="<?php echo $value->nHpp ?>">
            <input type="hidden" name="stock" id="stock" value="<?php echo $value->nCurQty ?>">
            
             

             <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-6 col-md-4">
                                    <div class="text-center card-box">
                                        <div class="member-card">
                                           
                                                <img src="<?php echo base_url('upload/produk/'.$value->cFoto)?>" class="img-thumbnail" alt="profile-image">
                                                
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-sm-6">
                                        <div class="text-center card-box">
                                                <label style="font-size: 18px"><?php echo $value->cGoodDesc ?></label> <br>
                                                <label style="font-size: 30px"><?php echo "Rp. ".number_format($value->nSale,0,',','.')?></label> <span><label style="color: red"><?php echo " Stock(".$value->nCurQty.")"?></label></span><br>
                                                <div align="left" style="font-size: 16px">
                                                <label>Keterangan</label>
                                                </div>
                                                <p><?php echo $value->cDesc?></p>

                                               <div class="row">
                                                    <div class="col-md-3">
                                                        <input id="demo0" class="col-sm-3" type="text" value="0" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default"/>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <select name="cSizeID" id="cSizeID" class="form-control">
                                                            <?php foreach ($list2 as $value){?>
                                                                <option value="<?php echo  $value->cSizeID ?>"><?php echo  $value->cSize ?></option>
                                                                
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                     <div class="col-md-3">
                                                        <input class="btn btn-lg btn-info" name="" value="Masukan Ke keranjang" style="cursor: pointer;" onclick="save();">
                                                     </div>
                                                </div>


                                                
                                            </div>
                                        </div>
                                      </div>


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-bo">
                                                    <div class="form-group">
                                                        <div class="col-sm-1">
                                                            <label>Ranting</label>
                                                        </div>
<?php 
$rate = 0;
foreach ($list3 as $value) {
    if($value->cUserID == $this->session->userdata('username') && $value->cStockID==$cStockID){
        $rate = $value->cRanting;
    }
} ?>
<div class="col-sm-2">                                  
<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" <?php echo ($rate=='5')?'checked':'' ?>/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" <?php echo ($rate=='4')?'checked':'' ?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" <?php echo ($rate=='3')?'checked':'' ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" <?php echo ($rate=='2')?'checked':'' ?>/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" <?php echo ($rate=='1')?'checked':'' ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
</fieldset>
</div>
                                                        <div class="col-sm-1">
                                                            <input class="btn btn-warning" name="" value="Beri Ranting" onclick="ranting()">
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <textarea class="form-control" placeholder="Ulasan Anda" name="cDesc"></textarea>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <div class="col-sm-3">
                                                            <input class="btn btn-info" name="" value="Beri Ulasan" onclick="ulasan()">
                                                        </div>
                                                    </div>





                            <div class="card-box">
                                <div class="m-t-50 blog-post-comment">
                                    <h4 class="text-uppercase">Ulasan <small></small></h4>
                                    <div class="border m-b-20"></div>

                                    <ul class="media-list">
                                        <?php foreach ($list4 as $value) {
                                            if($value->cStockID == $cStockID){
                                           ?>
                                        <li class="media">
                                            <div class="media-body">
                                                <h5 class="media-heading"><?php echo $value->cName ?></h5>
                                                <h6 class="text-muted"><?php echo date("d M Y H:i:s",strtotime($value->dTgl))?></h6>
                                                <p><?php echo $value->cDesc ?></p>
                                            </div>
                                        </li>
                                        <?php } }?>
                                    </ul>

                                </div>
                                </div>
                                <!-- end m-t-50 -->



                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                    <?php } }?>
</form>

<script type="text/javascript">
function save()
{
    if(demo0.value == "0"){
        alert("Qty tidak boleh 0");
        return false
    }
    var qty = parseFloat(demo0.value.split(".").join("").split(",").join("."));
    var stok = parseFloat(stock.value.split(".").join("").split(",").join("."));
    if(qty>stok){
        alert("Stock Tidak Cukup!!");
        return false;
    }

    $.ajax({
        url : "<?php echo site_url('C_Home/add_keranjang/')?>",
        type: "POST",
        data: $('#from1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            alert('Barang Masuk Ke Keranjang SilahKan Cek');
            location.reload();
            Sukses_simpan();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Cek Kembali Keranjang Anda');
        }
    });
}


function ranting()
{
    $.ajax({
        url : "<?php echo site_url('C_Home/add_ranting/')?>",
        type: "POST",
        data: $('#from1').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            Sukses();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error getting data from ajax');
        }
    });
}


function ulasan()
{
    $.ajax({
        url : "<?php echo site_url('C_Home/add_ulasan/')?>",
        type: "POST",
        data: $('#from1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            location.reload();
            Sukses();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error getting data from ajax');
        }
    });
}

</script>