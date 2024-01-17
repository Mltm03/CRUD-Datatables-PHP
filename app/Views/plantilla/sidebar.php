<!-- hacer un sidebar -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de registros</title>
   
    
    <!-- plugin datatables -->
    <link href="public/plugins/DataTables-1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="public/plugins/Buttons-2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <!-- font--awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <!-- <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script> nota:no se porque quedo el delineado del sidebar -->
    <link rel="stylesheet" href="public/css/sidebarstyle.css">
    
        
</head>
<?php echo $this->renderSection("contenido");?>
<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">
        <div class="name__page">
            <i class="fab fa-youtube"></i>
            <h4>Proyecto CRUD</h4>
        </div>

        <div class="options__menu">
            
            <a href="<?=base_url()?>/" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="<?=base_url()?>/tablas">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Modulo1(Tablas)</h4>
                </div>
            </a>
            <a href="<?=base_url()?>/registros">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Modulo2(Formulario)</h4>
                </div>
            </a>
        </div>
    </div>
    <script src="public/JS/sidebar.js"></script>
    
    
