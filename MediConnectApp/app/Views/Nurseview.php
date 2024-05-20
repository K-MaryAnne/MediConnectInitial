<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nurses</title>
</head>
<body>
    <h1>Nurses List</h1>
    <a href="/nurse/create">Add New Nurse</a>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Role ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Years of Experience</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($nurses)): ?>
            <?php foreach ($nurses as $nurse): ?>
                <tr>
                    <td><?= $nurse['User_ID'] ?></td>
                    <td><?= $nurse['Role_ID'] ?></td>
                    <td><?= $nurse['First Name'] ?></td>
                    <td><?= $nurse['Last Name'] ?></td>
                    <td><?= $nurse['Years of Experience'] ?></td>
                    <td><?= $nurse['Rating'] ?></td>
                    <td>
                        <a href="/nurse/edit/<?= $nurse['User_ID'] ?>">Edit</a>
                        <a href="/nurse/delete/<?= $nurse['User_ID'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <h1><?= isset($nurse) ? 'Edit Nurse' : 'Create Nurse' ?></h1>
    <form action="<?= isset($nurse) ? '/nurse/update/' . $nurse['User_ID'] : '/nurse/store' ?>" method="post">
        <label for="User_ID">User ID:</label>
        <input type="text" name="User_ID" value="<?= isset($nurse) ? $nurse['User_ID'] : '' ?>" required><br>

        <label for="Role_ID">Role ID:</label>
        <input type="text" name="Role_ID" value="<?= isset($nurse) ? $nurse['Role_ID'] : '' ?>" required><br>

        <label for="First Name">First Name:</label>
        <input type="text" name="First Name" value="<?= isset($nurse) ? $nurse['First Name'] : '' ?>" required><br>

        <label for="Last Name">Last Name:</label>
        <input type="text" name="Last Name" value="<?= isset($nurse) ? $nurse['Last Name'] : '' ?>" required><br>

        <label for="Years of Experience">Years of Experience:</label>
        <input type="text" name="Years of Experience" value="<?= isset($nurse) ? $nurse['Years of Experience'] : '' ?>" required><br>

        <label for="Rating">Rating:</label>
        <input type="text" name="Rating" value="<?= isset($nurse) ? $nurse['Rating'] : '' ?>" required><br>

        <button type="submit"><?= isset($nurse) ? 'Update' : 'Create' ?></button>
    </form>
</body>
</html
