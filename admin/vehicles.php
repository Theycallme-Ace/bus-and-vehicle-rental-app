<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch vehicles from database
$stmt = $pdo->query("SELECT v.id, v.name, v.year, v.photo, vt.type_name, t.tariff, d.destination_name 
                     FROM vehicles v
                     LEFT JOIN vehicle_types vt ON v.type_id = vt.id
                     LEFT JOIN tariffs t ON v.tariff_id = t.id
                     LEFT JOIN destinations d ON t.destination_id = d.id");
$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Manage Vehicles</h1>

    <a href="vehicle_add.php" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Vehicle</a>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Photo</th>
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-left">Type</th>
                <th class="py-3 px-4 text-left">Year</th>
                <th class="py-3 px-4 text-left">Tariff</th>
                <th class="py-3 px-4 text-left">Destination</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4">
                    <?php if ($vehicle['photo']): ?>
                        <img src="../assets/uploads/<?php echo htmlspecialchars($vehicle['photo']); ?>" alt="Vehicle Photo" class="h-16 w-24 object-cover rounded" />
                    <?php else: ?>
                        <span class="text-gray-500">No photo</span>
                    <?php endif; ?>
                </td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($vehicle['name']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($vehicle['type_name']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($vehicle['year']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($vehicle['tariff']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($vehicle['destination_name']); ?></td>
                <td class="py-2 px-4">
                    <a href="vehicle_edit.php?id=<?php echo $vehicle['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <a href="vehicle_delete.php?id=<?php echo $vehicle['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this vehicle?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
