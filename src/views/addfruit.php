<h1>Add Fruit</h1>
<form method="post" action="/addfruit">
    <label>Name:<br>
    <input type="text" name="name"></label>
    <br><br>
    <label>Description:<br>
    <textarea name="description" rows=5 cols=50></textarea></label>
    <br><br>
    <button type="submit">Submit</button>
</form>

<?php if (isset($success)): ?>
<p class="success"><?= htmlspecialchars($success) ?></p>
<?php elseif (isset($error)): ?>
<p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>