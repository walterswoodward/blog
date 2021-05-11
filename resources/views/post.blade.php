<!doctype html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <h1><?= $post->title; ?></h1>
    <div><?= $post->body; ?></div>
    <a href="/">Go Back</a>
</body>