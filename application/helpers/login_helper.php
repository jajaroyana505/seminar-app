<?php

function is_logged_in()
{
   $ci = get_instance();
   if (!$ci->session->userdata('user_data')) {
      redirect(base_url('auth'));
   }
}
