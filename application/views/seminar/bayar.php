<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>detail_pembayaran</title>
</head>
<style>
   .container {
      width: 500px;
      border: solid 1px black;
      padding: 5px;
   }
</style>

<body>

   <center>
      <div class="conatiner">

         <h3>invoice# <?= $pembayaran->no_invoice; ?></h3>
         <table>
            <!-- <tr>
               <td>Nama </td>
               <td>:</td>
               <td><?= $peserta->nama; ?></td>
            </tr>
            <tr>
               <td>NIM </td>
               <td>:</td>
               <td><?= $peserta->nim; ?></td>
            </tr> -->
            <tr>
               <td>Pembayaran </td>
               <td>:</td>
               <td>Seminar </td>
            </tr>
            <tr>
               <td>HTM </td>
               <td>:</td>
               <td>IDR <?= $pembayaran->nominal; ?></td>
            </tr>
            <tr>
               <td>Total Bayar </td>
               <td>:</td>
               <td>Rp. <?= $pembayaran->nominal; ?></td>
            </tr>
         </table>

         <br><br>

         <button id="pay-button">Bayar</button>
      </div>

   </center>


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