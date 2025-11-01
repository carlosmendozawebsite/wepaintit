<?php
// ⚙️ Configuración de conexión
$host = "localhost";   // igual que DB_HOST
$user = "root";        // igual que DB_USERNAME
$pass = "";        // igual que DB_PASSWORD
$db   = "atlas_1.0";   // igual que DB_DATABASE

$conn = new mysqli($host, $user, $pass, $db, 3306); // 3306 = DB_PORT
if ($conn->connect_error) {
    die("❌ Error al conectar: " . $conn->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos.<br>";
}

// Consulta para obtener todas las traducciones en inglés
$sql = "
    SELECT t.`key`, t.`value`
    FROM translations t
    JOIN languages l ON l.id = t.language_id
    WHERE l.code = 'en'
";
$result = $conn->query($sql);

$translations = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $translations[$row['key']] = $row['value'];
    }
}

// Crear archivo JSON
$file = __DIR__ . "/translations.json";
file_put_contents($file, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "✅ Archivo creado: translations.json";

$conn->close();
