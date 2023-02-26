<?php

class Model_peserta extends CI_Model
{
   public function rules()
   {
      return  [
         [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
         ],
         [
            'field' => 'nim',
            'label' => 'NIM',
            'rules' => 'required|max_length[8]'
         ],
         [
            'field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required'
         ],
         [
            'field' => 'prodi',
            'label' => 'Prodi',
            'rules' => 'required'
         ],
         [
            'field' => 'kampus',
            'label' => 'Kampus',
            'rules' => 'required'
         ],
         [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
         ],
         [
            'field' => 'no_tlp',
            'label' => 'No. Telepon',
            'rules' => 'required'
         ],

      ];
   }
   public function save()
   {
      $data = array(
         "user_id" => ($this->session->userdata('user_data'))->user_id,
         "id_seminar" => $this->input->post('id_seminar'),
         "nama" => $this->input->post('nama'),
         "nim" => $this->input->post('nim'),
         "semester" => $this->input->post('semester'),
         "prodi" => $this->input->post('prodi'),
         "kampus" => $this->input->post('kampus'),
         "email" => $this->input->post('email'),
         "no_tlp" => $this->input->post('no_tlp'),
      );

      if (!$this->cek_data(['user_id' => $data['user_id']])) {
         $this->db->insert('peserta', $data);
      }
   }

   public function cek_data($data)
   {
      $result = $this->db->get_where('peserta', $data)->num_rows();
      if ($result == 0) {
         return false;
      } else {
         return true;
      }
   }
   public function generate_token($order_id)
   {
      $this->load->model('Model_pembayaran');
      $pembayaran = new Model_pembayaran;
      $data = $pembayaran->getByOrderId($order_id);
      $token = time();
      $this->db->where(['user_id' => $data->user_id, 'id_seminar' => $data->id_seminar]);
      $this->db->update('peserta', ['token_qr' => $token]);
      $this->generate($token);
   }

   public function generate($token)
   {
      $this->load->library('ciqrcode');

      // nama folder tempat penyimpanan file qrcode
      $penyimpanan = "assets/img/qrcode/";

      // membuat folder dengan nama "temp"
      if (!file_exists($penyimpanan))
         mkdir($penyimpanan);

      // isi qrcode yang ingin dibuat. akan muncul saat di scan
      $isi = $token;

      // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
      QRcode::png($isi, $penyimpanan . "$isi.png");
   }
   public function getByUserId($id)
   {
      return $this->db->get_where('peserta', ['user_id' => $id])->row_object();
   }
}
