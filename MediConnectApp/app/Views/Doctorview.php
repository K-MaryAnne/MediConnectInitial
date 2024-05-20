<!-- doctors_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors</title>
</head>
<body>
    <h1>Doctors List</h1>
    <a href="/doctors/create">Add New Doctor</a>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Role ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialisation</th>
            <th>Years of Experience</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($doctors as $doctor): ?>
            <tr>
                <td><?= $doctor['User_ID'] ?></td>
                <td><?= $doctor['Role_ID'] ?></td>
                <td><?= $doctor['First Name'] ?></td>
                <td><?= $doctor['Last Name'] ?></td>
                <td><?= $doctor['Specialisation'] ?></td>
                <td><?= $doctor['Years of Experience'] ?></td>
                <td><?= $doctor['Rating'] ?></td>
                <td>
                    <a href="/doctors/edit/<?= $doctor['User_ID'] ?>">Edit</a>
                    <a href="/doctors/delete/<?= $doctor['User_ID'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>

    <h2>Add New Doctor</h2>
    <form action="/doctors/store" method="post">
        <label for="User_ID">User ID:</label>
        <input type="number" name="User_ID" required><br>
        <label for="Role_ID">Role ID:</label>
        <input type="text" name="Role_ID" required><br>
        <label for="First Name">First Name:</label>
        <input type="text" name="First Name" required><br>
        <label for="Last Name">Last Name:</label>
        <input type="text" name="Last Name" required><br>
        <label for="Specialisation">Specialisation:</label>
        <input type="text" name="Specialisation" required><br>
        <label for="Years of Experience">Years of Experience:</label>
        <input type="number" name="Years of Experience" required><br>
        <label for="Rating">Rating:</label>
        <input type="number" name="Rating" required><br>
        <button type="submit">Save</button>
    </form>

    <hr>

    <h2>Edit Doctor</h2>
    <?php if (!empty($doctor)): ?>
        <form action="/doctors/update/<?= $doctor['User_ID'] ?>" method="post">
            <label for="Role_ID">Role ID:</label>
            <input type="text" name="Role_ID" value="<?= $doctor['Role_ID'] ?>" required><br>
            <label for="First Name">First Name:</label>
            <input type="text" name="First Name" value="<?= $doctor['First Name'] ?>" required><br>
            <label for="Last Name">Last Name:</label>
            <input type="text" name="Last Name" value="<?= $doctor['Last Name'] ?>" required><br>
            <label for="Specialisation">Specialisation:</label>
            <input type="text" name="Specialisation" value="<?= $doctor['Specialisation'] ?>" required><br>
            <label for="Years of Experience">Years of Experience:</label>
            <input type="number" name="Years of Experience" value="<?= $doctor['Years of Experience'] ?>" required><br>
            <label for="Rating">Rating:</label>
            <input type="number" name="Rating" value="<?= $doctor['Rating'] ?>" required><br>
            <button type="submit">Save</button>
        </form>
    <?php endif; ?>

    <hr>

    <h2>Delete Doctor</h2>
    <?php if (!empty($doctor)): ?>
        <form action="/doctors/delete/<?= $doctor['User_ID'] ?>" method="post">
            <button type="submit">Delete</button>
        </form>
    <?php endif; ?>
</body>
</html>
