<?php 
    $title='View Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    //Get attendee by id
    if(!isset($_GET['id'])){
      echo "<h1 class='text-danger'>Please check detail and try again</h1>";
    }else{
      $id = $_GET['id'];
      $result=$crud->getAttendeeDetails($id);
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['firstname'].' '.$result['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
    <p class="card-text">Date of Birth: <?php echo $result['dateofbirth'];?></p>
    <p class="card-text">Email: <?php echo $result['emailaddress'];?></p>
    <p class="card-text">Phone: <?php echo $result['contactnumber'];?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>

    
  </div>
</div>
<br/>
<a href="viewrecords.php" class="btn btn-info">Back To List</a>
<a href="edit.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-warning">Edit</a>
<a onclick="return confirm('Are you sure you want to delete this record');" href="delete.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-danger">Delete</a>
<?php } ?>
<?php require_once 'includes/footer.php'; ?>