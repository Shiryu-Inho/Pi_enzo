<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect-IF</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Logo no canto superior esquerdo -->
    <div class="logo-container">
        <img src="LOGO CONNECT IF.png" alt="Logo Connect" class="logo">
    </div>

    <!-- Seção Tela inicial -->
    <section class="info-section-1">
        <div class="content-middle">
            <div class="Texto">
                <p>Não é Apenas Uma<br>Rede Social. <br> É o Seu Futuro.</p>
            </div>
            <button class="btn-1" onclick="window.location.href='Login.php'">Comece Já</button>
            <button class="btn-1" onclick="window.location.href='#quem-somos'">Saiba Mais</button>
        </div>
    </section>

    <!-- Seção Quem Somos -->
    <section id="quem-somos" class="info-section-2">
        <div class="quem-somos-content">
            <h1>Quem Somos</h1>
            <div class="quem-somos-cards">
                <div class="card">
                    <h2>Nossa Missão</h2>
                    <p>Nossa missão é unir estudantes de todas as disciplinas em um só lugar, criando uma rede onde o aprendizado é compartilhado e todos podem contribuir. Queremos que cada estudante se sinta parte de uma comunidade, onde o apoio mútuo e a colaboração são a base para o sucesso acadêmico.</p>
                </div>
                <div class="card">
                    <h2>O Que Oferecemos</h2>
                    <p>Oferecemos uma plataforma onde você pode se conectar com colegas, participar de comunidades específicas para cada matéria e trocar ideias sobre temas de interesse. Além disso, você tem a liberdade de criar suas próprias comunidades, adaptando o espaço às suas necessidades e interesses.</p>
                </div>
                <div class="card">
                    <h2>Nosso Compromisso</h2>
                    <p>Estamos comprometidos em proporcionar um ambiente seguro e inclusivo, onde todos os estudantes se sintam à vontade para expressar suas opiniões e compartilhar conhecimentos. Valorizamos a diversidade e a troca de experiências, acreditando que o crescimento acadêmico acontece de forma mais eficaz quando todos têm voz e espaço para contribuir.</p>
                </div>
            </div>
        </div>
    </section>
<!-- Seção de Anúncio -->
<section id="anuncio" class="anuncio-section">
    <div class="anuncio-content">
        <h2>Fique por dentro das últimas atualizações e novidades do Connect IF! Não perca as oportunidades de conectar-se com outros alunos e compartilhar conhecimento.</h2>
        <button onclick="window.location.href='login.php'" class="btn-anuncio">Comece Já</button>
    </div>
</section>
<div class="footer-info">
    <p>Português (Brasil) | Email: connectif@gmail.com | Instagram: @connect_if</p>
    <p>©2024 | Connect IF – IFBA – Instituto Federal de Educação, Ciência e Tecnologia da Bahia – Campus Eunápolis</p>
</div>
</body>
</html>