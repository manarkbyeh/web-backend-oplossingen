<?php

function __autoload($class){
    if (file_exists('classes/'.$class.'.php')) {
        
        require_once('classes/'.$class.'.php');
    } else {
        throw new Exception('deze classe bestaat niet ');
    }
}

$percent = new Percent(150, 100);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <style>
      table,
      th,
      td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      
      th,
      td {
        padding: 5px;
        text-align: left;
      }
    </style>
  </head>

  <body>

    <h2>Hoeveel procent is 150 van 100?</h2>
    <table style="width:20%">
      <tr>
        <th>Absoluut:</th>
        <td><?= $percent->absolute ?></td>
      </tr>
      <tr>
        <th>Relatief:</th>
        <td><?= $percent->relative ?></td>
      </tr>
      <tr>
        <th >Geheel getal:</th>
        <td><?= $percent->hundred ?></td>
      </tr>
      <tr>
        <th >Nominaal:</th>
        <td><?= $percent->nominal ?></td>
      </tr>
    </table>

  </body>

  </html>