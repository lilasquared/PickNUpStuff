<?php if (isset($rows[0])): ?>
<table class="table table-striped">
  <thead>
    <tr>
    <?php foreach($rows[0] as $column => $value): ?>
      <th><?php echo $column; ?></th>
    <?php endforeach; ?>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($rows as $row): ?>
    <tr>
    <?php foreach ($row as $column => $value) :?>
      <td><?php echo $value; ?></td>
    <?php endforeach;?>
      <td>
        <button class="btn btn-sm btn-warning" disabled>
          <span class="glyphicon glyphicon-edit"></span>
        </button>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php else : ?>
  There are no rows to display.
<?php endif; ?>