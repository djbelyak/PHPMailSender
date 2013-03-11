<!doctype html>
<html>
  
  <head>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>PHPMailSender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="themes/united/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css"> 
  </head>
  
  <body>
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="nav-header">PHPMailSender</li>
        <li class="active">
          <a href="index.html">Главная</a>
        </li>
        <li>
          <a href="https://github.com/djbelyak/PHPMailSender" target="_blank">Проект на GitHub</a>
        </li>
      </ul>
    </div>
    <div class="container">
      <div class="hero-unit">
        <h1>PHPMailSender</h1>
        <p>Во время работы приложения произошла ошибка</p>
        <p><?php echo $_GET['error']; ?></p>
      </div>
      <div class="row">
        <div class="span6">
          <div class="well">
            <a class="btn btn-block btn-large" href="sendtext.html">Отправить напоминание <br>(обычное текстовое сообщение)</a>
          </div>
        </div>
        <div class="span6">
          <div class="well">
            <a class="btn btn-block btn-large" href="sendpage.html">Отправить статью <br>(содержание указанной гиперссылки)</a>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>