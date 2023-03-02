<div class="container container-top">

   <!-- <h1 class="text-center">Form Login</h1> -->
   <div class="row justify-content-center">

      <!-- <div class="col-xl-9 col-lg-12 col-md-9"> -->
      <div class="col-md-5">
         <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
               <div class="row p-xl-4 p-md-0">
                  <!-- <div class="col-lg-6 d-none d-lg-block">
                     <div class="text-center">
                        <img width="250px" src="<?= base_url(); ?>assets/img/logo.png" alt="">
                     </div>
                  </div> -->
                  <div class="col-lg-12">
                     <div class="p-3">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Selmat datang kembali!</h1>
                        </div>
                        <form>
                           <div class="mb-3">
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat email">
                           </div>
                           <div class="mb-5">
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                           </div>
                           <div class="d-grid gap-2">
                              <button class="btn btn-primary p-2" type="button">Masuk</button>
                              <a href="<?= $url_auth_google; ?>" class="btn btn-danger p-2" type="button"><i class="fa-brands fa-google"></i> Login dengan Google</a>
                           </div>
                        </form>
                        <hr>
                        <div class="text-center">
                           <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                           <a class="small" href="register.html">Create an Account!</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>

   </div>

</div>