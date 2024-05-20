<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
    <h1>Users List</h1>
    <a href="/user/create">Add New User</a>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['User_id'] ?></td>
                    <td><?= $user['First Name'] ?></td>
                    <td><?= $user['Last Name'] ?></td>
                    <td><?= $user['E-mail'] ?></td>
                    <td><?= $user['Phone Number'] ?></td>
                    <td><?= $user['Gender'] ?></td>
                    <td><?= $user['Age'] ?></td>
                    <td>
                        <a href="/user/edit/<?= $user['User_id'] ?>">Edit</a>
                        <a href="/user/delete/<?= $user['User_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <h1><?= isset($user) ? 'Edit User' : 'Create User' ?></h1>
    <form action="<?= isset($user) ? '/user/update/' . $user['User_id'] : '/user/store' ?>" method="post">
        <label for="First Name">First Name:</label>
        <input type="text" name="First Name" value="<?= isset($user) ? $user['First Name'] : '' ?>" required><br>

        <label for="Last Name">Last Name:</label>
        <input type="text" name="Last Name" value="<?= isset($user) ? $user['Last Name'] : '' ?>" required><br>

        <label for="E-mail">Email:</label>
        <input type="email" name="E-mail" value="<?= isset($user) ? $user['E-mail'] : '' ?>" required><br>

        <label for="Phone Number">Phone Number:</label>
        <input type="text" name="Phone Number" value="<?= isset($user) ? $user['Phone Number'] : '' ?>" required><br>

        <label for="Gender">Gender:</label>
        <input type="text" name="Gender" value="<?= isset($user) ? $user['Gender'] : '' ?>" required><br>

        <label for="Age">Age:</label>
        <input type="text" name="Age" value="<?= isset($user) ? $user['Age'] : '' ?>" required><br>

        <button type="submit"><?= isset($user) ? 'Update' : 'Create' ?></button>
    </form>
</body>
</html>
