<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Student extends CI_controller{
                
        
///////////////////////////////    Add function    //////////////////////////////////////////

        public function add()
        {
            $this->load->model('StudentModel');
            if( $this->StudentModel->authorized() == false)
                {
                    $this->session->set_flashdata('msg','You are not Authorized to this section.');
                    redirect(base_url().'index.php/student/login');
                }
            else
            {
                $this->load->model('StudentModel');
                $this->form_validation->set_message('is_unique','Email is Already exist');
                $this->form_validation->set_rules('Roll_No', 'Roll No' , 'required');
                $this->form_validation->set_rules('Student_Name', 'Student Name' , 'required');
                $this->form_validation->set_rules('Email', 'Email' , 'required|valid_email');
                $this->form_validation->set_rules('Semester', 'Semester' , 'required');
        
                    if($this->form_validation->run() == false)
                    {
                        $this->load->view('add'); 
                    
                    }
                    else
                    {
                        $arrayForm = array();
                        $arrayForm['Roll_No'] = $this->input->post('Roll_No');
                        $arrayForm['Student_Name'] = $this->input->post('Student_Name');
                        $arrayForm['Email'] = $this->input->post('Email');
                        $arrayForm['Semester'] = $this->input->post('Semester');

                        $this->StudentModel->add($arrayForm);
                        $this->session->set_flashdata('success', ' Record added successfully ');
                        redirect(base_url()."index.php/student/index");   
                    }
            }
        } 



//////////////////////////////      Index or List Function      ///////////////////////////////

        public function index()
        {
            $this->load->model('StudentModel');

            if( $this->StudentModel->authorized() == false)
            {
                $this->session->set_flashdata('msg','You are not Authorized to this section.');
                redirect(base_url().'index.php/student/login');
            }
            else
            {
                $this->load->model('StudentModel');
                $users = $this->StudentModel->all();
                $data = array();
                $data['users'] = $users;
                $this->load->view('list',$data);
            }
        }



///////////////////////////////      Edit Function      /////////////////////////////////

        public function edit($Roll_No)
        {
            $this->load->model('StudentModel');

            if( $this->StudentModel->authorized() == false)
            {
                $this->session->set_flashdata('msg','You are not Authorized to this section.');
                redirect(base_url().'index.php/student/login');
            }
            else
            {
                $this->load->model('StudentModel');
                $user = $this->StudentModel->getStudent($Roll_No);
                $data = array();
                $data['user']= $user;

                $this->form_validation->set_rules('Roll_No', 'Roll No' , 'required');
                $this->form_validation->set_rules('Student_Name', 'Student Name' , 'required');
                $this->form_validation->set_rules('Email', 'Email' , 'required|valid_email');
                $this->form_validation->set_rules('Semester', 'Semester' , 'required');

                    if($this->form_validation->run() == false)
                    {
                        $this->load->view('edit',$data);
                    }
                    else
                    {
                        $arrayForm = array();
                        $arrayForm['Roll_No'] = $this->input->post('Roll_No');
                        $arrayForm['Student_Name'] = $this->input->post('Student_Name');
                        $arrayForm['Email'] = $this->input->post('Email');
                        $arrayForm['Semester'] = $this->input->post('Semester');

                        $this->StudentModel->updateStudent($Roll_No,$arrayForm);
                        $this->session->set_flashdata('success', ' Record update successfully ');
                        redirect(base_url().'index.php/student/index');
                    }
            }
        }

/////////////////////////////       Delete Function        /////////////////////////////////

        public function delete($Roll_No)
        {
            $this->load->model('StudentModel');

            if( $this->StudentModel->authorized() == false)
            {
                $this->session->set_flashdata('msg','You are not Authorized to this section.');
                redirect(base_url().'index.php/student/login');
            }
            else
            {
                $this->load->model('StudentModel');
                $user = $this->StudentModel->getStudent($Roll_No);

                    if(empty($user))
                    {
                        $this->session->set_flashdata('failure', ' Record not Found in the DataBase ');
                        redirect(base_url().'index.php/student/index');
                    }
                    else
                    {
                        $this->StudentModel->deleteStudent($Roll_No);
                        $this->session->set_flashdata('success', ' Record Deleted From DataBase');
                        redirect(base_url().'index.php/student/index');
                    }                
            }
        }

///////////////////////////     Register Function         ///////////////////////

        public function register()
        {
            $this->form_validation->set_rules('full_name', 'Name' , 'required');
            $this->form_validation->set_rules('Email', 'Email' , 'required|valid_email|is_unique[User_table.Email]');
            $this->form_validation->set_rules('pword', 'Password' , 'required');

            if( $this->form_validation->run()==false)
            {
                $this->load->view('register');
            } 
            else 
            {
                // here we save user data in DataBase
                $this->load->model('StudentModel');
                $arrayForm = array();
                $arrayForm['full_name'] = $this->input->post('full_name');
                $arrayForm['Email'] = $this->input->post('Email');
                $arrayForm['pword'] = password_hash($this->input->post('pword'), PASSWORD_BCRYPT) ;
                
                $this->StudentModel->create($arrayForm);
                $this->session->set_flashdata('msg1','Your account has been created Successfully.');
                redirect(base_url().'index.php/student/index');
            }

        }

/////////////////////////////        Login Function      /////////////////////////////////////

        public function login()
        {
            $this->load->model('StudentModel');
            $this->form_validation->set_rules('Email','Email','required|valid_email');
            $this->form_validation->set_rules('pword','Password','required');

            if($this->form_validation->run()==true)
            {
                $Email= $this->input->post('Email');
                $user = $this->StudentModel->checkUser($Email);

                    if(!empty($user))
                    {
                        $password = $this->input->post('pword');

                        if(password_verify($password, $user['pword'])== true )
                        {
                            $sesArray['Email'] = $user['Email'];
                            $this->session->set_userdata('user',$sesArray);
                            redirect(uri: base_url().'index.php/student/index');
                        // echo "log in";
                        } 
                        else 
                        {
                            $this->session->set_flashdata('msg','Either Email or Password is not correct , please try again');
                            redirect(base_url().'index.php/student/login');
                        }
                    } 
                    else 
                    {
                        $this->session->set_flashdata('msg','Either Email or Password is not correct , please try again');
                        redirect(base_url().'index.php/student/login');
                    }
            } 
            else 
            {    
                $this->load->view('login');
            }

        }

///////////////////////////////         Logout Function      /////////////////////////////////////////

        public function logout()
        {
            $this->session->unset_userdata('user');
            redirect(base_url(), 'index.php/student/login');
        }
    }


?>