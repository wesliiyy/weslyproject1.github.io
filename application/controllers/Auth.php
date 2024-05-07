<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
?>
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/sweetalert2/sweetalert2.min.css">
        <script src="<?= base_url(); ?>/assets/node_modules/sweetalert2/sweetalert2.min.js"></script>

        <body></body>
        <?php
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'role' => $row->role
                );

                $this->session->set_userdata($params);
        ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Selamat datang, login berhasil'
                    }).then((result) => {
                        window.location = '<?= site_url('dashboard') ?>';
                    })
                </script>
            <?php
            } else {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Failure',
                        text: 'Mohon maaf login gagal, username atau password salah'
                    }).then((result) => {
                        window.location = '<?= site_url('auth/login') ?>';
                    })
                </script>
<?php
            }
        }
    }
    public function logout()
    {
        $params = array('userid', 'role');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
