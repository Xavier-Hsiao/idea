@props([
	"title" => "Idea", // default title
])

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite("resources/css/app.css")
	<title>{{ $title }}</title>
</head>
<body class="container px-4 mx-auto my-5">
	<nav class="flex space-x-4 my-2">
		<a href="/">Home</a>
		<a href="/about">About us</a>
		<a href="/contact">Contact</a>
	</nav>
	<main>
		{{ $slot }}
	</main>
</body>
</html>