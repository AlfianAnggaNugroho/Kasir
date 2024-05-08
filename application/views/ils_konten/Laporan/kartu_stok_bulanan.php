 <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"></h2>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                        <!-- sssssss -->
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center ">
                        <div class="customize-input float-right ">
                             <button class="custom-select custom-select-set form-control bg-info border-0 custom-shadow custom-radius" style="color: #fff"> <i class="fa fa-info-circle"></i> <?php echo $info2; ?></button>
                        </div>
                    </div>
                </div>
            </div>
<hr>
 <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="row">
          <div class="col-lg-12">
           
          </div>
        </div>
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                 <form method="post" action="<?php echo site_url('C_Laporan/kartu_stok_bulanan');?>" target="_blank">
                                        <div style="color:#FB0509">
                                <?php echo $info;?>
                              </div><br>

                        <table class="table">
                                <tr>
                                     <td align="Right">Bulan</td>
                                     <td><select name="cMT" id="cMT" onchange="changeValue(this)" style="width:100%; cursor:pointer">
                            <option value="" selected="SELECTED">- Pilih -</option>
                            <option value="01" <?php echo set_select('cMT', "01"); ?>>Januari</option>
                            <option value="02" <?php echo set_select('cMT', "02"); ?>>Februari</option>
                            <option value="03" <?php echo set_select('cMT', "03"); ?>>Maret</option>
                            <option value="04" <?php echo set_select('cMT', "04"); ?>>April</option>
                            <option value="05" <?php echo set_select('cMT', "05"); ?>>Mei</option>
                            <option value="06" <?php echo set_select('cMT', "06"); ?>>Juni</option>
                            <option value="07" <?php echo set_select('cMT', "07"); ?>>Juli</option>
                            <option value="08" <?php echo set_select('cMT', "08"); ?>>Agustus</option>
                            <option value="09" <?php echo set_select('cMT', "09"); ?>>September</option>
                            <option value="10" <?php echo set_select('cMT', "10"); ?>>Oktober</option>
                            <option value="11" <?php echo set_select('cMT', "11"); ?>>Nopember</option>
                            <option value="12" <?php echo set_select('cMT', "12"); ?>>Desember</option>
                        </select></td>
                        <td align="Right">Tahun</td>
                        <td><input type="text" placeholder="Masukan Tahun" name="txt_tahun" id="cTahun" value="" style="cursor:pointer" readonly></td>
                                </tr>
                            <tr>
                                <td align="Right"> Kode Barang</td>
                                <td> <input type="text" placeholder="" id="Kd1" name="Kd1" value="" maxlength="12" readonly> </td>
                                <td align="Right">Nama Barang</td>
                                <td>  <input type="text" placeholder="" id="Desc1" name="Desc1" value="" style="width:400px" readonly> <input type="button" data-toggle="modal" data-target="#Modal" value="Pilih" class="btn-primary btn-md"></td>



                            </tr>

                            <tr>
                                    <td align="Ceter" colspan="4"><input name="cetak" type="submit" value="Cetak Rata - Rata Bergerak Barang" class="btn btn-success col-sm-12"></td>
                                    <!-- <td><input name="export" type="submit" value="Export Ke Excel" class="btn btn-warning"></td> -->


                            </tr>
                                                                           
                                     
                                </table>                                
                                    </form>

              </div>
            </section>
          </div>
        </div>



         <!-- Bootstrap modal -->
                


<!-- Bootstrap modal -->
                    <div class="modal fade" id="Modal"  tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Data Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>

                        <div class="modal-body form">
                           <table id="datatable_barang" class="table table-striped table-bordered">
                                               <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                              </tr>
                            </thead>
                                <tbody>
                                     <?php 
                                                        $no = 1;
                                                        foreach($list3 as $value){ ?>
                                                        <tr class="isi_tabel Pilih3" id="<?php echo $value->cGoodID ?>">
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $value->cGoodID ?></td>
                                                            <td><?php echo $value->cGoodDesc ?></td>
                                                            <td><?php echo $value->cUnit ?></td>
                                                            
                                                        </tr>
                                                        <?php 
                                                        $no += 1;
                                                        } ?>
                                </tbody>
                            </table>

                        </div>
                            
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- End Bootstrap modal -->
        
    
<script type="text/javascript">
$(document).ready(function() {

$('#datatable_Siswa').DataTable({ 
        "paging": true,
        });

$('#datatable_barang').DataTable({ 
        "paging": true,
        });
});

function Siswa()
{
    $('#modal_Siswa').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Siswa'); // Set Title to Bootstrap modal title
}

function Siswa2()
{
    $('#modal_Siswa2').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Siswa'); // Set Title to Bootstrap modal title
}

$(document).on('click', '.pilih', function (e) {
    document.getElementById("cSisID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cName_Siswa = document.getElementById('cName_Siswa');
    cName_Siswa.value = cells[2].innerHTML;    
    $('#modal_Siswa').modal('hide');             
    });

$(document).on('click', '.pilih2', function (e) {
    document.getElementById("cSisID2").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cName_Siswa2 = document.getElementById('cName_Siswa2');
    cName_Siswa2.value = cells[2].innerHTML;    
    $('#modal_Siswa2').modal('hide');             
    });
</script>


<script type="text/javascript">
    
  function cetak(){

    var Date1 = dDisplay1.value.split(" ").join("_");
    var Date2 = dDisplay2.value.split(" ").join("_");

   if(dDisplay1.value =="" || dDisplay2.value ==""){
      alert("Lengkapi data");
   }
   else{
     var URL = "<?php echo site_url('C_Laporan/Laporan_penjualan')?>/"+Date1+"/"+Date2;
     window.open(URL, '_blank');
   }
}


$(document).on('click', '.Pilih3', function (e) {
    document.getElementById("Kd1").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var Desc1 = document.getElementById('Desc1');
    Desc1.value = cells[2].innerHTML;
    // cUnit.value = cells[3].innerHTML;
  
    $('#Modal').modal('hide');             
    });


</script>

<script>
$("#datepicker").datepicker( {
    format: " yyyy",
    viewMode: "years", 
    minViewMode: "years"
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
</script>