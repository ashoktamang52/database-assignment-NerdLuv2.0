<?php include("top.html"); ?>
<div>
	<div> Returning User: </div>
	<form action="/signup-submit.php">
		Name: <input type="text" name="name" size="17" maxlength="16"><br>
        Gender:
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F" checked>Female<br>
        Age: <input type="text" name="age" size="6" maxlength="2"><br>
        Personality type: <input type="text" name="personality_type" size="6" maxlength="4"><br>
        Favorite OS: 
            <select name="os">
                <option value="Windows">Windows</option>
                <option value="Mac OS X">Mac OS X</option>
                <option value="Linux">Linux</option>
            </select><br>
        Seeking age:
            <input type="text" name="min_seek_age" size="6" maxlength="2" placeholder="min">
            to
            <input type="text" name="max_seek_age" size="6" maxlength="2" placeholder="max"><br>
		<input type="submit" value="Sign Up">
	</form>

</div>

<?php include("bottom.html"); ?>
