<html>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="myfile" required>
        <input type="submit" value="Upload">
    </form>
    <div>
        <ul>
            @forelse ($files as $file)
                <li><a href="{{ $file->file_path }}">{{ $file->file_path }}</a></li>
            @empty
                
            @endforelse
        </ul>
    </div>
</html>