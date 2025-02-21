<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Sarcini</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 50px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .flash-message {
            background-color: #28a745;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        button {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista Sarcinilor</h1>

        <!-- Flash message for success -->
        @if(session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <tr>
                <th>Titlu</th>
                <th>Descriere</th>
                <th>Data Limită</th>
                <th>Categorie</th>
                <th>Acțiuni</th>
            </tr>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->category->name }}</td>
                    <td>
                        <!-- Delete form -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sigur vrei să ștergi această sarcină?')">Șterge</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('home') }}" class="btn">Înapoi la Acasă</a>
    </div>
</body>
</html>
