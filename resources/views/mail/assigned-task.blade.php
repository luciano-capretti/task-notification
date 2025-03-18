<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .task-info {
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Assignment Notification</h1>
        <p>A new task has been assigned to you:</p>
        
        <div class="task-info">
            <p><strong>Task identificator:</strong> {{ $task->id }} </p>
            <p><strong>Title:</strong> {{ $task->title }} </p>
            <p><strong>Description:</strong> {{ $task->description }} </p>
            <p><strong>Status:</strong> {{ $task->status->value() }} </p>
        </div>
    </div>
</body>
</html>
