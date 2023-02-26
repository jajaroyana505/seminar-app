<div class="container container-top" id="seminar">
   <div class="display-4 text-center mb-4">
      Seminar & Workshop
   </div>
   <div class="row justify-content-center">
      <?php foreach ($data_seminar as $seminar) { ?>
         <div class="col-md-8">
            <div class="card shadow mb-5">
               <div class="row">
                  <div class="col-md-6">
                     <img src="<?= base_url(); ?>assets/img/seminar.jpeg" width="100%" alt="banner">
                  </div>
                  <div class="col-md-6">
                     <div class="card-body">
                        <h3 class="card-title mb-4"><?= $seminar->tema; ?></h3>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae blanditiis ipsam eligendi provident maiores praesentium doloremque libero tenetur, molestias illum expedita ad pariatur ducimus id voluptatem ea repellendus culpa quidem.</p>
                        <hr>
                        <div class="d-flex justify-content-around fs-6">
                           <div>
                              <i class="fa-regular fa-calendar-days"></i> 12 Januari 2024
                           </div>
                           <div>
                              <i class="fa-regular fa-clock"></i> 09.00 PM
                           </div>

                        </div>
                        <hr>

                        <a href="<?= base_url('user/daftar_seminar'); ?>/<?= $seminar->id; ?>" class="btn btn-primary mt-5">Daftar Sekarang</a>
                     </div>


                  </div>
               </div>
            </div>

         </div>
      <?php } ?>


   </div>
</div>