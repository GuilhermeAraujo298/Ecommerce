<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeCliente</title>
    <link rel="stylesheet" href="cliente.css">
    <link rel="stylesheet" href="../index.css">
</head>
<body>

    <!--Painel superior-->
    <div id="Top">
        <h1>Olá, seja bem vindo(a)</h1>
    </div>

    <!--Nav com os links das pags do cliente-->
    <div class="nav">
        <a href=""><img src="../Imagens/Icones/novidades.png" alt="icone novidades"> Novidades</a>
        <a href=""><img src="../Imagens/Icones/carrinho.png" alt="icone carrinho"> Carrinho</a>
        <a href=""><img src="../Imagens/Icones/comunicação.png" alt="icone comunicação">Comunicação</a>
        <button onclick="AbrirModal(HomeCliente,login)" href=""><img src="../Imagens/Icones/entrar.png" alt="icone entrar"> Login</button>
    </div>

    <!--Filtro de produtos-->
    <form id="filtro">
        <select id="tipo" name="" id="">
            <option value="">Geral</option>
        </select>
        <input id="pesquisa" type="text" placeholder="Procura algo em específico ?">
        <input id="filtrar" type="submit" value="Filtrar">
    </form>

    <!--Paineis dos produtos-->
    <div class="prateleira">
        <div class="produto">
            <h3>Nome do produto</h3>
            <img src="../Imagens/Fundos/fundoPrincipal.jpg" alt="icone exemplo">
            <p>Descrição do produto Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque deserunt tempora, iure libero nihil quis reiciendis perferendis cupiditate itaque, dignissimos veniam magni similique fuga ex labore doloribus</p>
            <h4>Preço</h4>
            <div class="comprar">
                <span>-</span><button>Adicionar ao carrinho (0)</button><span>+</span>
            </div>
        </div>
        <div class="produto">
            <h3>Sabonete Facial Melu Uva</h3>
            <img src="../Imagens/Produtos/Teste1.jpg" alt="icone exemplo">
            <p>O Sabonete Facial Melu by Ruby Rose Uva é um produto de alta qualidade que oferece limpeza profunda e hidratação para a pele. O extrato de uva é rico em antioxidantes, que ajudam a proteger a pele dos danos causados pelos radicais livres.</p>
            <h4>R$ 00,00</h4>
            <div class="comprar">
                <span>-</span><button>Adicionar ao carrinho (0)</button><span>+</span>
            </div>
        </div>

    </div>

    <!--Fundo para os modals-->
    <div style="display: none;" id="HomeCliente" class="fundoModal"></div>

    <!--Modal para login-->
   <form style="display: none;" id="login" class="modal" action="../BackEnd/login/validaLogin.php" method="POST">
     <img onclick="FecharModal(HomeCliente,login)" class="fecharModal" src="../Imagens/Icones/Fechar.png" alt="icone fechar">
     <h2><img src="../Imagens/Icones/flor.png" alt="icone flor"> Espaço beleza rosa <img src="../Imagens/Icones/flor.png" alt="icone flor"></h2>
     <img id="loginImg" src="../Imagens/Icones/usuario.png" alt="icone usuario">
     <p>Faça login em sua conta</p>
     <input type="email" placeholder="E-mail" name="email">
     <input type="password" placeholder="Senha" name="senha">
     <input id="logar" type="submit" value="Login">
   </form>

    <script src="../index.js"></script>
</body>
</html>