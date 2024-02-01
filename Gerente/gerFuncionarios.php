<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar funcionarios</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="gerente.css">
</head>
<body>

    <!--Div contendo o painel de funcionários, divididos em ativos e inativos-->
    <!--
    para organizar os funcionários com php, retorne dentro de ativos e inativos 
    com a seguinte organização: 

        <p>
            <span>Teste2</span>
            <button onclick="AbrirModal(GerFuncionarios,editarFuncionario)" style="background-color: #8b0d96;">Editar</button>
            <button>"Desativar" quando estiver nos ATIVOS e "Reativar" quando estiver nos INATIVOS</button>
        </p>

    OBS: quando um funcionário estiver desativado, ele deve perder acesso ao sistema
    -->
    <div id="funcionarios">
        <h2> <img src="../Imagens/Icones/funcionarios.png" alt="icone funcionários">Funcionários</h2>
        <div id="ativos">
            <p><span>Teste1 ...max 40 caracteres</span><button onclick="AbrirModal(GerFuncionarios,editarFuncionario)" style="background-color: #8b0d96;">Editar</button><button>Desativar</button></p>
        </div>
        <div id="inativos">
            <p><span>Teste7</span><button onclick="AbrirModal(GerFuncionarios,editarFuncionario)" style="background-color: #8b0d96;">Editar</button><button>Reativar</button></p>
        </div>
    </div>

    <!--Formulário de cadastro de novos funcionários + botão de analisar currículos-->
    <!--
        OBS: 

        Max de caracteres para nome: 20

        Max de caracteres para sobrenome: 20

        Max de caracteres para CPF: 11

        A nova senha deve conter no mínimo 8 caaracteres,
        pelo menos 1 caractere especial e pelo menos 1 número.

        O campo CONFIRME A NOVA SENHA, deve conter valor igual
        ao campo NOVA SENHA

    -->
    <div class="right">
        <button onclick="AbrirModal(GerFuncionarios,analisarCurriculos)" id="analisar">Analisar currículos</button>
        <form action="../BackEnd/cadastroFunc/processCadastroFunc.php?solicitaCad" method="POST">
            <h2><img src="../Imagens/Icones/pessoaMais.png" alt="icone adicionar pessoa"> Cadastrar novo funcionário</h2>
            <input type="text" placeholder="Nome" name="nome">
            <input type="text" placeholder="Sobrenome" name="sobrenome">
            <input type="text" placeholder="CPF" name="cpf">
            <input type="text" placeholder="Logradouro" name="logradouro">
            <input type="text" placeholder="Número" name="numero">
            <input type="text" placeholder="Bairro" name="bairro">
            <input type="date" name="dtNasc">
            <input type="text" placeholder="Telefone" name="telefone">
            <input type="email" placeholder="Email" name="email">
            <input type="date" name="dtRegistro">
            <input type="password" placeholder="Nova senha" name="senha">
            <input type="password" placeholder="Confirme a nova senha" name="confirmaSenha">
            <input id="CadFuncionario" type="submit" value="Cadastrar">
        </form>
    </div>

    <!--Fundo para os modais-->
    <div style="display: none;" id="GerFuncionarios" class="fundoModal"></div>
    
    <!--Modal para edição de funcionários-->
    <div style="display: none;" class="modal" id="editarFuncionario">
        <img onclick="FecharModal(GerFuncionarios,editarFuncionario)" class="fecharModal" src="../Imagens/Icones/Fechar.png" alt="icone fechar">
        <h3>Nome do funcionario</h3>
       <form id="Edição">
            <input type="text" placeholder="Mudar endereço">
            <input type="text" placeholder="Mudar Telefone">
            <input type="password" placeholder="Mudar senha">
            <input type="password" placeholder="Confirmar nova senha">
            <input id="edtFunc" style="background-color: #a3015a;color: white;height: 10vh;font-size: 20px;" type="submit" value="Atualizar">
       </form>
    </div>

    <!--Modal para análise de currículos-->
    <!--
    Não precisa habilitar por enquanto, vamos dar prioridade aos requisitos
    do dia 8 de fevereiro
    -->
    <div style="display: none;" id="analisarCurriculos" class="modal">
        <img onclick="FecharModal(GerFuncionarios,analisarCurriculos)" class="fecharModal" src="../Imagens/Icones/Fechar.png" alt="icone fechar">
        <h2><img src="../Imagens/Icones/curriculo.png" alt="icone curriculos"> Currículos</h2>
        <div class="curriculo">
            <h3>Nome + Sobrenome</h3>
            <p><span>Endereço:</span> Endereço</p>
            <p><span>Data de nascimento:</span> Data de nascimento</p>
            <p><span>Telefone:</span> Telefone</p>
            <p><span>Objetivo</span> Objetivo Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque laboriosam dolorem facere provident praesentium magni quae blanditiis asperiores itaque recusandae possimus nisi, nemo perferendis, dolore obcaecati, mollitia molestiae fugit.</p>
            <p><span>Habilidades</span> Habilidades Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum libero ipsam aliquam sunt inventore. Saepe asperiores, voluptas voluptate aliquam, harum aspernatur pariatur in enim ab explicabo quo repudiandae excepturi cupiditate.</p>
           <div class="interagir"> <button class="aceitar"><img src="../Imagens/Icones/aceitar.png" alt="icone aceitar"> Aceitar</button><button class="excluir"><img src="../Imagens/Icones/lixeira.png" alt="icone lixeira"> Excluir</button></div>
        </div>
        <div class="curriculo">
            <h3>Nome + Sobrenome</h3>
            <p><span>Endereço:</span> Endereço</p>
            <p><span>Data de nascimento:</span> Data de nascimento</p>
            <p><span>Telefone:</span> Telefone</p>
            <p><span>Objetivo</span> Objetivo Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque laboriosam dolorem facere provident praesentium magni quae blanditiis asperiores itaque recusandae possimus nisi, nemo perferendis, dolore obcaecati, mollitia molestiae fugit.</p>
            <p><span>Habilidades</span> Habilidades Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum libero ipsam aliquam sunt inventore. Saepe asperiores, voluptas voluptate aliquam, harum aspernatur pariatur in enim ab explicabo quo repudiandae excepturi cupiditate.</p>
            <div class="interagir"> <button class="aceitar"><img src="../Imagens/Icones/aceitar.png" alt="icone aceitar"> Aceitar</button><button class="excluir"><img src="../Imagens/Icones/lixeira.png" alt="icone lixeira"> Excluir</button></div>
        </div>
        <div class="curriculo">
            <h3>Nome + Sobrenome</h3>
            <p><span>Endereço:</span> Endereço</p>
            <p><span>Data de nascimento:</span> Data de nascimento</p>
            <p><span>Telefone:</span> Telefone</p>
            <p><span>Objetivo</span> Objetivo Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium eaque laboriosam dolorem facere provident praesentium magni quae blanditiis asperiores itaque recusandae possimus nisi, nemo perferendis, dolore obcaecati, mollitia molestiae fugit.</p>
            <p><span>Habilidades</span> Habilidades Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum libero ipsam aliquam sunt inventore. Saepe asperiores, voluptas voluptate aliquam, harum aspernatur pariatur in enim ab explicabo quo repudiandae excepturi cupiditate.</p>
            <div class="interagir"> <button class="aceitar"><img src="../Imagens/Icones/aceitar.png" alt="icone aceitar"> Aceitar</button><button class="excluir"><img src="../Imagens/Icones/lixeira.png" alt="icone lixeira"> Excluir</button></div>
        </div>
    </div>

    <script src="../index.js"></script>
</body>
</html>