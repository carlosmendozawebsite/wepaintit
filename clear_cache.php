<?php
try {
    echo "<pre>Limpiando cachés de Laravel...\n";
    echo shell_exec('php artisan cache:clear');
    echo shell_exec('php artisan config:clear');
    echo shell_exec('php artisan route:clear');
    echo shell_exec('php artisan view:clear');
    echo shell_exec('php artisan optimize:clear');
    echo "\n✔️ Caché limpiada correctamente.</pre>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
