<html>
<head>
    <title>Form</title>
</head>
<body>
    <form method="post" action="{{ route('process') }}">
    @csrf
    <label for="batch">Select Batch:</label>
    
    <select name="batches" id = "b">
     <option value="" selected>select your batch:</option>
        @foreach ($batches as $batch)
            <option > {{ $batch->batch_name }} </option>
        @endforeach
            
    </select>

    <input type="submit"></input>
</form>

</body>
</html>
