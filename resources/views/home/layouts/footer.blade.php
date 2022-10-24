
<style>

  html {
    position: relative;
    min-height: 100%;
  }
  body {
    margin-bottom: 60px; /* Margin bottom by footer height */
  }
  
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px; /* Set the fixed height of the footer here */
    line-height: 60px; /* Vertically center the text there */
    background-color: #f5f5f5;
  }
  
  </style>
  
  
  <footer class="footer bg-dark">
    <div class="container">
      <span class="text-muted">Place sticky footer content here.</span>
    </div>
  </footer>
  


<!-- Bootstrap 4 -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/sweetalert/sweetalert2.all.min.js"></script>

<script>
    // Tommbol hapus
  $('.tombol-hapus').on('click', function (e) {
    // Mematikan href
    e.preventDefault();
    // const href = $(this).attr('href');
    // const action = $(this).attr('action');

    let id = $(this).data('id');

    Swal({
      title: 'Apakah anda yakin ingin menghapus?',
      text: "data akan dihapus",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Data!'
    }).then((result) => {
      if (result.value) {
        // document.location.href = href;
        // document.location.action = action;
        // document.getElementById("#delete").setValue('Adakah');
        // console.log(result);
        $('#form-delete').submit();
      }
    })
})
</script>


</body>
</html>
