<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Gerador de Relatórios com Koolreport</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container"><!-- inicio container -->
<br>
<div class="card" style="background: #cecccc">
  <div class="card-body text-center">
    <h1>Gerador de Relatórios com Koolreport</h1>
  </div>
</div>
<h4 align="center"><a href="https://github.com/ribafs/reports" target="_blank">Repositório</a> - <a href="ajuda.html" target="_blank">Precisa de Ajuda?</a></h4>

<div class="row"><!--início row -->  
  <div class="col-sm-3"></div>
  <div class="col-sm-8"><!--início primeiro col-sm-8 -->
    <form method="POST" action="">

<?php
if(!file_exists('vendor')) {
    print "<h3 class=\"text-danger\">Precisa executar antes no diretório raiz</h3>";
    print '<b>composer install</b>';
    exit;
} 
?>  
    <div><b>Banco de dados</b></div>
<br>
    <div class="form-group row">
      <label class="col-sm-3">Servidor</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="host" name="host" value="localhost" required autofocus>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Banco</label>
      <div class="col-sm-6">
        <input type="test" class="form-control" id="db" placeholder="Nome do banco" name="db" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Usuário</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="user" name="user" value="root" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Senha</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="pass" value="" name="pass">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">SGBD</label>
      <div class="col-sm-6">
        <input type="sgbd" class="form-control" id="sgbd" name="sgbd" value="mysql">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Porta</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="port" name="port" value="3306">
      </div>
    </div>
<br>
    <div><b>Dados do Relatório</b></div>
<br>
    <div class="form-group row"><!--início segundo col-sm-6 -->
      <label class="col-sm-3">Campo vertical</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="fieldVert" name="fieldVert" placeholder="value">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Campo horizontal</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="fieldHor" name="fieldHor" placeholder="date">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Nome da tabela</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="table" name="table" placeholder="Nome da tabela">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Título do relatório</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="title" name="title" placeholder="Carros do mês">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Campo horizontal 1</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="valueHor1" name="valueHor1" placeholder="2020-05">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Campo horizontal 2</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="valueHor2" name="valueHor2" placeholder="2020-06">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3">Campo horizontal 3</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="valueHor3" name="valueHor3" placeholder="2020-07">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <button type="submit" name="report" class="btn btn-primary">Enviar</button>
      </div>
    </div>

    </form>
  </div><!-- final col-sm-8 -->
</div><!-- final row -->
</div><!-- final container -->
<hr>
<b><i><p align="center">Por <a href="https://ribafs.me" target="_blank">RibaFS</a></p></i></b>
</body>
</html>

<?php
if(isset($_POST['report'])){

    system('composer install');

    $host = $_POST['host'];
    $db = $_POST['db'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sgbd = $_POST['sgbd'];
    $port = $_POST['port'];

    $fieldVert = $_POST['fieldVert'];
    $fieldHor = $_POST['fieldHor'];
    $table = $_POST['table'];

    $title = $_POST['title'];
    $labelHor = ucfirst($fieldHor);
    $labelVert = ucfirst($fieldVert);
    $valueHor1 = $_POST['valueHor1'];
    $valueHor2 = $_POST['valueHor2'];
    $valueHor3 = $_POST['valueHor3'];

    // Criando cópia de report/Report.php ajustada para vendor/koolreport
    $str=file_get_contents('report/Report.php');

    $str=str_replace('$host', $host, $str);
    $str=str_replace('$db', $db, $str);
    $str=str_replace('$user', $user, $str);
    $str=str_replace('$pass', $pass, $str);
    $str=str_replace('$sgbd', $sgbd, $str);
    $str=str_replace('$port', $port, $str);
    $str=str_replace('$table', $table, $str);
    $str=str_replace('$fieldVert', $fieldVert, $str);
    $str=str_replace('$fieldHor', $fieldHor, $str);

    if(is_writable('vendor/koolreport')){
        file_put_contents('vendor/koolreport/Report.php', $str);
    }else{
        print 'O diretório "vendor/koolreport" requer permissão de escrita para o servidor web';
        exist;
    }

    // Criando cópia de report/Report.view.php ajustada para vendor/koolreport
    $str=file_get_contents('report/Report.view.php');
    $str=str_replace('$title', $title, $str);
    $str=str_replace('$subTitle', $subTitle, $str);
    $str=str_replace('$fieldVert', $fieldVert, $str);
    $str=str_replace('$fieldHor', $fieldHor, $str);
    $str=str_replace('$labelHor', $labelHor, $str);
    $str=str_replace('$labelVert', $labelVert, $str);
    $str=str_replace('$valueHor1', $valueHor1, $str);
    $str=str_replace('$valueHor2', $valueHor2, $str);
    $str=str_replace('$valueHor3', $valueHor3, $str);

    if(is_writable('vendor/koolreport')){
        file_put_contents('vendor/koolreport/Report.view.php', $str);
        copy('report/index.php','vendor/koolreport/index.php'); 
    }else{
        print 'O diretório "vendor/koolreport" requer permissão de escrita para o servidor web';
        exist;
    }

    print "<script>location = 'vendor/koolreport/index.php'</script>";
}
?>

