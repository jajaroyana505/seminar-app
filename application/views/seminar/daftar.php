<div class="container container-top" id="form">
   <div class="row justify-content-center mt-5">
      <div class="col-md-6">
         <div class="card shadow">
            <div class="card-body">

               <h2 class="card-title text-center mb-4">
                  Form Pendaftaran
               </h2>
               <form action="<?= base_url('user/daftar_seminar/') . $this->uri->segment('3'); ?>" method="post">
                  <input type="text" name="id_seminar" value="<?php echo set_value('id_seminar') ?  set_value('id_seminar') : $this->uri->segment('3') ?>" hidden>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-floating mb-3 ">
                           <input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="nama" value="<?php echo set_value('nama'); ?>">
                           <label for="nama">Nama Lengkap</label>
                           <div class="invalid-feedback">
                              <?php echo form_error('nama'); ?>
                           </div>

                        </div>

                     </div>
                     <div class="col-md-6">
                        <div class="form-floating mb-3">
                           <input type="text" name="nim" class="form-control <?php echo form_error('nim') ? 'is-invalid' : '' ?>" id="nim" value="<?php echo set_value('nim'); ?>">
                           <label for="nim">No. Induk mahasiswa</label>
                           <div class="invalid-feedback">
                              <?php echo form_error('nim'); ?>
                           </div>
                        </div>

                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-floating mb-3">
                           <select class="form-select <?php echo form_error('semester') ? 'is-invalid' : '' ?>" name="semester" id="semester" aria-label="Floating label select example" value="<?php echo set_value('semester'); ?>">
                              <option></option>
                              <?php for ($i = 1; $i <= 5; $i++) { ?>
                                 <option value="<?= $i; ?>">Semester <?= $i; ?></option>
                              <?php } ?>
                           </select>
                           <label for="semester">Semester</label>
                           <div class="invalid-feedback">
                              <?php echo form_error('semester'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating mb-3">
                           <select class="form-select  <?php echo form_error('prodi') ? 'is-invalid' : '' ?>" name="prodi" id="prodi" aria-label="Floating label select example" value="<?php echo set_value('prodi'); ?>"></>
                              <option></option>
                              <option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Informasi Akuntansi">Sistem Informasi Akuntansi</option>
                           </select>
                           <label for="prodi">Program Studi</label>
                           <div class="invalid-feedback">
                              <?php echo form_error('prodi'); ?>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="form-floating mb-3">
                     <select class="form-select  <?php echo form_error('kampus') ? 'is-invalid' : '' ?>" name="kampus" id="kampus" aria-label="Floating label select example" value="<?php echo set_value('kampus'); ?>"></>
                        <option></option>
                        <option value="Cikampek">Kampus Cikampek</option>
                        <option value="Karawang">Kampus Karawang</option>
                     </select>
                     <label for="kampus">Asal kampus</label>
                     <div class="invalid-feedback">
                        <?php echo form_error('kampus'); ?>
                     </div>
                  </div>
                  <div class="form-floating mb-3">
                     <input type="email" name="email" class="form-control  <?php echo form_error('email') ? 'is-invalid' : '' ?>" id="email" value="<?php echo set_value('email'); ?>">
                     <label for="email">Email</label>
                     <div class="invalid-feedback">
                        <?php echo form_error('email'); ?>
                     </div>
                  </div>
                  <div class="form-floating mb-3">
                     <input type="text" name="no_tlp" class="form-control  <?php echo form_error('no_tlp') ? 'is-invalid' : '' ?>" id="no_tlp" value="<?php echo set_value('no_tlp'); ?>"></>
                     <label for="no_tlp">No. Telepon</label>
                     <div class="invalid-feedback">
                        <?php echo form_error('no_tlp'); ?>
                     </div>
                  </div>
                  <div class="d-grid gap-2 mt-5">
                     <button class="btn btn-primary" type="submit">Kirim</button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>