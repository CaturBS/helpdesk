<?php
    $this->load->helper('url');
    if (!$posted) {
?>
<form method="post" action="<?php echo site_url('register');?>">
    name: <input type="text" name="name"><br/>
    password: <input type="text" name="password"><br/>
    level: <input type="text" name="level"><br/>
    email: <input type="text" name="email"><br/>
    <input type="submit">
    
</form>

<?php
    } else {
        echo "submitted";
    };
    ?>