<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch destinations from database
$stmt = $pdo->query("SELECT * FROM destinations");
$destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Manage Destinations</h1>

    <a href="destination_add.php" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Destination</a>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Destination Name</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destinations as $destination): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4"><?php echo htmlspecialchars($destination['destination_name']); ?></td>
                <td class="py-2 px-4">
                    <a href="destination_edit.php?id=<?php echo $destination['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <a href="destination_delete.php?id=<?php echo $destination['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this destination?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
