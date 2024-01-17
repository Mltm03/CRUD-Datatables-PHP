<?php echo $this->extend('plantilla/sidebar');?>
<?php echo $this->section('contenido');?>
  <style>
    /* Estilos CSS */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #999;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #e1e1e1;
    }
  </style>
  <table>
    
    <caption>Ejemplo de Tabla</caption>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Correo Electrónico</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Persona 1</td>
        <td>25</td>
        <td>persona1@example.com</td>
      </tr>
      <tr>
        <td>Persona 2</td>
        <td>30</td>
        <td>persona2@example.com</td>
      </tr>
      <tr>
        <td>Persona 3</td>
        <td>22</td>
        <td>persona3@example.com</td>
      </tr>
    </tbody>
  </table>
  <?php echo $this->endSection();?>

