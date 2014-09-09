<?php
if ($dataLogin != NULL) {
    if ($dataLogin['success']) {
        echo 'sukses';
    } else {
        echo 'login gagal';
    };
    print_r($dataLogin);
} else {
?>
<form class="loginForm" method="post" action="<?php echo site_url('home/login')?>">
    <input type="text" id="username" name="username" value='' placeholder="Nama User"><br/>
    <input type="password" id="password" name="password" value='' placeholder="Password"><br/>
    <input type="submit" value="Login">
</form>

<?php } ?>
<script type="text/javascript">
    $("#username").value('');
    $("#password").value('');
</script>