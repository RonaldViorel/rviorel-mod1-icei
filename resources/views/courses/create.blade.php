@extends('layouts.app')

@section('content')
    <div>
        <div>
           
            <h4 class="text-primary">NUEVA CURSO</h4>
        </div>
        <div class="container border border-primary">
         
            <form method="POST" action="{{ route('courses.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre Curso</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nameCourse" name="nameCourse">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tiempo en  dias</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control form-control-sm" id="timeDays" name="timeDays">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="price" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Descripcion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="description" name="description">
                    </div>
                </div>
                <button class="btn btn-outline-primary" type="submit">Guardar</button><p></p>
            </form>
        </div>

    </div>
@endsection
