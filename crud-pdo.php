<?php
//------------------------CONEXÃO-----------------------------
try
{
    $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost","root","");
}
catch(PDOException $e){
    echo "Erro com banco de dados: ".$e->getMessage();
}
catch(Exception $e){
    echo "Erro generico: ".$e->getMessage();
}

//-------------------------INSERT------------------------------------
//Primeira forma
//$res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES(:n, :t, :e)");
//$res->bindValue(":n", "Pedro");
//$res->bindValue(":t", "00000000");
//$res->bindValue(":e", "teste@gmail.com");
//$res->execute();



//Segunda forma
$pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES('Pedro', '00000000', 'teste@gmail.com')");


//------------------DELETE E UPDATE---------------------

// $cmd = $pdo->prepare("DELETE FROM pessoa where id== :id");
// $id = 3;
// $cmd->bindValue(":id", $id);
// $cmd->execute();
//ou
//$res = $pdo->query("DELETE FROM pessoa WHERE id = '3'");

// $cmd = $pdo->prepare("UPDATE pessoa SET email = :e WHERE id= :id");
// $cmd->bindValue(":e","Pedro@gmail.com");
// $cmd->bindValue(":id",9);
// $cmd->execute();
//ou
$res = $pdo->query("UPDATE pessoa SET email = 'Pedro@gmail.com' WHERE id= '10'");


//----------------------SELECT----------------------------

$cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id",4);
$cmd->execute();
$resultado = $cmd->fetch(PDO::FETCH_ASSOC);

foreach($resultado as $key => $value) {
    echo $key.": ".$value."<br>";
}


?>