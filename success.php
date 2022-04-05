<?php 
    $title='Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
      //extract value from the $_POST array
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $specialty = $_POST['specialty'];
      //Call function to insert and tract if success or not
      $isSuccess = $crud->insert($fname,$lname,$dob,$email,$contact,$specialty);

      if($isSuccess){
        include 'includes/successmessage.php';
      }else{
        include 'includes/errormessage.php';
      }
    }
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'].' '.$_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty']; ?></h6>
    <p class="card-text">Date of Birth: <?php echo $_POST['dob'];?></p>
    <p class="card-text">Email: <?php echo $_POST['email'];?></p>
    <p class="card-text">Phone: <?php echo $_POST['contact'];?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>