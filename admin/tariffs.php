<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch tariffs with destinations
$stmt = $pdo->query("SELECT t.id, t.tariff, d.destination_name FROM tariffs t LEFT JOIN destinations d ON t.destination_id = d.id");
$tariffs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Manage Tariffs</h1>

    <a href="tariff_add.php" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Tariff</a>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Destination</th>
                <th class="py-3 px-4 text-left">Tariff</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tariffs as $tariff): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4"><?php echo htmlspecialchars($tariff['destination_name']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($tariff['tariff']); ?></td>
                <td class="py-2 px-4">
                    <a href="tariff_edit.php?id=<?php echo $tariff['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <a href="tariff_delete.php?id=<?php echo $tariff['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this tariff?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
