<div id="add_event" class="modal custom-modal modal-lg fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0 title"></h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form-enviar" method="post">
                    <input type="hidden" id="method" name="_method" value="" />
                    @csrf
                    <input type="hidden" id="id" name="id" value=""
                        class="modal_registro_event_id" />
                    <div class="row">
                        <input type="hidden" name="id_teacher" id="id_teacher">
                        <div class="col-lg-4 col-12">
                            <div class="input-block mb-3">
                                <label>@lang('Class')</label>
                                <select class="form-control form-small select" name="id_matter" id="id_matter">
                                    <option>@lang('Select Matter')</option>
                                    @foreach ($matters as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="input-block mb-3">
                                <label>@lang('Day')</label>
                                <select class="form-control form-small select" name="id_day" id="id_day">
                                    <option>@lang('Select days')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <span id="horas" style="color: rgb(230, 133, 6)"></span>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="input-block mb-3">
                                <label>@lang('Start Time')</label>
                                <input class="form-control" type="time" name="startime" id="startime" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="input-block mb-3">
                                <label>@lang('End Time')</label>
                                <input class="form-control" type="time" name="endtime" id="endtime" disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <span id="mensaje" style="color: darkred" hidden></span>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
