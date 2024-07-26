<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدير المهام</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        form.delete {
            display: inline-block;
        }

        .item-btn {
            visibility: hidden;
        }

        .list-group-item:hover .item-btn {
            visibility: visible;
        }
    </style>
</head>

<body>

    <header class="bg-primary text-white text-center py-4">
        <h1>مدير المهام</h1>
    </header>

    <div class="container mt-4">
        <form method="post" action="create/task" class="mb-4">
            <div class="input-group">
                <input name="description" type="text" class="form-control" placeholder="مهمة جديدة">
                <button type="submit" class="btn btn-success">حفظ</button>
            </div>
        </form>
        <div class="text-center">
            <a class="btn  btn-primary btn-sm" href="<?= home() ?>">الكل</a>
            <a class="btn  btn-secondary btn-sm" href="?completed=0">قيد الانجاز</a>
            <a class="btn  btn-success btn-sm" href="?completed=1">المكتملة</a>
        </div>



        <ul class="list-group">
            <?php foreach ($tasks as $key => $task): ?>

                <a href="updateStatus/task?id=<?= $task->id ?>&completed=<?= $task->completed == 0 ? '1' : '0' ?>">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <i class="<?= $task->completed == 1 ? 'bi bi-check-circle' : 'bi bi-circle' ?>"></i>
                        <div>
                            <?php echo htmlspecialchars($task->description); ?>
                        </div>
                        <div>
                            <button class="btn item-btn btn-warning btn-sm">تعديل</button>
                            <form class="delete" method="post" action="delete/task">
                                <input value="<?= $task->id ?>" type="hidden" name="id">
                                <button type="submit" class="btn item-btn btn-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>

</body>

</html>