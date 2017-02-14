
<h1>Reg</h1>

<form method="post">
    <input type="text" name="login"
    value="<?= (isset($_POST['login'])) ? $_POST['login'] : ''?>"
    class="<?= (isset($formErrors['login'])) ? 'error' : ''?>">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password">
    
    
    
    <?php if(isset($formErrors['login'])):?>
    <?php var_dump($formErrors['login'])?>
    <?php endif;?>
    <button>Submit</button>
</form>