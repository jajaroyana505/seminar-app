<nav class="navbar navbar-expand-lg fixed-top shadow bg-white">
   <div class="container">
      <a class="navbar-brand" href="#">
         <img src="<?= base_url(); ?>assets/img/logo.png" width="50px" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav ms-auto">
            <a class="nav-link " aria-current="page" href="#">Home</a>
            <a class="nav-link " href="<?= base_url('seminar'); ?>">Seminar & Workshop</a>
            <a class="nav-link " href="<?= base_url('user'); ?>">Profile</a>
            <!-- <img class=" img-profile" src="<?= $user_data->profile_picture; ?>" width="40px" alt=""> -->
         </div>
      </div>
   </div>
</nav>