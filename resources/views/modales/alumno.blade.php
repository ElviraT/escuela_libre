<div class="modal custom-modal modal-lg fade" id="add_alumno" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0 title"></h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="#" id="form-enviar" method="post">

                <input type="hidden" id="method" name="_method" value="" />
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value=""
                        class="modal_registro_alumno_id" />
                    <input type="hidden" name="id_representative" value="{{ $id_representative }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-groups-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Relationship')</label>
                                                <select class="form-control form-small select" name="id_relation"
                                                    id="id_relation">
                                                    <option>@lang('Select relacion')</option>
                                                    @foreach ($relacion as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Name')</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Last Name')</label>
                                                <input type="text" name="last_name" id="last_name"
                                                    class="form-control" placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('DNI')</label>
                                                <input type="text" name="dni" id="dni" class="form-control"
                                                    placeholder="Enter DNI">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Type Blood')</label>
                                                <input type="text" name="type_blood" id="type_blood"
                                                    class="form-control" placeholder="Enter Type Blood">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Date of Birth')</label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" name="birthdate" id="birthdate"
                                                        class="datetimepicker form-control" placeholder="Select Date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Gender')</label>
                                                <select class="form-control form-small select" name="id_gender"
                                                    id="id_gender">
                                                    <option>@lang('Select Gender')</option>
                                                    @foreach ($genders as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="" class="mb-2">@lang('Is Alergy?')</label>
                                            <div class="status-toggle">
                                                <input id="alergy_id" class="check" type="checkbox" name="alergy">
                                                <label for="alergy_id"
                                                    class="checktoggle checkbox-bg">@lang('Alergy')</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12" id="tipo_al" hidden>
                                            <div class="input-block mb-3">
                                                <label>@lang('Type Alergy')</label>
                                                <input type="text" name="type_alergy" id="type_alergy"
                                                    class="form-control" placeholder="Enter Type Alergy">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="" class="mb-2">@lang('Is Discapacity?')</label>
                                            <div class="status-toggle">
                                                <input id="discapacity_id" class="check" type="checkbox"
                                                    name="discapacity">
                                                <label for="discapacity_id"
                                                    class="checktoggle checkbox-bg">@lang('Discapacity')</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12" id="tipo_dis" hidden>
                                            <div class="input-block mb-3">
                                                <label>@lang('Type Discapacity')</label>
                                                <input type="text" name="type_discapacity" id="type_discapacity"
                                                    class="form-control" placeholder="Enter Type Discapacity">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal"
                        class="btn btn-back cancel-btn me-2">@lang('Close')</button>

                    <button type="submit" data-bs-dismiss="modal"
                        class="btn btn-primary paid-continue-btn">@lang('Submit')</button>

                </div>
            </form>
        </div>
    </div>
</div>
