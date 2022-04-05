<?php
    class crud{
        //private database object\
        private $db;
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the attendee database
        public function insert($fname,$lname,$dob,$email,$contact,$specialty){
            try {
                //define sql statement to be execute
                $sql= "INSERT INTO attendee(firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                //execute statement
                $stmt->execute();
                return true;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            $sql = "select * from attendee a inner join specialties s  on a.specialty_id=s.specialty_id order by a.attendee_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getSpecialties(){
            $sql = "select * from specialties";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getAttendeeDetails($id){
            $sql = "select * from attendee a inner join specialties b on a.specialty_id=b.specialty_id where attendee_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }

        public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
            try{
                $sql = "UPDATE attendee SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE `attendee_id`=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                //execute statement
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
            try{
                $sql="delete from attendee where attendee_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
    }
?>
