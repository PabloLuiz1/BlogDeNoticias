<!DOCTYPE HTML>
<?php 
    require 'php/gerenciaBd.php';
    require 'php/conexao.php';
    
    $key = "";
    if ($_GET['k']) {
        $key = $_GET['k'];
    
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Raio-X | Logar</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function validarSenhaNova(senha){
                if (senha.length > 0 && senha.length < 6){
                    document.getElementById('errosenha').classList.remove('d-none');
                    document.getElementById('errosenha').classList.add('d-block');
                    document.getElementById('confirmarsenha').value = '';
                    document.getElementById('confirmarsenha').disabled = true;
                    return false;
                }
                else if (senha.length == 0){
                    document.getElementById('errosenha').classList.remove('d-block');
                    document.getElementById('errosenha').classList.add('d-none');
                    document.getElementById('erroconfirmarsenha').classList.remove('d-block');
                    document.getElementById('erroconfirmarsenha').classList.add('d-none');
                    document.getElementById('confirmarsenha').value = '';
                    document.getElementById('confirmarsenha').disabled = true;
                    return false;
                }
                else{
                    document.getElementById('errosenha').classList.remove('d-block');
                    document.getElementById('errosenha').classList.add('d-none');
                    document.getElementById('confirmarsenha').disabled = false;
                    return true;
                }
                return true;
            }

            function validarConfirmacaoSenha(senha, confirmarsenha){
                if (validarSenhaNova(senha) == true){
                    if (senha != confirmarsenha)
                    {
                        document.getElementById('erroconfirmarsenha').classList.remove('d-none');
                        document.getElementById('erroconfirmarsenha').classList.add('d-block');
                        document.getElementById('salvar').disabled = true;
                        return false;
                    }
                    else{
                        document.getElementById('erroconfirmarsenha').classList.remove('d-block');
                        document.getElementById('erroconfirmarsenha').classList.add('d-none');
                        document.getElementById('salvar').disabled = false;
                        return true;
                    }
                }
                else{
                    document.getElementById('erroconfirmarsenha').classList.remove('d-block');
                    document.getElementById('erroconfirmarsenha').classList.add('d-none');
                }
                return false;
            }

            function validarFormulario(){
                if (document.getElementById('erroconfirmarsenha').classList.contains('d-block') || 
                document.getElementById('errosenha').classList.contains('d-block')){
                    
                }
            }


        </script>
    </head>
<body>
    <div class="container-fluid p-0">
        <header>
        <nav style="margin-top: 0%;" class="pt-0 pb-0 navbar navbar-expand-sm bg-gray navbar-light justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Início</a>
                    </li>
                    
                    
                </ul>
                <figure class="float-left p-0 mx-auto figure-header">
                    <a href="index.php">
                        <img src="images/logo.jpeg" class="img-responsive">
                    </a>
                </figure>
                    
            </nav>
        </header>
        <div class="container-fluid min-height-486">
            <div class="col-md-1 float-left mt-2 ml-4 mr-3"></div>
            <div class="col-md-3 float-left mt-2 p-0">
                <form action="php/set-nova-senha.php" onsubmit="validarFormulario()" class="form-login" method="POST">
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                    <div class="title-form-login">
                        Escolher uma nova senha
                    </div>
                    <div class="form-group" style="padding-left: 20%; padding-right: 20%; padding-top: 5%;">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="login" class="form-control" placeholder="Login" required>
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 20%; padding-right: 20%;">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="senhanova" id="senhanova" onkeyup="validarSenhaNova(this.value)" class="form-control" placeholder="Nova senha" required>
                            <div id="errosenha" class="d-none mt-2 col-sm-12 alert alert-danger">
                                A senha precisa ter no mínimo 6 caracteres.
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 20%; padding-right: 20%;">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="confirmarsenha" id="confirmarsenha" onkeyup="validarConfirmacaoSenha(document.getElementById('senhanova').value, this.value)" class="form-control" placeholder="Confirmar nova senha" required disabled>
                            <div id="erroconfirmarsenha" class="d-none mt-2 col-sm-12 alert alert-danger">
                                Confirme corretamente a nova senha.
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 17%; padding-right: 17%;">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-success pull-right mb-4 font-weight-bold" name="salvar" id="salvar" value=" Salvar " disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php 
        }else{
            header ("Location: error.php");
        }
        ?>
        <footer>
        <div class="row">
                <div class="col-sm-4 col-footer">
                    <a href="index.php">
                        <img src="images/logotipo.jpeg" class="img-responsive"> Raio-X
                    </a>
                </div>
                <div class="col-sm-4 col-footer"><a href="#" target="_blank" title="Página oficial no Facebook" alt="Link externo que redireciona a pagina oficial no Facebook do Raio-X"><i class="fab fa-facebook fa-lg"></i> Raio-X</a>
                </div>
                <div class="col-sm-4 col-footer"><a href="mailto:contato@raio-x.com" target="_blank" title="E-mail para contato" alt="Link externo que aciona a ação de enviar e-mail">
                    <i class="fa fa-envelope fa-lg"></i>contato@raiox.com</a>
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