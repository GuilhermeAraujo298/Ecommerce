<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="gerente.css">
</head>

<body>
    <!--Cadastro de produtos-->
    <!--
        OBS:
        max de caracteres para o nome  do produto é: 22
        max de caracteres para a descrição é: 250
        max de caracteres para preço é: 10
        quando a checkBox NOVIDADE estiver marcada durante o caddastro, 
        o produto ir-a aparecer em uma tabela novidades por 30 dias
    -->
    <form class="cadProduto">
        <h2><img src="../Imagens/Icones/compra.png" alt="icone de compra"> Novo produto <img src="../Imagens/Icones/compra.png" alt="icone compra"></h2>
        <input type="text" placeholder="Nome do produto" name="nomeProd">
        <textarea cols="100%" rows="5" placeholder="Descrição do produto" name="descProd"></textarea>
        <input type="file" name="imgProd">
        <input type="text" placeholder="URL da imagem">
        <input type="text" placeholder="Valor do produto">
        <div class="comLeg">
            <label for="">Categoria</label>
            <select>
                <option value="">Geral</option>
            </select>
        </div>
        <div class="comLeg">
            <input type="checkbox" name="novidade">
            <label for="">Novidade</label>
        </div>
        <input style="background-color: #a3015a;color: white;padding: 1%;" type="submit" value="Cadastrar">
    </form>
    <script src="../index.js"></script>
</body>

</html>