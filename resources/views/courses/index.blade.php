@extends('layouts.app')
@section('content')
    <p></p>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('primary'))
        <div class="alert alert-primary">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-sm">
        <div>
            <h4 class="text-primary">LISTADO DE CURSOS
                <a href="{{ route('courses.create') }}" class="btn btn-success"> AGREGAR</a>
            </h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Num</th>
                    <th scope="col">Nombre Curso</th>
                    <th scope="col">Tiempo Dias</th>
                    <th scope="col">precio</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $course->nameCourse }}</td>
                        <td>{{ $course->timeDays }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->description }}</td>
                        <td>
                            <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('courses.show',$course->id)}}">VER</a>
                                <a class="btn btn-outline-success btn-sm" href="{{ route('courses.edit',$course->id)}}">EDITAR</a>    
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $courses->links() !!}
    </div>
@endsection
