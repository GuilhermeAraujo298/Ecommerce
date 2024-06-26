<?php
include_once "../BackEnd/sessao.php";
$db = getDb();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HomeCliente</title>
        <link rel="stylesheet" href="cliente.css">
        <link rel="stylesheet" href="../index.css">
        <script src="../BackEnd/script.js"></script>
    </head>
    <body>
        <!--Painel superior-->
        <div id="Top">
            <h1>Olá, seja bem vindo(a)</h1>
        </div>

        <!--Botão de menu (apenas para celulares-->
        <div class="topResponsivo">
            <button onclick="AbrirModal(fundoCliente,nav)" class="btnMenu"><img src="../Imagens/Icones/menu.png" alt="icone menu"></button>
            <h2><img src="../Imagens/Icones/flor.png" alt="icone flor"> ESPAÇO BELEZA ROSA <img src="../Imagens/Icones/flor.png" alt="icone flor"></h2>
        </div>

        <!--Nav com os links das pags do cliente-->
        <div id="nav" class="nav">
            <img onclick="FecharModal(fundoCliente,nav)" class="fecharMenu" src="../Imagens/Icones/Fechar2.png" alt="icone fechar">
            <h2 class="belezaRosa">BELEZA ROSA</h2>
            <img class="florResponsiva" src="../Imagens/Icones/rosa.png" alt="icone flor">
            <a href=""><img src="../Imagens/Icones/novidades.png" alt="icone novidades"> Novidades</a>
            <a href=""><img src="../Imagens/Icones/carrinho.png" alt="icone carrinho"> Carrinho</a>
            <a href=""><img src="../Imagens/Icones/comunicação.png" alt="icone comunicação">Comunicação</a>
            <button onclick="AbrirModal(HomeCliente,login)" href=""><img src="../Imagens/Icones/entrar.png" alt="icone entrar"> Login</button>
        </div>
        <div id="fundoCliente" class="fundoMenu"></div>

        <!--Filtro de produtos-->
        <form class="filtroProdutos">
            <select id="categorySelect" class="tipoProduto" name="categoria" oninput="getProductSuggestions()">
                <option value="">Geral</option>
                <?php
                $sql = "SELECT id, description_cat FROM category";
                $parametros = null;
                $result = $db->executar($sql, $parametros);
                foreach ($result as $categorias) {
                    $idCat = $categorias['id'];
                    $descCat = $categorias['description_cat'];
                    echo "<option value='$idCat'>$descCat</option>";
                }
                ?>
            </select>
            <input type="text" id="searchInput" class="nomeProduto" placeholder="Procura algo em específico ?" oninput="getProductSuggestions()">
            <div id="suggestions"></div>
        </form>

        <!--Produtos em exposição-->
        <div id="exposicao" class="exposição">
            <?php
            $sql = "SELECT id, prod_name, prod_value, url_img FROM products";
            $parametros = null;
            $result = $db->executar($sql, $parametros, true);
            foreach ($result as $produtos) {
                $idProd = $produtos['id'];
            ?>
                <div class="produto">
                    <img src="../Imagens/Produtos/<?= $produtos['url_img'] ?>" alt="exemplo img">
                    <div class="informações">
                        <h2><?= $produtos['prod_name'] ?></h2><span>?</span>
                        <h3>R$<?= $produtos['prod_value'] ?></h3><i>Compre já</i>
                        <span>-</span><button class="comprar">Adicionar ao carrinho <b>(0)</b></button><span>+</span>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!--Fundo para os modals-->
        <div style="display: none;" id="HomeCliente" class="fundoModal"></div>

        <!--Modal para login-->
        <form style="display: none;" id="login" class="modal" action="../BackEnd/login/validaLogin.php" method="POST">
            <img onclick="FecharModal(HomeCliente,login)" class="fecharModal" src="../Imagens/Icones/Fechar.png" alt="icone fechar">
            <h2><img src="../Imagens/Icones/flor.png" alt="icone flor"> Espaço beleza rosa <img src="../Imagens/Icones/flor.png" alt="icone flor"></h2>
            <img id="imgLogin" src="../Imagens/Icones/usuario.png" alt="icone usuario">
            <p>Faça login em sua conta</p>
            <input type="email" placeholder="E-mail" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input id="logar" type="submit" value="Login">
        </form>
        <?php
        if (isset($_GET['SUCESS']) && ($_GET['SUCESS'] == 11)) {
            echo '<script>';
            echo 'window.onload = function() {';
            echo '    AbrirModal(HomeCliente, tokenEmail);';
            echo '};';
            echo '</script>';
        ?>
            <form style="display: none;" id="tokenEmail" class="modal" action="../BackEnd/validaEmail/validaEmail.php" method="POST">
                <img id="fecharLogin" onclick="FecharModal(HomeCliente,tokenEmail)" class="fecharModal" src="../Imagens/Icones/Fechar.png" alt="icone fechar">
                <input type="codConfirm" placeholder="Código de confirmação" name="codConfirm">
                <input id="logar" type="submit" value="Login">
            </form>
        <?php
        }
        ?>

    <script src="../index.js"></script>
</body>

</html>