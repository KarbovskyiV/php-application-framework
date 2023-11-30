<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<form method="post" action="/test/add">
    <label for="name">Name:</label>
    <label>
        <input type="text" name="name" required>
    </label>

    <label for="age">Age:</label>
    <label>
        <input type="number" name="age">
    </label>

    <label for="gender">Gender:</label>
    <label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="they/them">They/Them</option>
        </select>
    </label>

    <input type="submit" value="Add">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['age'] ?></td>
            <td><?= $user['gender'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>