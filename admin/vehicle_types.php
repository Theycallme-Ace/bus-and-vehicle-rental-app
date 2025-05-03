<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch vehicle types from database
$stmt = $pdo->query("SELECT * FROM vehicle_types");
$vehicle_types = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Manage Vehicle Types</h1>

    <a href="vehicle_type_add.php" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Vehicle Type</a>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Type Name</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicle_types as $type): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4"><?php echo htmlspecialchars($type['type_name']); ?></td>
                <td class="py-2 px-4">
                    <a href="vehicle_type_edit.php?id=<?php echo $type['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <a href="vehicle_type_delete.php?id=<?php echo $type['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this vehicle type?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
