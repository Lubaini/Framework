<?php view('templates/header');?>
<?php 
session_start();
$USER = $_SESSION['USER'];
?>
<?php view('templates/footer');?>
<?php 
if (isset($_GET['alert'])) {?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Hi, <?php echo ucwords($USER[0]->first_name.' '.$USER[0]->last_name); ?>',
    text: 'Welcome To Your Account.'
});
</script>
<?php } ?>
