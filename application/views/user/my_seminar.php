<div class="card shadow mb-5">
   <div class="card-body">
      <h3 class="card-title">My Seminar</h3>

      <?php foreach ($data_seminar as $seminar) { ?>
         <div class="card mt-3">
            <div class="card-body">
               <div class="row justify-content-between">
                  <div class="col-md-9">
                     <p class=" fs-5"><?= $seminar->tema; ?></p>
                     <div class="row text-secondary row">
                        <span class="col-md-auto"><i class="fa-regular fa-calendar-days"></i> <?= $seminar->tanggal; ?></span>
                        <span class="col-md-auto"><i class="fa-regular fa-clock"></i> <?= $seminar->waktu; ?></span>
                        <span class="col-md-auto"><i class="fa-solid fa-map-location-dot"></i> <?= $seminar->tempat; ?></span>
                     </div>
                  </div>
                  <div class="col-md-3 mt-4">
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kartuPeserta<?= $seminar->id_seminar; ?>">
                        Kartu Peserta
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="kartuPeserta<?= $seminar->id_seminar; ?>" tabindex="-1" aria-labelledby="kartiPesertaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <div class="row align-items-center">
                                    <div class="col-auto">
                                       <img src="<?= base_url('assets/img/logo.png'); ?>" alt="" width="50px">
                                    </div>
                                    <div class="col">
                                       <h2 class="modal-title fs-5" id="kartiPesertaLabel">
                                          HIMASI UBSI Kabupaten Karawang
                                       </h2>
                                    </div>

                                 </div>
                                 <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                              </div>
                              <div class="modal-body text-center">
                                 <h1>Karu Peserta</h1>
                                 <img src="<?= base_url('assets/img/qrcode/'); ?><?= $seminar->token_qr; ?>.png" alt="qrcode" width="60%">
                                 <div class="mt-3 mb-4">
                                    <div class="fs-3 fw-bold"><?= $seminar->nama; ?></div>
                                    <div class="fs-5"><?= $seminar->nim; ?></div>
                                    <div class="fs-5">Kampus <?= $seminar->kampus; ?></div>
                                 </div>
                                 <small class="fst-italic text-primary">*Tunjukan QR Code kepada panitia untuk mengisi presensi seminar</small>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
</div>