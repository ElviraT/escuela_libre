<div class="modal custom-modal modal-lg fade" id="add_representative" role="dialog">
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
                        class="modal_registro_representative_id" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-groups-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('User')</label>
                                                <select class="form-control form-small select" name="id_user"
                                                    id="id_user">
                                                    <option>@lang('Select User')</option>
                                                    @foreach ($users as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Ocupation')</label>
                                                <input type="text" name="ocupation" id="ocupation"
                                                    class="form-control" placeholder="Enter Ocupation">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>@lang('Marital State')</label>
                                                <select class="form-control form-small select" name="id_marital"
                                                    id="id_marital">
                                                    <option>@lang('Select Marital Status')</option>
                                                    @foreach ($maritals as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block ">
                                                <label>@lang('Status')</label>
                                                <select class="form-control form-small select" name="id_status"
                                                    id="id_status">
                                                    <option>Select Status</option>
                                                    @foreach ($status as $st)
                                                        <option value="{{ $st->id }}">{{ $st->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
