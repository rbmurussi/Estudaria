<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario de inclusao</title>
<script language="javascript">
 function homepage(){
	 window.open("index.html","_self");
	 } 


 function validation(formulario){
	 var nome_js = formulario.nome.value;
	 var unidade_js = formulario.unidade.value;
	 var telefone_js= formulario.telefone.value;
	 var email_js= formulario.email.value;
	 var cargo_js= formulario.cargo.value;
	 var i;
	 var emailValido = false;
	 for ( i = 0; i <= email_js.length; i++){
		 
		if (email_js.charAt( i ) == '@'){
			emailValido=true;
			
			}
		 
		 
		 
		 };
	 
	 if (nome_js.length == 0 || unidade_js.length == 0 || telefone_js.length == 0 || email_js.length == 0 || cargo_js.length == 0){
		 
		 alert("Nenhum campo pode ser deixado em branco!")

		 }
		 
	else if ( isNaN ( telefone_js.valueOf() ) ){
		 alert ("Telefone deve conter apenas numeros");
		 
		 
		 
		 }
		 
    else if (nome_js.length< 3){
		alert ("Nome deve conter pelo menos 3 caracteres");
		
		
		
		}	 
		
	 else if (telefone_js.length!= 8){
		alert ("Telefone deve ter 8 caracteres");
		
		
		
		}
		
	  else if (emailValido == false){
		alert ("Por favor digite um e-mail valido");
		
		
		
		} else { document.forms["proserver"].submit()}		
	 
	 
	 
	 
	 
	 }
	 
	 function emailexiste(){
		 
		 alert ("E-mail ja esta cadastrado");
		 
		 }
		 
	function emailnexiste(){
		 
		 alert ("Cadastro realizado com sucesso");
		 
		 }

</script>
</head>

<body bgcolor="#669999" text="#3300CC"  >
<table width="649" height="775" border="3%" align="center">
<tr>
 <td width="583" height="102"><center><h1>Novo Cadastro</h1></center>
</tr>
<tr>
 <td height="43"><center><h3>Insira os dados</h3></center>
</tr>
<tr >
 <td height="616" valign="top" align="center"><br><br>
 
         
        
 
 <form method="post" action="inclusao.php" name="form" id="proserver">
 <b><font color="#006600" size="5" face="Arial">
 	Nome<br><br>
    	<input type="text" name="nome" size="25" maxlength="50"><br><br>
    Unidade<br><br>
    	<input type="text" name="unidade" size="25" maxlength="40"><br><br>
    Telefone<br><br>
   		<input type="text" name="telefone" size="25" maxlength="10"><br><br>
 	E-mail<br><br>
    	<input type="text" name="email" size="25" maxlength="40"><br><br>
 	Cargo<br><br>
    <input type="text" name="cargo" size="25" maxlength="40"><br><br>
 	<input type="button" name="Submit"  value="Enviar" onclick="validation(Submit.form)">
    <input type="button" value="Home Page" onclick="homepage()"  ><br><br>
 </font></b>
 </form>   
 
 
 
 
 
</tr>



</table>

<?php


include ('conexao.php');

if ($_POST){


	
$nome_db = $_POST["nome"];
$unidade_db = $_POST["unidade"];
$telefone_db = $_POST["telefone"];
$email_db = $_POST["email"];
$cargo_db = $_POST["cargo"];
$email_existe= false;

$check_email = mysql_query ("SELECT email FROM funcionarios");

while ($email = mysql_fetch_array($check_email)){
	
	if  ($email['email'] == $email_db){
		
		$email_existe= true;
		
		
		}
  	
	
	
	}

if 	($email_existe== false){

$inserir = mysql_query("INSERT INTO funcionarios (nome,unidade,telefone,email,cargo) value ('$nome_db','$unidade_db','$telefone_db','$email_db','$cargo_db')") or die ("erro");
?>  <script language="javascript"> emailnexiste();  </script> <?php
} else {


?>

<script language="javascript">

emailexiste();







</script>
<?php }} ?>

</body>
</html>
