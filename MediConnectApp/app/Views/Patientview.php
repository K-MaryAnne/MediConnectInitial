<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patients</title>
</head>
<body>
    <h1>Patients List</h1>
    <a href="/patient/create">Add New Patient</a>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Role ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($patients)): ?>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $patient['User_ID'] ?></td>
                    <td><?= $patient['Role_ID'] ?></td>
                    <td><?= $patient['First Name'] ?></td>
                    <td><?= $patient['Last Name'] ?></td>
                    <td>
                        <a href="/patient/edit/<?= $patient['User_ID'] ?>">Edit</a>
                        <a href="/patient/delete/<?= $patient['User_ID'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <h1><?= isset($patient) ? 'Edit Patient' : 'Create Patient' ?></h1>
    <form action="<?= isset($patient) ? '/patient/update/' . $patient['User_ID'] : '/patient/store' ?>" method="post">
        <label for="User_ID">User ID:</label>
        <input type="text" name="User_ID" value="<?= isset($patient) ? $patient['User_ID'] : '' ?>" required><br>

        <label for="Role_ID">Role ID:</label>
        <input type="text" name="Role_ID" value="<?= isset($patient) ? $patient['Role_ID'] : '' ?>" required><br>

        <label for="First Name">First Name:</label>
        <input type="text" name="First Name" value="<?= isset($patient) ? $patient['First Name'] : '' ?>" required><br>

        <label for="Last Name">Last Name:</label>
        <input type="text" name="Last Name" value="<?= isset($patient) ? $patient['Last Name'] : '' ?>" required><br>

        <button type="submit"><?= isset($patient) ? 'Update' : 'Create' ?></button>
    </form>
</body>
</html>
