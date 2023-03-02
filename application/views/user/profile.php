<div class="container container-top" id="seminar">
   <!-- <div class="display-4 text-center mb-4">
      Profile User
   </div> -->
   <div class="row justify-content-center">

      <div class="col-md-3">
         <div class="card shadow mb-5 items-center p-3">
            <img class="mx-auto img-profile mt-3" src="<?= $user_data->profile_picture; ?>" width="70%" alt="">
            <div class="card-body text-center mb-3">
               <h5 class="card-title ">
                  @<?= $user_data->username; ?>
               </h5>
               <span class="fst-normal text-secondary">
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
                     <div class="data-profile mb-3">
                        <small class="label p-2 ">Username</small>
                        <div class="value mt-1 text-secondary"><?= $user_data->username; ?></div>
                     </div>
                     <div class="data-profile mb-3">
                        <small class="label p-2 ">Nama Lengkap</small>
                        <div class="value mt-1 text-secondary">
                           <?= $user_data->first_name; ?>
                           <?= $user_data->last_name; ?>
                        </div>
                     </div>
                     <div class="data-profile mb-5">
                        <small class="label p-2 ">Alamat Email</small>
                        <div class="value mt-1 text-secondary">
                           <?= $user_data->email; ?>
                        </div>
                     </div>
                     <div class="ms-auto">
                        <a class="btn btn-primary me-3" type="button"><i class="fa-solid fa-user-pen"></i> Ubah Profile</a>
                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger" type="button"><i class="fa-sharp fa-solid fa-power-off"></i> LogOut</a>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         <?php
         if ($data_seminar != null) {
            $this->load->view('user/my_seminar');
         }
         ?>

      </div>



   </div>
</div>