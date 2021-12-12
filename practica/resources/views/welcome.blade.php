<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand col-md-8" href="/">People</a>
        <div>
            <form class="form" method="post" action="{{ route('country.store') }}">
                @csrf
                <label class="text-white">Country</label>
                <input type="text" name="name">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </nav>

    <section class="container">
        <h1 class="my-4 text-center">People</h1>
        <form class="form" method="post" action="{{ route('person.store') }}">
            @csrf
            <div class="form-group">
                <div class="col-md-12">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="col-md-12">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lastName">
                </div>
                <div class="col-md-12">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="col-md-12">
                    <label>Phone</label>
                    <input class="form-control" type="number" name="phone">
                </div>
                <div class="col-md-12">
                    <label>Neighborhood</label>
                    <input class="form-control" type="text" name="neighborhood">
                </div>
                <div class="col-md-12">
                    <label>Country</label>
                    <select name="country_id" class="btn btn-outline-light text-dark form-control">
                        @foreach($country as $elements)
                        <option class="btn btn-outline-light text-dark" value="{{ $elements->id }}">{{ $elements->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Neighborhood</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                    <tr>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->lastName }}</td>
                        <td>{{ $person->email }}</td>
                        <td>{{ $person->phone }}</td>
                        <td>{{ $person->neighborhood }}</td>
                        <td>{{ $country[$person->country_id-1]->name}}</td>
                        <td>
                            <a href="{{ route('person.update', $person->id) }}" class="btn btn-warning text-white">Edit</a>
                            <a href="{{ route('person.delete', $person->id) }}" class="btn btn-danger text-white">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
