<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>detail_pembayaran</title>
</head>


<body>

   <div class="conatiner container-top">
      <div class="row text-center justify-content-center">
         <div class="col-xl-4 col-md-5">
            <div class="card m-3 shadow">
               <div class="card-header">
                  <h3 class="card-title">
                     Pembayaran
                  </h3>
               </div>
               <div class="card-body invoice">
                  <p class="">
                     invoice# <?= $pembayaran->no_invoice; ?>
                  </p>
                  <div class="d-flex justify-content-between">
                     <p>Nama :</p>
                     <p><?= $peserta->nama ?></p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p>NIM :</p>
                     <p><?= $peserta->nim ?></p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p>Semester :</p>
                     <p><?= $peserta->semester; ?>
                        <?php
                        if ($peserta->semester == 1) {
                           echo "(satu)";
                        } else if ($peserta->semester == 2) {
                           echo "(dua)";
                        } else if ($peserta->semester == 3) {
                           echo "(tiga)";
                        } else if ($peserta->semester == 4) {
                           echo "(empat)";
                        } else if ($peserta->semester == 5) {
                           echo "(lima)";
                        } else if ($peserta->semester == 6) {
                           echo "(enam)";
                        } else if ($peserta->semester == 7) {
                           echo "(tujuh)";
                        }
                        ?>
                     </p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p>Program Studi :</p>
                     <p><?= $peserta->prodi; ?></p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p>Kampus :</p>
                     <p><?= $peserta->kampus; ?></p>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                     <p>Pembayarn :</p>
                     <p>Seminar</p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p>HTM :</p>
                     <p>IDR <?= $pembayaran->nominal; ?></p>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                     <h5>Total Bayar :</h5>
                     <h5>Rp <?= number_format(intval($pembayaran->nominal), 2, ',', '.'); ?></h5>
                  </div>
                  <div class="d-flex justify-content-between px-5 ">
                     <a class="btn btn-success" id="pay-button">Bayar</a>
                     <a class="btn btn-danger">Batalkan</a>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>



   <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
   <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
   <script type="text/javascript">
      document.getElementById('pay-button').onclick = function() {
         // SnapToken acquired from previous step
         snap.pay('<?= $pembayaran->token_snap ?>', {
            // Optional
            onSuccess: function(result) {
               /* You may add your own js here, this is just example */
               document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
               /* You may add your own js here, this is just example */
               document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
               /* You may add your own js here, this is just example */
               document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
         });
      };
   </script>
</body>

</html>