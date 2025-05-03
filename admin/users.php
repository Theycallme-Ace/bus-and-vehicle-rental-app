<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch users with roles
$stmt = $pdo->query("SELECT u.id, u.username, u.email, r.role_name FROM users u LEFT JOIN roles r ON u.role = r.id");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Manage Users</h1>

    <a href="user_add.php" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New User</a>

    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Username</th>
                <th class="py-3 px-4 text-left">Email</th>
                <th class="py-3 px-4 text-left">Role</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-2 px-4"><?php echo htmlspecialchars($user['username']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($user['email']); ?></td>
                <td class="py-2 px-4"><?php echo htmlspecialchars($user['role_name']); ?></td>
                <td class="py-2 px-4">
                    <a href="user_edit.php?id=<?php echo $user['id']; ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <a href="user_delete.php?id=<?php echo $user['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
