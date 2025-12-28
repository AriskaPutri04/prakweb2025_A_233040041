<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post['title'] }}</title>
</head>

<body>
    <a href="/posts">← Kembali ke daftar</a>

    <article>
        <h1>{{ $post['title'] }}</h1>

        <p>
            {{ $post['content'] }}
        </p>

        <hr>

        <small>
            Ditulis oleh:
            {{ $post['user']['firstName'] }}
            {{ $post['user']['lastName'] }}
            <br>
            Dibuat:
            {{ \Carbon\Carbon::parse($post['createdAt'])->translatedFormat('d F Y') }}
        </small>
    </article>
</body>

</html>