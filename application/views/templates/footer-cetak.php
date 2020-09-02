

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>

  <script type="text/javascript">

    window.setTimeout("jam()", 1000);

    function jam(){

      var jam = new Date();

      setTimeout("jam()", 1000);

      document.getElementById("jam").innerHTML = jam.getHours() + ':' + jam.getMinutes();
    }

    $(document).ready(function(){

      $('#jenis').multipleSelect();
    });

    $('.ubah-hak-akses').on('click', function(){

      const roleId = $(this).data('role');
      const menuId = $(this).data('menu');

      $.ajax({

        url: "<?= base_url('admin/ubah_hak_akses'); ?>",
        type: "post",
        data: {

          role: roleId,
          menu: menuId
        },
        success: function(){

          document.location.href = "<?= base_url('admin/akses_role/'); ?>" + roleId;
        }
      });

    });

    $('.bulan-service').on('change' , function(){

      const angka = $(this).val();
      const role = "<?= $this->session->userdata('id_role'); ?>";

      if(role == 1) {

        document.location.href = "<?= base_url('admin/data_service/bulan/'); ?>" + angka;
      }

      if(role == 2) {

        document.location.href = "<?= base_url('staff/data_service/bulan/'); ?>" + angka;
      }

    });

    $('.bulan-penjualan').on('change' , function(){

      const angka = $(this).val();
      const role = "<?= $this->session->userdata('id_role'); ?>";

      if(role == 1) {

        document.location.href = "<?= base_url('admin/data_penjualan/bulan/'); ?>" + angka;
      }

      if(role == 2) {

        document.location.href = "<?= base_url('staff/data_penjualan/bulan/'); ?>" + angka;
      }

    });

    $('.tahun-penjualan').on('change' , function(){

      const angka = $(this).val();
      const role = "<?= $this->session->userdata('id_role'); ?>";

     if(role == 1) {

        document.location.href = "<?= base_url('admin/data_penjualan/tahun/'); ?>" + angka;
      }

      if(role == 2) {

        document.location.href = "<?= base_url('staff/data_penjualan/tahun/'); ?>" + angka;
      }

    });

    $('.tahun-service').on('change' , function(){

      const angka = $(this).val();
      const role = "<?= $this->session->userdata('id_role'); ?>";

     if(role == 1) {

        document.location.href = "<?= base_url('admin/data_service/tahun/'); ?>" + angka;
      }

      if(role == 2) {

        document.location.href = "<?= base_url('staff/data_service/tahun/'); ?>" + angka;
      }

    });

    $('.pilih-barang').on('change', function(){

      var harga = $(".pilih-barang option:selected").attr('harga');

      $('#harga').val(harga);
      $('#jumlah').focus();

    });

    $('#jumlah').on('click', function(){

      const harga = $('#harga').val();
      const jumlah = $('#jumlah').val();
      const total = harga * jumlah;
      
      $('#total').val(total);

    });

    $('#tunai').on('click', function(){

      const total = $('#total2').val();
      const tunai = $('#tunai').val();
      const kembali = tunai - total;
      
      $('#kembali').val(kembali);
      $('#tunai_hidden').val(tunai);

    });

    $(".custom-file-input").on("change", function() {

      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


  </script>

</body>

</html>