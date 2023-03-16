<?php


// Ascending Order
if(isset($_POST['ASC']))
{
    $asc_query = "Select SUM(cambiemos) as total_cambiemos, SUM(fuerza) as total_fuerza, SUM(frente) as total_frente from gobernador WHERE escuela = 'Cossio' ORDER BY total_cambiemos, total_fuerza, total_frente DESC;";
    $result = executeQuery($asc_query);
}

// Descending Order
elseif (isset ($_POST['DESC'])) 
    {
          $desc_query = "Select SUM(cambiemos) as total_cambiemos, SUM(fuerza) as total_fuerza, SUM(frente) as total_frente from gobernador WHERE escuela = 'Cossio' ORDER BY total_cambiemos, total_fuerza, total_frente DESC;";
          $result = executeQuery($desc_query);
    }
    
    // Default Order
 else {
        $default_query = "Select SUM(cambiemos) as total_cambiemos, SUM(fuerza) as total_fuerza, SUM(frente) as total_frente from gobernador WHERE escuela = 'Cossio' ORDER BY total_cambiemos, total_fuerza, total_frente DESC;";
        $result = executeQuery($default_query);
}


function executeQuery($query)
{
    $connect = mysqli_connect("localhost", "root", "", "Elecciones");
    $result = mysqli_query($connect, $query);
    return $result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP HTML TABLE ORDER DATA </title>
       <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
     
        <form action="busqueda.php" method="post">
         
          
         
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    
                </tr>
                <!-- populate table from mysql database -->
                <?php while ($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
     
    </body>
</html>
