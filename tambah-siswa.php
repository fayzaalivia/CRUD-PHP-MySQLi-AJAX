<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>tambah siswa</title>
</head>
<body>
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
                TAMBAH SISWA 
            </div>

            <div class="card-body">
                

                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" name="nisn" id= "nisn" placeholder="Masukkan NISN Siswa" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Siswa" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Siswa" rows="4"></textarea> 
                </div>

                <button class="btn btn-simpan btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
           </div>
          </div>
         </div>
        </div>
       </div>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
       <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



       <script>
        $(document).ready(function() {

        $(".btn-simpan").click( function() {
        
          var nisn = $("#nisn").val();
          var nama_lengkap = $("#nama_lengkap").val();
          var alamat = $("#alamat").val();

          if(nisn.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'NISN Wajib Diisi !'
            });

          } else if(nama_lengkap.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });

            } else if(alamat.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Alamat Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "simpan-siswa.php",
              type: "POST",
              data: {
                  "nisn": nisn,
                  "nama_lengkap": nama_lengkap,
                  "alamat": alamat
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Simpan Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "index.php";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Simpan Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
       </script>
</body>
</html>