<!DOCTYPE html>
<html>
    <title>404: ERROR</title>
<head>
<style>
body{
    font-family: monospace!important;
}
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
.center {
    display: flex;
    justify-content: center;
}
</style>
</head>
<body>

<div class="center">
<h2>Oops!</h2>

<!-- <p>Click on the "x" symbol to close the alert message.</p> -->
</div>
<div class="center">
<p><em><code>Let's find out what's wrong.</code></em></p>
</div>
<div class="center alert">
  <!-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  -->
  <strong>ERROR: <?php echo $msg; ?></strong>.
</div>

</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_js_alert by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2017 06:52:31 GMT -->
</html>
