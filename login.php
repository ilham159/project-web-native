<!DOCTYPE html>
<html>
<head>
  <title>Login School</title>
</head>
<body>
<form method="post" action="proses_login.php" id="login-form">
<link rel="stylesheet" type="text/css" href="style.css">
<div class="body"></div>
    <div class="grad"></div>
    <div class="header">
      <div>Web<span>School</span></div>
    </div>
    <br>
    <div class="login">
            <form action="login.php" method="post" onSubmit="return validasi()">
        <input type="text" placeholder="username" name="username" id="username"><br>
        <input type="password" placeholder="password" name="password" id="password"><br>
        <input type="submit" value="Login" class="tombol"><p>
    </div>
</body>
</html>

