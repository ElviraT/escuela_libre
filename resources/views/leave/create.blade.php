@extends('layouts.admin.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body w-100">
                    <div class="content-page-header p-0">
                        <h5>Solicitud de Ausencia</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-table">
                                <div class="card-body">

                                    <form method="POST" action="{{ route('leaves.create') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-sm-12 mb-3">
                                                <label for="user_id">Usuario:</label>
                                                <select class="form-control select" id="user_id" name="user_id" required>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->name . ' ' . $user->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6 col-sm-12 mb-3">
                                                <label for="leave_type_id">Tipo de Ausencia:</label>
                                                <select class="form-control select" id="leave_type_id" name="leave_type_id"
                                                    required>
                                                    @foreach ($leaveTypes as $leaveType)
                                                        <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6 col-sm-12 mb-3">
                                                <label for="start_date">Fecha de Inicio:</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date"
                                                    required>
                                            </div>

                                            <div class="form-group col-lg-6 col-sm-12 mb-3">
                                                <label for="end_date">Fecha de Fin:</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="reason">Motivo:</label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
