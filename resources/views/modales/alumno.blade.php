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
                        <div class="card-body p-3">
                            <div class="wizard">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Datos Personales">
                                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step1" aria-selected="true">
                                            <i class="far fa-user"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Datos de Salud">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step2" aria-selected="false">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Datos Academicos">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step3" aria-selected="false">
                                            <i class="fas fa-book"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                        aria-labelledby="step1-tab">
                                        <div class="mb-4">
                                            <h5>@lang('Enter Your Personal Details')</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('User')</label>
                                                    <select class="form-control form-small select" name="id_user"
                                                        id="id_user">
                                                        <option>@lang('Select User')</option>
                                                        @foreach ($users as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Relationship')</label>
                                                    <select class="form-control form-small select" name="id_relation"
                                                        id="id_relation">
                                                        <option>@lang('Select relacion')</option>
                                                        @foreach ($relacion as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Name')</label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control" placeholder="Enter Name">
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
                                                    <input type="text" name="dni" id="dni"
                                                        class="form-control" placeholder="Enter DNI">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Date of Birth')</label>
                                                    <div class="cal-icon cal-icon-info">
                                                        <input type="text" name="birthdate" id="birthdate"
                                                            class="datetimepicker form-control"
                                                            placeholder="Select Date">
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
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <a class="btn btn btn-primary next" id="next">@lang('Next')</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="step2"
                                        aria-labelledby="step2-tab">
                                        <div class="mb-4">
                                            <h5>@lang('Enter your health details')</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Type Blood')</label>
                                                    <input type="text" name="type_blood" id="type_blood"
                                                        class="form-control" placeholder="Enter Type Blood">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <label for="" class="mb-2">@lang('Is Alergy?')</label>
                                                <div class="status-toggle">
                                                    <input id="alergy_id" class="check" type="checkbox"
                                                        name="is_alergy">
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
                                                <label for="" class="mb-2">@lang('Is Disability?')</label>
                                                <div class="status-toggle">
                                                    <input id="disability_id" class="check" type="checkbox"
                                                        name="is_disability">
                                                    <label for="disability_id"
                                                        class="checktoggle checkbox-bg">@lang('Disability')</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12" id="tipo_dis" hidden>
                                                <div class="input-block mb-3">
                                                    <label>@lang('Type Disability')</label>
                                                    <input type="text" name="type_disability" id="type_disability"
                                                        class="form-control" placeholder="Enter Type Disability">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="d-flex mt-3">
                                            <a class="btn btn-primary previous me-2"
                                                id="back">@lang('Back')</a>
                                            <a class="btn btn-primary next" id="continue">@lang('Continue')</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="step3"
                                        aria-labelledby="step3-tab">
                                        <div class="mb-4">
                                            <h5>@lang('Enter your academic details')</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Registration')</label>
                                                    <input type="text" name="registration" id="registration"
                                                        class="form-control" placeholder="Enter registration">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Grade')</label>
                                                    <select class="form-control form-small select" name="id_grade"
                                                        id="id_grade">
                                                        <option>@lang('Select Grade')</option>
                                                        @foreach ($grades as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Groups')</label>
                                                    <select class="form-control form-small select" name="id_group"
                                                        id="id_group" disabled>
                                                        <option>@lang('Select Groups')</option>
                                                        @foreach ($groups as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>@lang('Modality')</label>
                                                    <select class="form-control form-small select" name="id_modality"
                                                        id="id_modality">
                                                        <option>@lang('Select Modality')</option>
                                                        @foreach ($modalities as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <a class="btn btn-primary previous me-2"
                                                id="previus">@lang('Previous')</a>
                                            <button type="submit" data-bs-dismiss="modal"
                                                class="btn btn-primary paid-continue-btn">@lang('Submit')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
