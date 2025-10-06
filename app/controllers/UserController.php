<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        
    }

    public function profile($username, $name) {
        $data['username'] = $username;
        $data['name'] = $name;
        $this->call->view('ViewProfile', $data);
    }

    public function show()
    {
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 3;

        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page,'/?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('Showdata', $data);
    }

    public function create()
    {
        // require login
        $this->call->library('Lauth');
        if (!$this->Lauth->is_logged_in()) {
            redirect('auth/login');
        }
        if ($this->io->method() == 'post') {
        $first_name  = $this->io->post('first_name');
        $last_name = $this->io->post('last_name');
        $email = $this->io->post('email');
        $image = null;
       
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            if (isset($_FILES['image']['tmp_name']) && isset($_FILES['image']['name']) && isset($_FILES['image']['size'])) {
                $original_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
                
                $this->call->library('upload', $_FILES['image']);
                $this->upload
                    ->max_size(5)
                    ->min_size(0.01) 
                    ->set_dir('public/images')
                    ->allowed_extensions(['jpg','jpeg','png','gif'])
                    ->allowed_mimes(['image/jpeg','image/png','image/gif'])
                    ->is_image()
                    ->encrypt_name();
                
                if ($this->upload->do_upload()) {
                    $image = $this->upload->get_filename();
               
                } else {
                    echo "Upload Error: ";
                    print_r($this->upload->get_errors());
                    exit; 
                }
            } else {
                echo "Error: Invalid file upload structure!";
                exit;
            }
        } else {
            echo "Error:image is required!";
            exit;
        }

        $data = [
            'first_name'   => $first_name,
            'last_name'  => $last_name,
            'email'  => $email,
            'image' => $image,
           
        ];

        if ($this->UserModel->insert($data)) {
            redirect('/');
        } else {
            echo 'Error saving adventurer!';
        }
    } else {
        $this->call->view('Create');
    }     
        
        }
    
        public function update($id)
        {
            // require login
            $this->call->library('Lauth');
            if (!$this->Lauth->is_logged_in()) {
                redirect('auth/login');
            }
            $data ['student'] = $this->UserModel->find($id);
            if($this->io->method() == 'post')
            {
                $last_name = $this->io->post('last_name');
                $first_name = $this->io->post('first_name');
                $email = $this->io->post('email');
              
                $data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'email' => $email,
                   
                );
                if($this->UserModel->update($id, $data))
                {
                   redirect('/');
                }else{
                    echo 'Failed to update data.';
                }
            }
            $this->call->view('Update', $data);
        }

        public function delete($id)
        {
            // require admin
            $this->call->library('Lauth');
            if (!$this->Lauth->is_logged_in() || !$this->Lauth->has_role('admin')) {
                echo 'Forbidden';
                exit;
            }

            if($this->UserModel->delete($id))
            {
                redirect('/');
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function soft_delete($id)
        {
            // require login
            $this->call->library('Lauth');
            if (!$this->Lauth->is_logged_in()) {
                redirect('auth/login');
            }

            if($this->UserModel->soft_delete($id))
            {
                redirect('/');
            }else{
                echo 'Failed to delete data.';
            }
        }

        public function restore($id)
        {
            // require admin
            $this->call->library('Lauth');
            if (!$this->Lauth->is_logged_in() || !$this->Lauth->has_role('admin')) {
                echo 'Forbidden';
                exit;
            }

            if($this->UserModel->restore($id))
            {
                redirect('/');
            }else{
                echo 'Failed to restore data.';
            }
        }

    }