<?php

function is_logged_in()
{
   $ci = get_instance();
   if (!$ci->session->userdata('user_data')) {
      $pesan = [
         'isi' => "Sorry guys... kamu harus login dulu ya!",
         'type' => "danger"
      ];
      $ci->session->set_flashdata('pesan', $pesan);
      redirect(base_url('auth'));
   }
}
