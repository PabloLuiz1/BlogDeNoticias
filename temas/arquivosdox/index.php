<!DOCTYPE HTML>
<?php 
    require '../../php/conexao.php';
    require '../../php/gerenciaBd.php';

    $noticias = selectNoticiaSeis("tbnoticia.ativo = 1 AND estado = 'Arquivos do X'");

    $numeromeses = array (
        1 => selectQtdPorMes('2019', '1', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '2', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '3', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '4', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '5', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '6', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '7', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '8', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '9', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '10', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '11', "estado = 'Arquivos do X'")['total'],
        selectQtdPorMes('2019', '12', "estado = 'Arquivos do X'")['total']
    );
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Raio-X | Arquivos do X</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="../../images/favicon.png"/>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </head>
<body>
    <div class="container-fluid p-0">
        <header id="arquivosdox">
            <nav style="margin-top: 20%;" class="pt-0 pb-0 navbar navbar-expand-sm bg-gray navbar-light justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../../index.php">Início</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Noticias
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="#">Arquivos do X</a>
                            <a class="dropdown-item" href="../lazer">Lazer</a>
                            <a class="dropdown-item" href="../politica">Política</a>
                            <a class="dropdown-item" href="../saude">Saúde</a>
                            <a class="dropdown-item" href="../mundo">Mundo</a>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../about.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../contact.php">Contato</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../login.php">Logar</a>
                    </li>
                </ul>
                <figure class="float-left p-0 mx-auto figure-header">
                    <a href="index.php">
                        <img src="../../images/logo.jpeg" class="img-responsive">
                    </a>
                </figure>
                    
            </nav>
        </header>
                <div class="col-md-8 float-left mt-2 ml-4 mr-3">
                    <h2 class="col-md-12 border-bottom border-secondary">Arquivos do X</h2>
                    Canal que visa relatar as verdades, as covardias, os abusos e injustiças cometidos contra os reeducandos em todo o Brasil.
Noticias abastecidas com credibilidade com fontes seguras, "familiares" dos reeducandos que nos procuram e relatam os ocorridos.
                    <ul class="nav nav-pills">
                        <?php
                            if (!$noticias){
                                echo ("Não há notícias recentes.");
                            }
                            else{
                                foreach ($noticias as $n){
                                    echo ('<div class="col-md-4 float-left calibri-12 mr-3">');
                                        echo ('<div class="nav-item mb-5 p-0">');
                                            echo ('<a class="nav-link text-center p-0r" href="../../news.php?n='.$n['idnoticia'].'" title="Ver a postagem">');
                                                echo ('<img class="img-fluid rounded" src="../../uploaded/'.$n['imagem'].'">');
                                                echo ($n['titulo']);
                                            echo ('</a>');
                                            echo ('<strong>estado: </strong> '.$n['estado'].'<br> <strong>Autor: </strong>'.$n['nomeusuario'].' 
                                            <br> <strong>Publicação: </strong>'.$n['dat'].'
                                            <br> <a class="p-0 nav-link text-center" href="../../news.php?n='.$n['idnoticia'].'#comments" title="Ver os comentários desta postagem">
                                            <strong>Comentários <i class="fa fa-comment fa-sm"></i></strong></a>');
                                        echo ('</div>');
                                    echo ('</div>');
                                }
                            }
                        ?>
                    </ul>
                    <br><br><br><br><br><br>
                </div>
                <div class="col-md-3 float-left mt-2 p-0 ml-5">
                    <h3>Arquivo</h3>
                    <div id="accordion">
                            <div class="card">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <div class="card-header">
                                2019
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-group">
                                    <?php 
                                            $nomemeses = array (
                                                1 => 'Janeiro',
                                                'Fevereiro',
                                                'Março',
                                                'Abril',
                                                'Maio',
                                                'Junho',
                                                'Julho',
                                                'Agosto',
                                                'Setembro',
                                                'Outubro',
                                                'Novembro',
                                                'Dezembro'
                                            );

                                            for ($i = 1; $i < 13; $i++){
                                                echo ('<a href="../../news.php?m='.$i.'&a=2019&t=Arquivos do X" class="li-hover list-group-item d-flex justify-content-between align-items-center">
                                                    '.$nomemeses[$i].'
                                                    <span class="badge badge-primary badge-pill">');
                                                    echo ($numeromeses[$i]." </span>");
                                                echo ('</a>');
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <br><br><br><br><br><br><br><br><br><br><br>            <br><br><br><br><br><br><br><br><br><br><br>
        <footer>
            <div class="row">
                <div class="col-sm-4 col-footer">
                    <a href="index.php">
                        <img src="../../images/logotipo.jpeg" class="img-responsive"> Raio-X
                    </a>
                </div>
                <div class="col-sm-4 col-footer"><a href="#" target="_blank" title="Página oficial no Facebook" alt="Link externo que redireciona a pagina oficial no Facebook do Raio-X"><i class="fab fa-facebook fa-lg"></i> Blog de Notícias</a>
                </div>
                <div class="col-sm-4 col-footer"><a href="mailto:contato@raio-x.com" target="_blank" title="E-mail para contato" alt="Link externo que aciona a ação de enviar e-mail">
                    <i class="fa fa-envelope fa-lg"></i>contato@raio-x.com</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-footer"><a href="callto:+5511912345678" target="_blank" title="WhatsApp para contato" alt="Link externo que aciona a ação de adicionar contato">
                    <i class="fab fa-whatsapp-square fa-lg"></i>+55 11 91234-5678</a></div>
                <div class="col-sm-4 col-footer"> <a href="#" target="_blank" title="Canal no YouTube" alt="Link externo que redireciona ao canal do YouTube do Raio-X">
                    <i class="fab fa-youtube fa-lg"></i>/Raio-X</a>
                </div>
                <div class="col-sm-4 col-footer">
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-sm-4 ml-5 "></div>
                <div class="col-sm-3"><span class="copyright">Raio-X, a verdade sobre o sistema prisional brasileiro, 2019.
                    <i class="fa fa-copyright fa-lg"></i></span></div>
            </div>
        </footer>
    </div>
</body>