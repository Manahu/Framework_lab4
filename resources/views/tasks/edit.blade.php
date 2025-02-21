<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editare Sarcină</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; margin: 50px; }
        .container { max-width: 600px; margin: auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: left; }
        h1 { text-align: center; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
        button { display: block; width: 100%; padding: 10px; margin-top: 15px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editare Sarcină</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Titlu</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="description">Descriere</label>
            <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="due_date">Data limită</label>
            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date->toDateString()) }}">
            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id">
                <option value="">Alege o categorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Actualizează Sarcina</button>
        </form>
    </div>
</body>
</html>
