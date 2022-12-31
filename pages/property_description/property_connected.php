<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/property.css">
    <link rel="shortcut icon" href="/icon/logo.ico" type="image/x-icon">
    <title>E-RENT</title>
</head>
<body>
    <header class="header">
        <nav class="navBar limitContainer">
            <h1>E-RENT</h1>

            <a class="navItem" href="#about">Sobre</a>
            <a class="navItem" href="#">Locador</a>
            <a class="navItem" href="#">Ajuda</a>

            <div class="dropItem">
                <span><img class="userIcon" src="../../icon/user.png" alt="user"></span>
                <div class="dropItemContent">
                    <a class="opc" href="../property_description/property.php">Sair</a>
                </div>
            </div>
            
        </nav>
    </header>

    <main class="limitContainer">
        <?php
            require_once '../../classes/houseDAO.class.php';
            $id = $_GET['id'];
            $idLocatario = $_GET['idLocatario'];
            $idUsuario = $_GET['idUsuario'];
            
            $dao = new HouseDAO();
            $house = $dao->search($id)

        ?>
        
        <div class="containerProperty">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value['imagem']); ?>" alt="house" width=50%>

            <div class="cardInformation">
                <form action="../../database/houses/db_rent_house.php">
                    
                    <div class="data">
                        <li class="address"><?php echo $house['cidade'] ;?> - <?php echo $house['estado'] ;?></li>
                        <li class="address"><?php echo $house['bairro'] ;?></li>
                        <li class="address"><?php echo $house['rua'] ;?></li>
                        <li class="address">Número <?php echo $house['numero'] ;?></li>
                        <div class="bottomCard">
                            <li class="price">R$ <?php echo $house['valor'] ;?></li>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="idImovel" value="<?php echo $id; ?>">
                        <input type="hidden" name="idLocatario" value="<?php echo $idLocatario; ?>">
                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                        <button type="submit">ALUGAR</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="lineHorizontal"></div>

        <div class="description">
            <h2>Descrição</h2>
            <p>
                <?php echo $house['descricao'] ;?>
            </p>
        </div>
    </main>

    <footer class="footer" id="about">
        <p class="limitContainer">
            E-RENT IMOBILIÁRIA, somos uma empresa focada na disponibilização das melhores 
            ofertas de imóveis para aluguel e/ou vendas para nossos locatários. <br>
            Para nossos locadores oferecemos todo o suporte para o gerênciamento de seus imóveis
            Processos rápidos, transparentes e da melhor qualidade.
        </p>
        <p class="limit-container">Todos os direitos reservados a E-RENT IMOBILIÁRIA.</p>
    </footer>
</body>
</html>