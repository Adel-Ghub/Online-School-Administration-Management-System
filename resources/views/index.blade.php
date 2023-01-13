<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <H1> HEY THERE</H1>
        @foreach ($schools as $school)
        <tr>
            <td>{{ $school->id }}</td>
            <td>{{ $school->name }}</td>
            <td>{{ $school->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</html>
