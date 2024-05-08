<?php 
foreach($list as $value){ 
// if($value->cEmailID == $this->session->userdata('username')){
 // $username = $value->cBranchDesc;
 $name = $value->cBranchDesc;
 $nohp = $value->cHP;
 $notlp = $value->cPhone;
 $alamat = $value->cBranchADDR;
 $desc = $value->cDesc;
 $map = $value->cMap;
// }
}
 ?>
 
<?php 
           $user =$this->session->userdata('cUserGrpID');
                if($user == "04"){
                   $st = "d-none";
                   }else{
                   $st ="";
                   }
    ?>

<!-- =============================================================================================== -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url()?>/assets/foto/03.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url()?>/assets/foto/b01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url()?>/assets/foto/b02.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <!-- <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev"> -->
    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
    <!-- <span class="sr-only">Previous</span> -->
  <!-- </button> -->
  <!-- <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next"> -->
    <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
    <!-- <span class="sr-only">Next</span> -->
  <!-- </button> -->
</div>
<hr>
<!-- ================================================================================================ -->
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">
            
            <div class="alert alert-warning" role="alert">
              <h1>STOK BARANG DALAM LIMIT SILAHKAN ORDER!!</h1>
            </div>
              <table id="table" class="table table-striped table-bordered display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th align="center">No</th>
                                                    <!-- <th>Tgl Stock</th> -->
                                                    <th>Kode Barang</th>
                                                    <th>Nama</th>
                                                    <th>Qty/Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $no =1; foreach ($list3 as $value): ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $value->cGoodID ?></td>
                                                    <td><?php echo $value->cGoodDesc ?></td>
                                                    <td><?php echo $value->nCurQty ?></td>
                                                   
                                                    
                                                </tr>
                                              <?php endforeach ?>
                                            </tbody>
                                            
                                            </table>
          </div>
      </div>
  </div>
</div>

        <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <?php foreach ($list2 as $value) { ?>
                <div class="card-group" >
                    <div class="card border-right" style="background-image: radial-gradient( circle 311px at 8.6% 27.9%,  rgba(62,147,252,0.57) 12.9%, rgba(239,183,192,0.44) 91.2% );">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $value->data_user ?></h2>
                                        <!-- <span -->
                                            <!-- class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                                    </div>
                                    <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Data User</h6>
                                    <a href="<?php echo site_url('C_Master/user/');?>" class="small-box-footer <?php echo $st; ?>" style="color: #000;">Lihat <i class="fas fa-arrow-circle-right" style="color: #000;"></i></a>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right" style="background-image: radial-gradient( circle 311px at 8.6% 27.9%,  rgba(62,147,252,0.57) 12.9%, rgba(239,183,192,0.44) 91.2% );">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php echo $value->data_barang ?></h2>
                                    <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Data Barang
                                    </h6>
                                    <a href="<?php echo site_url('C_Master/barang/');?>" class="small-box-footer <?php echo $st; ?>" style="color: #000;">Lihat <i class="fas fa-arrow-circle-right" style="color: #000;"></i></a>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark" style="color: #000;"><i data-feather="box"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right" style="background-image: radial-gradient( circle 311px at 8.6% 27.9%,  rgba(62,147,252,0.57) 12.9%, rgba(239,183,192,0.44) 91.2% );">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $value->data_pemasukan ?></h2>
                                       
                                    </div>
                                    <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate">Transaksi Pembelian</h6>
                                    <a href="<?php echo site_url('C_Transaksi/');?>" class="small-box-footer <?php echo $st; ?>" style="color: #000;">Lihat <i class="fas fa-arrow-circle-right" style="color: #000;"></i></a>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i data-feather="file-plus" style="color: #000;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="background-image: radial-gradient( circle 311px at 8.6% 27.9%,  rgba(62,147,252,0.57) 12.9%, rgba(239,183,192,0.44) 91.2% );">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium" style="color: #000;"><?php echo $value->data_pengeluaran ?></h2>
                                    <h6 class="text-dark font-weight-normal mb-0 w-100 text-truncate" style="color: #000;">Transaksi Penjualan</h6>
                                    <a href="<?php echo site_url('C_Transaksi/BKB');?>" class="small-box-footer <?php echo $st; ?>" style="color: #000;">Lihat <i class="fas fa-arrow-circle-right" style="color: #000;"></i></a>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- *************************************************************** -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 d-none">
           

            <!-- DONUT CHART -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Grafik Area Transaksi <?php echo date('Y') ?></h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Grafik Batang Transaksi <?php echo date('Y') ?></h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

  

          </div>
          <!-- /.col (RIGHT) -->

          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   



<!-- Modal Pop-up -->
<div class="modal fade glass" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selamat datang!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Selamat datang di sistem kami. Terima kasih telah bergabung!
            </div>
        </div>
    </div>
</div>

<!-- ChartJS -->
<script src="<?php echo base_url('assets/template3')?>/plugins/chart.js/Chart.min.js"></script>

<style type="text/css">


@keyframes smoothShow {
  0% {
    opacity: 0;
    transform: translateY(-50px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}


@keyframes flipIn {
  0% {
    transform: perspective(400px) rotateY(90deg);
    opacity: 0;
  }
  100% {
    transform: perspective(400px) rotateY(0deg);
    opacity: 1;
  }
}

/* Animasi flip dengan waktu tunda */
.modal.flip .modal-dialog {
  animation: flipIn 0.5s ease-in-out 0.5s;
}

</style>

<!--  Tampilkan modal saat halaman dimuat --> 
<!-- Tampilkan modal saat halaman dimuat -->
<script>
    $(document).ready(function(){
        // Tambahkan kelas .flip ke modal
        $('#popupModal').addClass('flip');

        // Tampilkan modal setelah waktu tunda (misalnya, 1 detik)
        setTimeout(function() {
            $('#popupModal').modal('show');
        }, 1200); // Waktu tunda dalam milidetik (1000ms = 1 detik)
    });
</script>

<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'June', 'July','Agt','Sep','Okt','Nov','Des'],
      datasets: [
        {
          label               : 'Penjualan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : ["<?php echo $penjualan['jan'] ?>","<?php echo $penjualan['feb'] ?>","<?php echo $penjualan['mar'] ?>","<?php echo $penjualan['apr'] ?>","<?php echo $penjualan['mei'] ?>","<?php echo $penjualan['juni'] ?>","<?php echo $penjualan['juli'] ?>","<?php echo $penjualan['agt'] ?>","<?php echo $penjualan['sep'] ?>","<?php echo $penjualan['okt'] ?>","<?php echo $penjualan['nov'] ?>","<?php echo $penjualan['des'] ?>"]
        },
        {
          label               : 'Pembelian',
          backgroundColor     : 'rgba(248, 255, 0 )',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : ["<?php echo $pembelian['jan'] ?>","<?php echo $pembelian['feb'] ?>","<?php echo $pembelian['mar'] ?>","<?php echo $pembelian['apr'] ?>","<?php echo $pembelian['mei'] ?>","<?php echo $pembelian['juni'] ?>","<?php echo $pembelian['juli'] ?>","<?php echo $pembelian['agt'] ?>","<?php echo $pembelian['sep'] ?>","<?php echo $pembelian['okt'] ?>","<?php echo $pembelian['nov'] ?>","<?php echo $pembelian['des'] ?>"]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : true,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

 

     // Get context with jQuery - using jQuery's .get() method.
    //-------------
    //- AREA CHART -
    //-------------
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
 
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


// =================================================
  })
</script>