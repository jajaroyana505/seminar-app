<div class="container container-top" id="seminar">
   <!-- <div class="display-4 text-center mb-4">
      Profile User
   </div> -->
   <div class="row justify-content-center">

      <div class="col-md-4">
         <div class="card shadow mb-5 items-center p-3">
            <img class="mx-auto img-profile mt-5" src="<?= $user_data->profile_picture; ?>" width="70%" alt="">
            <div class="card-body text-center mb-3">
               <h4 class="card-title fw-bolder">
                  @<?= $user_data->username; ?>
               </h4>
               <span class=fst-normal text-secondary">
                  id : <?= $user_data->user_id; ?>
               </span>
            </div>
            <hr>
            <span class="fw-semibold text-secondary text-center">
               <?= $user_data->first_name; ?>
               <?= $user_data->last_name; ?>
            </span>
         </div>
      </div>
      <div class="col-md-7">
         <div class="card shadow mb-5">
            <div class="card-body">
               <h3 class="card-title">Data Profile</h3>
               <hr>
               <div class="row">
                  <div class="col-md-8">
                     <div class="data-profile mb-2">
                        <div class="label">Username</div>
                        <div class="value">@<?= $user_data->username; ?></div>
                     </div>
                     <div class="data-profile mb-2">
                        <div class="label">Nama Lengkap</div>
                        <div class="value">
                           <?= $user_data->first_name; ?>
                           <?= $user_data->last_name; ?>
                        </div>
                     </div>
                     <div class="data-profile mb-2">
                        <div class="label">Email</div>
                        <div class="value">
                           <?= $user_data->email; ?>
                        </div>
                     </div>
                     <a class="btn btn-success me-3" type="button"><i class="fa-solid fa-user-pen"></i> Ubah Profile</a>
                     <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger" type="button"><i class="fa-sharp fa-solid fa-power-off"></i> LogOut</a>
                  </div>

               </div>
            </div>
         </div>

      </div>



   </div>
</div>