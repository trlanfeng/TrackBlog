<h2>登录页面</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('admin/admin/check_login'); ?>
	<label for="username">用户名：</label>
	<input type="input" name="username" /><br/>

	<label for="password">密码：</label>
	<input type="input" name="password" /><br/>

	<input type="submit" name="submit" value="登录"/>
	</form>