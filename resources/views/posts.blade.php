<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <title>Laravel Home</title>
</head>
<body>
    <div class="container">
        <?php foreach ($posts as $post): ?>
            <div class="my-post">
                <h1>
                    <a href="/posts/<?= $post->slug; ?>"> <?= $post->title ?> </a>
                </h1>
                <div>
                    <?= $post->excerpt ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>