<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch sliders from database
$stmt = $pdo->query("SELECT * FROM sliders");
$sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Manage Sliders</h1>

    <a href="slider_add.php" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Slider</a>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Image</th>
                <th class="py-3 px-4 text-left">Title</th>
                <th class="py-3 px-4 text-left">Description</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sliders as $slider): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4">
                    <?php if ($slider['image']): ?>
                        <img src="../assets/uploads/<?php echo htmlspecialchars($slider['image']); ?>" alt="Slider Image" class="h-16 w-32 object-cover rounded" />
                    <?php else: ?>
                        <span class="text-gray-500">No image</span>
                    <?php endif; ?>
                </td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($slider['title']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($slider['description']); ?></td>
                <td class="py-2 px-4">
                    <a href="slider_edit.php?id=<?php echo $slider['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <a href="slider_delete.php?id=<?php echo $slider['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this slider?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
