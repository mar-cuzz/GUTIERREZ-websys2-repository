<!-- resources/views/books/show.blade.php -->

<h1>{{ $book->title }}</h1>
<p>Author: {{ $book->author }}</p>
<p>Published Date: {{ $book->published_date }}</p>

<a href="{{ route('books.index') }}">Back to All Books</a>