<h3>Register for an Account</h3>


<form action="<?= base_url('home/create') ?>" method="post">

<div class="col-12 form-group">
<label for="register-form-username">Choose a Username:</label>
<input type="text" id="register-form-username" name="username" value="" class="form-control" required="" />
</div>

<div class="col-12 form-group">
<label for="register-form-password">Choose Password:</label>
<input type="password" id="register-form-password" name="password" value="" class="form-control" required="" />
</div>

<div class="col-12 form-group">
<button class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
</div>

</form>