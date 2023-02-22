<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seminar</title>
</head>
<style>
   .kotak {
      width: 300px;
      border: solid 1px black;
      padding: 20px;
   }
</style>

<body>
   <center>
      <div class="kotak">
         <h1>Seminar</h1>
         <img src="<?= base_url('assets/img/seminar.jpeg'); ?>" width="100%" alt="">
         <a href="<?= base_url('user/daftar_seminar'); ?>/1">Daftar sekarang</a>
      </div>
   </center>
</body>

</html>