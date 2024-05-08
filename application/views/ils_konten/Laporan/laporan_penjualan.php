
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
                             <button class="custom-select custom-select-set form-control bg-info border-0 custom-shadow custom-radius" style="color: #fff"> <i class="fa fa-info-circle"></i> <?php echo $info; ?></button>
                        </div>
                    </div>
                </div>
            </div>
<hr>
        <div class="row">
          <div class="row">
          <div class="col-lg-12">
           
          </div>
        </div>
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                <form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>
                <div class="row">
                <div class="col-sm-5">
                    <label for="form" class="control-label">Tanggal</label>
                    <input type="text" name="dDisplay1" id="dDisplay1" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer"/>
                </div>
                <div class="col-sm-2">
                    <label for="form" class="control-label" style="opacity: 0;">.</label>
                    <input type="text" align="center"  class="form-control" name="" readonly="" value="S/D" style="text-align: center;border: 0">
                </div>
                                            
                <div  class="col-sm-5">
                    <label for="form" class="control-label">Tanggal</label>
                    <input type="text" name="dDisplay2" id="dDisplay2" placeholder="Masukan Tanggal" class="form-control input"  style="cursor:pointer"/>
                </div>
                 </div>
                <br>
              <div class="row">
                                            <div class="col-md-3">
                                            <label class="control-label">Kode</label>
                                                <input type="text" class="form-control" name="cGoodID" id="cGoodID" placeholder="Kode" readonly >
                                            </div>

                                            <div class="col-sm-6">
                                            <label>Nama Barang</label>
                                                <input type="text" class="form-control" name="cGoodDesc" id="cGoodDesc" placeholder="Nama Barang" readonly >
                                            </div>
                                            <div class="col-sm-2">
                                            <label>Satuan</label>
                                                <input type="text" class="form-control" name="cUnit" id="cUnit" placeholder="Satuan" readonly>
                                            </div>

                                            

                                            <div class="col-sm-1 ">
                                                <label style="opacity: 0">.</label>
                                                <input type="button" class="form-control btn btn-success" value="..." onclick="Barang();">
                                            </div>
              </div>
              <div class="row">
                 <div  class="col-sm-6">                                  
                    <label style="opacity: 0">.</label>                                                 
                    <!-- <a class="form-control btn btn-info btn-md" id="btnSave" onclick="cetak()">Cetak</a> -->
                    <button type="button" class="btn btn-success waves-effect form-control" onclick="cetak()"> <i class="fa fa-print"></i> Cetak Laporan Pengeluaran
                                    </button>
                </div>

                <div  class="col-sm-6">                                  
                    <label style="opacity: 0">.</label>                                                 
                    <!-- <a class="form-control btn btn-info btn-md" id="btnSave" onclick="cetak()">Cetak</a> -->
                    <button type="button" class="btn btn-warning waves-effect form-control" onclick="cetak2()"> <i class="fa fa-print"></i> Cetak Laporan Pengeluaran/Barang
                                    </button>
                </div>

                </div>


                </form>

              </div>
            </section>
          </div>
        </div>

    




                        <!-- Bootstrap modal -->
                    <div class="modal fade glass" id="modal_barang" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                        <div class="modal-body">
                                             <table id="datatable_barang" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode</th>
                                                        <th style="width:190%;">Barang</th>
                                                        <th style="width:30%;">Satuan</th> 
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
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode</th>
                                                        <th style="width:190%;">Barang</th> 
                                                        <th style="width:30%;">Satuan</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

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

function Barang()
{
    $('#modal_barang').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Barang'); // Set Title to Bootstrap modal title
}

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


  function cetak2(){

    var Date1 = dDisplay1.value.split(" ").join("_");
    var Date2 = dDisplay2.value.split(" ").join("_");

   if(dDisplay1.value =="" || dDisplay2.value =="" || cGoodID.value == ""){
      alert("Lengkapi data");
   }
   else{
     var URL = "<?php echo site_url('C_Laporan/Laporan_penjualan2')?>/"+Date1+"/"+Date2+"/"+cGoodID.value;
     window.open(URL, '_blank');
   }
}




$(document).on('click', '.Pilih3', function (e) {
    document.getElementById("cGoodID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var cGoodDesc = document.getElementById('cGoodDesc');
    cGoodDesc.value = cells[2].innerHTML;
    cUnit.value = cells[3].innerHTML;
    $('#modal_barang').modal('hide');             
    });


</script>