<?php
// nombre del archivo que contiene los asistentes
$archivo = "asistentes.txt";
try {
    // Verifica si el archivo existe
    if (!file_exists($archivo)) {
        throw new Exception("El archivo no existe.");
    }
    // Abrir el archivo para lectura
    $fp = fopen($archivo, "r");
    // Si no se pudo abrir el archivo, lanzamos una excepción
    if (!$fp) {
        throw new Exception("No se pudo abrir el archivo para lectura.");
    }
    
    // Abrir la lista ordenada
    echo "<ol>";
    
    // Leer el archivo línea por línea y mostrar los nombres
    while (!feof($fp)) {
        // Leemos una línea del archivo
        $linea = fgets($fp);
        // htmlspecialchars() para evitar problemas de seguridad con HTML
        $linea = trim($linea);
        if ($linea !== "") { // evitar mostrar líneas vacías
            echo "<li>" . htmlspecialchars($linea) . "</li>";
        }
    }
    
    // Cerrar la lista ordenada
    echo "</ol>";
    
    fclose($fp);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
