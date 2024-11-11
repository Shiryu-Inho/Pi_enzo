<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #1C1F26;
        color: #FFFFFF;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .navbar {
      display: flex;
      justify-content: center;
      background-color: #282C34;
      width: 2000px;
    }

    .navbar button {
      border: none;
      padding: 30px 50px;
      width: 310px;
      cursor: pointer;
      font-size: 1rem;
    }
    
    .navbar .black {
        background-color: #182527;
        color: #FFFFFF;
    }

    .navbar .green {
        background-color: #00FF9D;
        color: #1C1F26;
    }

    .navbar .black:hover {
        background-color: #333333;
    }

    .navbar .green:hover {
        background-color: #00ff9dcf;
    }

    .profile {
        display: flex;
        flex-direction: column;
        align-items: left;
        margin-top: 20px;
    }

    .profile-pic {
        position: relative;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .camera-icon {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background-color: #1C1F26;
        color: #FFFFFF;
        padding: 5px;
        border-radius: 50%;
        font-size: 1.2rem;
    }

    h2 {
        margin-top: 10px;
        font-size: 1.5rem;
    }

    .profile p {
        margin-top: 5px;
        font-size: 1rem;
        color: #AAAAAA;
    }

    .edit-icon {
        font-size: 1rem;
        cursor: pointer;
    }

    .profile-info {
        background-color: #2A2E35;
        padding: 20px;
        margin-top: 20px;
        width: 80%;
        max-width: 500px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .info-item {
        display: flex;
        align-items: center;
        font-size: 1.2rem;
        color: #00FF9D;
    }

    .icon {
        margin-right: 10px;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .navbar button {
            padding: 30px;
            font-size: 0.9rem;
        }

        .profile h2 {
            font-size: 1.3rem;
        }

        .profile-info {
            width: 90%;
        }
    }

    @media (max-width: 480px) {
        .navbar button {
            padding: 10px;
            font-size: 0.8rem;
        }

        .profile-pic {
            width: 80px;
            height: 80px;
        }

        h2 {
            font-size: 1.2rem;
        }

        .profile-info {
            padding: 15px;
            width: 95%;
        }

        .info-item {
            font-size: 1rem;
        }
    }
  </style>
</head>
<body>
  <header>
      <nav class="navbar">
          <button class="black">EDITAR PERFIL</button>
          <button class="green">HOME</button>
          <button class="black">NOTIFICAÇÕES</button>
          <button class="green">SEGUINDO</button>
          <button class="black">PERGUNTAS</button>
      </nav>
  </header>
  <main>
      <section class="profile">
          <div class="profile-pic">
              <img src="user-placeholder.png" alt="Foto do usuário">
              <span class="camera-icon">&#128247;</span>
          </div>
          <h2>Username</h2>
          <p>Escreva uma descrição sobre você mesmo <span class="edit-icon">&#9998;</span></p>
      </section>
      <section class="profile-info">
          <div class="info-item">
              <span class="icon">&#x1F393;</span> ESTUDANTE ...
          </div>
          <div class="info-item">
              <span class="icon">&#x1F4CD;</span> LOCAL ...
          </div>
          <div class="info-item">
              <span class="icon">&#x1F4C5;</span> QUANDO ENTROU ...
          </div>
      </section>
  </main>
</body>
</html>
