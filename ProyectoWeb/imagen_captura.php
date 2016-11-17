<?php
if (isset($_FILES["file-captura1"]))
{
    if (isset($_FILES["file-captura1"]))
    {
        $file = $_FILES["file-captura1"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "img/capturas/";

        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          echo "Error, el archivo no es una imagen"; 
        }


        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo $src;
        }
    }
    else{
        echo "No hay archivo";
    }
}
if (isset($_FILES["file-captura2"]))
{
    if (isset($_FILES["file-captura2"]))
    {
  
        $file = $_FILES["file-captura2"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "img/capturas/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          echo "Error, el archivo no es una imagen"; 
        }
       
        
        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo $src;
        }
    }else{
        echo "No hay archivo";
    }
}
if (isset($_FILES["file-captura3"]))
{
     if (isset($_FILES["file-captura3"]))
    {   
        $file = $_FILES["file-captura3"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "img/capturas/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          echo "Error, el archivo no es una imagen"; 
        }
       
        
        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo $src;
        }
    }else{
        echo "No hay archivo";
    }
}
if (isset($_FILES["file-captura4"]))
{
    if (isset($_FILES["file-captura4"]))
    {
        $file = $_FILES["file-captura4"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "img/capturas/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          echo "Error, el archivo no es una imagen"; 
        }
       
        
        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo $src;
        }
    }else{
        echo "No hay archivo";
    }
}
?>