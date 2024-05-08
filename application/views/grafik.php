  <script src="<?php echo base_url() ?>assets/grafik/Chart.min.js"></script>
            <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Grafik Penjualan</h4>
                        </div>
                    </div>
                </div>
 <!-- end page title end breadcrumb -->
        <div class="row">
          <div class="row">
          <div class="col-lg-12">
           
          </div>
        </div>

          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                <form action="#" id="from1" role="form" class="form-horizontal" data-parsley-validate novalidate>
                 <div class="col-sm-2">
                    <label for="form" class="control-label">Tahun</label>
                     <input type="text" name="cTahun" id="cTahun" placeholder="Masukan Tahun" class="form-control"  style="cursor:pointer" readonly/>
                 </div>

                 <div class="col-sm-4">
                    <label for="form" class="control-label">Barang</label>
                     <input type="hidden" name="cStockID" id="cStockID" placeholder="Masukan" class="form-control"  style="cursor:pointer" readonly/>
                     <input type="text" name="Nama_banrang" id="Nama_banrang" placeholder="Masukan" class="form-control"  style="cursor:pointer" readonly/>
                 </div>

                 <div class="col-sm-2">
                    <label for="form" class="control-label" style="opacity: 0">.</label>
                    <input class="btn btn-info" name="btn_grfk" onclick="Barang()" value="Pilih" readonly>
                 </div>

                <div class="col-lg-2">
                    <label for="form" class="control-label" style="opacity: 0">.</label>
                    <input class="btn btn-info" name="btn_grfk" onclick="datanya()" value="Lihat Grafik" readonly>
                </div>
               
                </form>
              </div>
              <div class="panel-body">
                <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Grafik Penjualan
                                  </header>
                                   <div class="panel-body text-center">
                                      <canvas id="myChart" height="300" width="500"></canvas>
                                  </div>

                              </section>
                </div>
              </div>
            </section>
          </div>
        </div>

<form>
    <input id="test1" name="test1" type="hidden" readonly>
    <input id="test2" name="test2" type="hidden" readonly>
    <input id="test3" name="test3" type="hidden" readonly>
    <input id="test4" name="test4" type="hidden" readonly>
    <input id="test5" name="test5" type="hidden" readonly>
    <input id="test6" name="test6" type="hidden" readonly>
    <input id="test7" name="test7" type="hidden" readonly>
    <input id="test8" name="test8" type="hidden" readonly>
    <input id="test9" name="test9" type="hidden" readonly>
    <input id="test10" name="test10" type="hidden" readonly>
    <input id="test11" name="test11" type="hidden" readonly>
    <input id="test12" name="test12" type="hidden" readonly>    
</form>


<div id="modal_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" style="width:80%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="custom-width-modalLabel">Daftar Barang</h4>
                                        </div>
                                        <div class="modal-body">
                                             <table id="datatable_barang" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode Stock</th>
                                                        <th style="width:190%;">Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                  $no = 1;
                                                  foreach ($list as $value) {
                                                  ?>
                                                  <tr class="isi_tabel Pilih1" id="<?php echo $value->cStockID ?>">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $value->cStockID ?></td>
                                                    <td><?php echo $value->cGoodDesc ?></td>
                                                  </tr>
                                                    
                                                  <?php $no++; } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width:5%;" align="center">No</th>
                                                        <th style="width:30%;">Kode Stock</th>
                                                        <th style="width:190%;">Barang</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



<script>
function datanya(id)
{
    if(cTahun.value =="" || cStockID.value==""){
        alert("Lengkapi data")
        return false;
    }


        $.ajax({
        url : "<?php echo site_url('C_Master/grafik2/')?>/"+cTahun.value+"/"+cStockID.value,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="test1"]').val(data.Jan);
            $('[name="test2"]').val(data.Feb);
            $('[name="test3"]').val(data.Mart);
            $('[name="test4"]').val(data.Apr);
            $('[name="test5"]').val(data.Mei);
            $('[name="test6"]').val(data.Jun);
            $('[name="test7"]').val(data.Jul);
            $('[name="test8"]').val(data.Ags);
            $('[name="test9"]').val(data.Sep);
            $('[name="test10"]').val(data.Okt);
            $('[name="test11"]').val(data.Nov);
            $('[name="test12"]').val(data.Des);
            
            
            
            let test1 = document.getElementById("test1").value;
            let test2 = document.getElementById("test2").value;
            let test3 = document.getElementById("test3").value;
            let test4 = document.getElementById("test4").value;
            let test5 = document.getElementById("test5").value;
            let test6 = document.getElementById("test6").value;
            let test7 = document.getElementById("test7").value;
            let test8 = document.getElementById("test8").value;
            let test9 = document.getElementById("test9").value;
            let test10 = document.getElementById("test10").value;
            let test11 = document.getElementById("test11").value;
            let test12 = document.getElementById("test12").value;
            
            
    //  myChart.data.labels[1] = testName1;

  myChart.data.labels[1] ="Feb";
  myChart.data.labels[2] ="Mar";
  myChart.data.labels[3] ="Apr";
  myChart.data.labels[4] ="Mei";
  myChart.data.labels[5] ="Jun";
  myChart.data.labels[6] ="Jul";
  myChart.data.labels[7] ="Ags";
  myChart.data.labels[8] ="Sep";
  myChart.data.labels[9] ="Okt";
  myChart.data.labels[10] ="Nov";
  myChart.data.labels[11] ="Des";
  // myChart.data.labels[12] ="Des";
  
  
  myChart.data.datasets[0].data[0] = test1;
  myChart.data.datasets[0].data[1] = test2;
  myChart.data.datasets[0].data[2] = test3;
  myChart.data.datasets[0].data[3] = test4;
  myChart.data.datasets[0].data[4] = test5;
  myChart.data.datasets[0].data[5] = test6;
  myChart.data.datasets[0].data[6] = test7;
  myChart.data.datasets[0].data[7] = test8;
  myChart.data.datasets[0].data[8] = test9;
  myChart.data.datasets[0].data[9] = test10;
  myChart.data.datasets[0].data[10] = test11;
  myChart.data.datasets[0].data[11] = test12;
  
            
            myChart.update();
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
    //var url = "<?php echo site_url('C_Master/grafik2/')?>/"+cTahun.value;
    //window.open(url, '_blank');  
}
       
    </script>

  <script type="text/javascript">

    var ctx = document.getElementById("myChart").getContext('2d');


    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jan"],
        datasets: [{
          label: '# Grafik Penjualan Barang',
          data: [test1,test2],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });


function Barang()
{
    $('#modal_barang').modal('show'); // show bootstrap modal
    $('.modal-title').text('Data Barang'); // Set Title to Bootstrap modal title
}



$(document).on('click', '.Pilih1', function (e) {
    document.getElementById("cStockID").value = $(this).attr('id');
    var cells = this.cells; //cells collection
    var Nama_banrang = document.getElementById('Nama_banrang');
    Nama_banrang.value = cells[2].innerHTML;    
    $('#modal_barang').modal('hide');             
    });
  </script>