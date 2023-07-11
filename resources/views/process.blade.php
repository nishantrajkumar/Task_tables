<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        table {
            border-collapse: collapse;
            }

        th, td {
            border: 1px solid black;
            padding: 8px;
            }

    </style>
</head>
<body>
    
    <h3>Core Subjects:</h3>
    <table>
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coreSubjects as $subject)
                @foreach($subject as $key=>$value)
                    <tr>
                        <td>@php print($key) @endphp</td>
                        <td>@php print($value) @endphp</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <h3>Elective Subjects:</h3>
    <table>
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($electiveSubjects as $subject)
            <tr>
                @foreach($subject as $key=>$value)
                    <tr>
                        <td>@php print($key) @endphp</td>
                        <td>@php print($value) @endphp</td>
                    </tr>
                @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
