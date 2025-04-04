<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă o sarcină</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; margin: 50px; }
        .container { max-width: 600px; margin: auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: left; }
        h1 { text-align: center; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
        button { display: block; width: 100%; padding: 10px; margin-top: 15px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .flash-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adaugă o sarcină nouă</h1>

        @if(session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label for="title">Titlu</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="description">Descriere</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="due_date">Data limită</label>
            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}">
            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id">
                <option value="">Alege o categorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Adaugă Sarcina</button>
        </form>
    </div>
</body>
</html>
