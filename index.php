<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>HotSite Modelo</title>
</head>

<body>

    <!-- import do cabeçalho -->
    <?php require_once 'cabecalho.php'; ?>

    <!-- import do banner da campanha -->
    <img src="assets/banner.png" alt="Banner da Campanha" class="banner-campanha">
    

    <div class="container">
        <nav class="menu">
            <button onclick="carregarSecao(this, 'conteudo/o-que-e.php')" class="menu-btn">O QUE É</button>
            <button onclick="carregarSecao(this, 'conteudo/perspectiva.php')" class="menu-btn">PERSPECTIVA</button>
            <button onclick="carregarSecao(this, 'conteudo/onde.php')" class="menu-btn">ONDE</button>
        </nav>
    </div>
        <img src="assets/hr-line.png" alt="Banner da Campanha" class="line">
    <div class="container">
        <div class="content">
            <section id="conteudo" class="secao"></section>
        </div>
    </div>
     
    
    <!-- script para selecionar a seção a ser mostrada no início -->
    <script>
    function carregarSecao(botao, nomeArquivo) {
        const area = document.getElementById('conteudo');
        area.innerHTML = "<p>Carregando...</p>";

        // Remove classe 'ativo' de todos os botões
        document.querySelectorAll('.menu button').forEach(btn => btn.classList.remove('ativo'));

        // Adiciona classe 'ativo' no botão clicado
        botao.classList.add('ativo');

        fetch(nomeArquivo + "?t=" + new Date().getTime())
        .then(response => response.text())
        .then(conteudo => {
            area.innerHTML = conteudo;
        })
        .catch(erro => {
            area.innerHTML = "<p>Erro ao carregar conteúdo.</p>";
            console.error(erro);
        });
    }

    // Quando a página carregar, seleciona o botão "O QUE É"
    document.addEventListener('DOMContentLoaded', () => {
        const primeiroBotao = document.querySelector('.menu button'); // O primeiro é "O QUE É"
        carregarSecao(primeiroBotao, 'conteudo/o-que-e.php'); // MUDAR DE ACORDO COM O PRIMEIRO BOTÃO DO MENU DA PÁGINA
    });
    </script>


</body>
</html>