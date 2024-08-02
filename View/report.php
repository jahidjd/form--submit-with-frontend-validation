<!DOCTYPE html>
<html>
<head>
    <title>Report List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Report List</h2>
        <a href="/form-submit-with-frontend-validation/" class="btn btn-info">Form</a>
        <form method="POST" action="/form-submit-with-frontend-validation/get-report">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="user_id">User ID</label>
                    <input type="number" class="form-control" id="user_id" name="user_id">
                </div>
                <div class="form-group col-md-3">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </div>
        </form>
      <div class="col-md-12">
      <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Buyer</th>
                    <th>Receipt ID</th>
                    <th>Items</th>
                    <th>Buyer Email</th>
                    <th>Note</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Entry At</th>
                    <th>Entry By</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($submissions)): ?>
                    <?php foreach ($submissions as $submission): ?>
                        <tr>
                            <td><?= htmlspecialchars($submission['id']) ?></td>
                            <td><?= htmlspecialchars($submission['amount']) ?></td>
                            <td><?= htmlspecialchars($submission['buyer']) ?></td>
                            <td><?= htmlspecialchars($submission['receipt_id']) ?></td>
                            <td><?= htmlspecialchars($submission['items']) ?></td>
                            <td><?= htmlspecialchars($submission['buyer_email']) ?></td>
                            <td><?= htmlspecialchars($submission['note']) ?></td>
                            <td><?= htmlspecialchars($submission['city']) ?></td>
                            <td><?= htmlspecialchars($submission['phone']) ?></td>
                            <td><?= htmlspecialchars($submission['entry_at']) ?></td>
                            <td><?= htmlspecialchars($submission['entry_by']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12">No data found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
      </div>
    </div>
</body>
</html>
