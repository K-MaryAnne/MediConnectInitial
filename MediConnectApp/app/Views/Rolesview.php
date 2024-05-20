<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roles</title>
</head>
<body>
    <h1>Roles List</h1>
    <a href="/role/create">Add New Role</a>
    <table border="1">
        <tr>
            <th>Role ID</th>
            <th>Role Name</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($roles)): ?>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $role['Role_ID'] ?></td>
                    <td><?= $role['Role_Name'] ?></td>
                    <td><?= $role['Description'] ?></td>
                    <td><?= $role['Created at'] ?></td>
                    <td>
                        <a href="/role/edit/<?= $role['Role_ID'] ?>">Edit</a>
                        <a href="/role/delete/<?= $role['Role_ID'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <h1><?= isset($role) ? 'Edit Role' : 'Create Role' ?></h1>
    <form action="<?= isset($role) ? '/role/update/' . $role['Role_ID'] : '/role/store' ?>" method="post">
        <label for="Role_Name">Role Name:</label>
        <input type="text" name="Role_Name" value="<?= isset($role) ? $role['Role_Name'] : '' ?>" required><br>

        <label for="Description">Description:</label>
        <input type="text" name="Description" value="<?= isset($role) ? $role['Description'] : '' ?>" required><br>

        <button type="submit"><?= isset($role) ? 'Update' : 'Create' ?></button>
    </form>
</body>
</html>
