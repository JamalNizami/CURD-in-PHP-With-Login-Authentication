<?php
 
    class StudentModel extends CI_Model
    {
        public function create ($arrayForm){
            // this function will save records in table....
            $this->db->insert("User_table",$arrayForm);
        }

        public function checkUser($Email){
            $this->db->where('Email',$Email);
            return $user = $this->db->get('User_table')->row_array();
    
        }
        public function authorized(){
            $user = $this->session->userdata('user');
            if(!empty($user)){
                return true;
            }
            else{
            return false;
            }
        }

        public function add($arrayForm){

            $this->db->insert('Student',$arrayForm);

        }

        public function all(){
            
           return $users =  $this->db->get('Student')->result_array();
        }

        public function getStudent($Roll_No){

            $this->db->where('Roll_No',$Roll_No);
            return $user = $this->db->get('Student')->row_array();

        }

        public function updateStudent($Roll_No,$arrayForm){

            $this->db->where('Roll_No', $Roll_No );
            $this->db->update('Student',$arrayForm);

        }

        public function deleteStudent($Roll_No){
            $this->db->where('Roll_No',$Roll_No);
            $this->db->delete('Student');
        }
    }
