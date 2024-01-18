@php
    $workers = [
        (object) [
            'names' => 'Juan',
            'paternal_surname' => 'Perez',
            'maternal_surname' => 'Gomez',
            'dni' => '12345678',
            'birth_date' => '1998-02-16',
            'gender' => 'M',
            'children_quantity' => 2,
        ],
        (object) [
            'names' => 'Maria',
            'paternal_surname' => 'Gomez',
            'maternal_surname' => 'Perez',
            'dni' => '87654321',
            'birth_date' => '2001-06-01',
            'gender' => 'F',
            'children_quantity' => 0,
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>

    {{-- Icon page --}}
    <link rel="icon" href="https://static-00.iconduck.com/assets.00/devicon-plain-icon-2048x1941-ps18p8i9.png">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Dev</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                Registro de colaboradores
                            </a>
                        </li>
                    </ul>

                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-danger">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modal-add-worker">
                            Agregar colaborador
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>DNI</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Sexo</th>
                                        <th>Cantidad de hijos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($workers as $worker)
                                        <tr>
                                            <td>{{ $worker->names }}</td>
                                            <td>{{ $worker->paternal_surname }}</td>
                                            <td>{{ $worker->maternal_surname }}</td>
                                            <td>{{ $worker->dni }}</td>
                                            <td>{{ date('d/m/Y', strtotime($worker->birth_date)) }}</td>
                                            <td>
                                                @if ($worker->gender === 'M')
                                                    Masculino
                                                @elseif ($worker->gender === 'F')
                                                    Femenino
                                                @else
                                                    Otro
                                                @endif
                                            </td>
                                            <td>{{ $worker->children_quantity }}</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm">
                                                    Ver
                                                </button>

                                                <button type="button" class="btn btn-primary btn-sm">
                                                    Editar
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-worker" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar colaborador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/" method="POST" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="names" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="names" name="names" required>
                        </div>
                        <div class="mb-3">
                            <label for="paternal_surname" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="paternal_surname" name="paternal_surname"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="maternal_surname" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="maternal_surname" name="maternal_surname"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="document" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="document" name="document" required>
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Sexo</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btn-store-worker" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- FontAwesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>

</html>
