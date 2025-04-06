<h1>All Books</h1>
<a href="{{ route('books.create') }}" style="text-decoration: none">Add New Book</a>
<br> <br>
<table style="padding: 10px;" border=1>
    <thead>
        <tr>
            <th>Books</th>
            <th>Publish Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <th style="padding: 10px;"><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a> by
                    {{ $book->author }}
                </th>
                <th style="padding: 10px;">({{ $book->published_date }})</th>
                <th style="padding: 10px;">
                    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
<br>

<a href="/logout" style="text-decoration: none">Logout</a>