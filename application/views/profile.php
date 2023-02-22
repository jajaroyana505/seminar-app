<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
</head>
<style>
   .kotak {
      width: 300px;
      border: solid 1px black;
      padding: 20px;
   }

   img {
      border-radius: 100%;
   }
</style>

<body>
   <center>
      <div class="kotak">
         <h1>Pofile</h1>
         <img src="<?= $user_data->profile_picture; ?>" width="100px" alt="">
         <table>
            <tr>
               <td></td>
            </tr>
         </table>

         <?= $user_data->username; ?>
         <br>
         <?= $user_data->email; ?>
         <br>
         <a href="<?= base_url('auth/logout'); ?>">LogOut</a>


      </div>
   </center>
</body>

</html>