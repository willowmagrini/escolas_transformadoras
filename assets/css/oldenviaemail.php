<html><head>
	
</head>
<body>
<?php
	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
	
	$nome = $_POST['nome'];//nome
	$email = $_POST['email'];//email
	$telefone = $_POST['telefone'];//tel
	$empresa  = $_POST['empresa'];//empresa
	$mensagem1 = $_POST['mensagem'];// mensagem
	$landing = $_POST['landing'];// de qual landing page veio
	$headers .= "From: contato@registreasuamarca.com.br"."\r\n"; //E-mail do remetente

	$emaildestino= "brmagrini@gmail.com";
	
	$mensagem = "Mensagem de: " . $nome . "\n\nTelefone: " . $telefone . "\n\n Empresa: " . $empresa . "\n\n Mensagem: " . $mensagem1." \n\n Landing page:".$landing;
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $messagem = wordwrap($mensagem, 70);
    // send mail
	
	if  (mail("brmagrini@gmail.com", $empresa, $mensagem, $headers, "-r". "contato@registreasuamarca.com.br")){
		echo "<div>Sua Mensagem</div><div>".$mensagem."</div>";	   	
	}
	else{
		echo "nada feito";
	}
?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-53750490-1', 'example.com');
ga('require', 'displayfeatures');
ga('send', 'pageview');
</script>
</body>
</html>
