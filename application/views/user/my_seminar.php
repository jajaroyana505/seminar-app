<div class="card shadow mb-5">
   <div class="card-body">
      <h3 class="card-title">My Seminar</h3>
      <hr>
      <?= var_dump($data_seminar); ?>
      <?php foreach ($data_seminar as $seminar) { ?>
         <div class="card">
            <div class="card-body">
               <div class="row justify-content-between">
                  <div class="col-md-9">
                     <p class="fw-bold fs-5"><?= $seminar->tema; ?></p>
                     <div class="row text-secondary row">
                        <span class="col-md-4"><i class="fa-regular fa-calendar-days"></i> 12 Januari 2024</span>
                        <span class="col-md-3"><i class="fa-regular fa-clock"></i> 09.00 PM</span>
                        <span class="col-md-5"><i class="fa-solid fa-map-location-dot"></i> Kampus Karawang</span>
                     </div>
                  </div>
                  <div class="col-md-3 mt-4">
                     <a href="" class="btn btn-primary ">Kartu Peserta</a>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
</div>