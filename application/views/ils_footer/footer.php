    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                Universitas Teknokrat Indonesia
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/layout')?>/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="<?php echo base_url('assets/layout')?>/dist/js/app-style-switcher.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/dist/js/feather.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/layout')?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="<?php echo base_url('assets/layout')?>/extra-libs/c3/d3.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/extra-libs/c3/c3.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url('assets/layout')?>/dist/js/pages/dashboards/dashboard1.min.js"></script>




 <!-- ================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables4')?>/datatables.min.css"/> 
<script type="text/javascript" src="<?php echo base_url('assets/datatables4')?>/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables4')?>/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables4')?>/datatables.min.js"></script>
        <!-- init -->
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.datatables.init.js') ?>"></script>


          <!-- Toastr js -->
        <script src="<?php echo base_url('assets/template1/plugins/toastr/toastr.min.js')?>"></script>
        <!-- Toastr init js (Demo)-->
        <script src="<?php echo base_url('assets/template1/assets/pages/jquery.toastr.js')?>"></script>

        <script src="<?php echo base_url('assets/template1/plugins/fullcalendar/bootstrap-datepicker.js')?>"></script>

</body>

</html>




    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
          


         <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
            $.fn.dataTable.ext.errMode = 'none';
        </script>


        
 <!-- Notifikasi Script -->
        <script>
            $(document).ready(function() {
                  if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });
             
            function notifikasi() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/Tick_Mark_Dark-512.png'); ?>',
                        body: "Data Berhasil Disimpan!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };
        </script>

        <!-- GAGALDISIMPAN -->
         <script>
           // $(document).ready(function() {
               //   if (Notification.permission !== "granted")
             //       Notification.requestPermission();
            //});
             
            function notifikasi_gagal() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/windows-update-error.png'); ?>',
                        body: "Data Gagal Disimpan!!! (Silahkan Cek!!!) ",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };

            function error() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/windows-update-error.png'); ?>',
                        body: "Error!!, Data Gagal Diperbaharui!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };

            function Lengkapi_Data() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/warning.jpg'); ?>',
                        body: "Mohon Lengkapi Data!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };

             function sukses() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/Tick_Mark_Dark-512.png'); ?>',
                        body: "Sukses!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 1000);
                }
            };


            function alert_hapus() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/Tick_Mark_Dark-512.png'); ?>',
                        body: "Data Berhasil Dihapus!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };

            function alert_login() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Pemberitahuan', {
                        icon: '<?php echo site_url('assets/img/Tick_Mark_Dark-512.png'); ?>',
                        body: "Anda Berhasil Login!!!",
                    });
                    notifikasi.onclick = function () {
                       // window.open("http://erllang.ga");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };

function Sukses_simpan(){
Command: toastr["success"]("Data Sukses Disimpan", "Pemberitahuan!!!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "30",
  "hideDuration": "500",
  "timeOut": "1500",
  "extendedTimeOut": "10",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}

function Sukses_Hapus(){
Command: toastr["success"]("Data Sukses Dihapus", "Pemberitahuan!!!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "30",
  "hideDuration": "500",
  "timeOut": "1500",
  "extendedTimeOut": "10",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}

function error2(){
Command: toastr["error"]("Silahkan Cek Kembali", "Data Gagal di Perbaharui!!!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "30",
  "hideDuration": "500",
  "timeOut": "2000",
  "extendedTimeOut": "10",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}

function error_tidak_ada(){
Command: toastr["error"]("Silahkan Cek Kembali", "Data Material Tidak Ada!!!")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "30",
  "hideDuration": "500",
  "timeOut": "2000",
  "extendedTimeOut": "10",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}

function error_Detil(){
Command: toastr["error"]("Silahkan Cek Kembali", "Cek Data Transaksi")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "30",
  "hideDuration": "500",
  "timeOut": "2000",
  "extendedTimeOut": "10",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}

function kosong(){
Command: toastr["error"]("Silahkan Cek Kembali", "Tidak Boleh Kosong")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "30",
  "hideDuration": "500",
  "timeOut": "2000",
  "extendedTimeOut": "10",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
}

function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   = number_string.split(','),
            sisa    = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }   
</script>

<script type="text/javascript">
    $("#cTahun").datepicker( {
    format: " yyyy",
    viewMode: "years", 
    minViewMode: "years",
    orientation: 'auto top'
});
</script>

<script type="text/javascript">
    $(".input").datepicker( {
    format: 'dd MM yyyy',
    orientation: 'auto top'
});
</script>

<script type="text/javascript">
    function sprintf(str) {
    var args = arguments, i = 1;

    return str.replace(/%(s|d|0\d+d)/g, function (x, type) {
        var value = args[i++];
        switch (type) {
        case 's': return value;
        case 'd': return parseInt(value, 10);
        default:
            value = String(parseInt(value, 10));
            var n = Number(type.slice(1, -1));
            return '0'.repeat(n).slice(value.length) + value;
        }
        });
    }

</script>


<script type="text/javascript">
function bottom() {
    document.getElementById( 'bottom' ).scrollIntoView();
    window.setTimeout( function () { top(); }, 2000 );
};
</script>
