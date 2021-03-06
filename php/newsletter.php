<?php

// Check for empty fields
    function notificarEmail(){
        $conexao = abrirConexao();
        $id = selectUltimaNoticia();
        $posts = select('noticia', 'id = '.$id['ultima']);
        foreach ($posts as $p){
            $noticia = array ('id' => $p['id'], 'titulo' => $p['titulo']);
        }
        $usuarios = select('usuario', 'ativo = 1 AND admin = 1');
        foreach ($usuarios as $u){
            // Create the email and send the message
            $to = $u['email']; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
            $email_subject = "Raio-X: Nova postagem no site";
            $email_body = '<font color="black">Olá, '.$u['nome'].'! Há uma nova postagem no site:<br><h4>'.$p['titulo'].'</h4></font><a href="http://growupweb.com.br/Raio-X/news.php?n='.$p['id'].'" class="btn btn-success pull-right font-weight-bold" title="Clique para acessar a notícia">Ver notícia na íntegra</a><br><br>Caso não esteja conseguindo clicar no link acima, copie e cole este endereço no seu navegador: http://growupweb.com.br/Raio-X/news.php?n='.$p['id'].'<hr><br>Raio-X, a notícia do jeito certo. 2019';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "From: Newsletter - Raio-X <notificacoes@raiox.com>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
            $headers .= "Content-Type: text/html\n";
            mail($to,$email_subject,$email_body,$headers);
        }
        fecharConexao($conexao);
    }
?>