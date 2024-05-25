@extends('layouts.admin.base')

@section('content')
    <div class="row">
        @include('settings.menu')
        <div class="col-xl-9 col-md-8">
            <div class="card company-settings-new">
                <div class="card-body w-100">
                    <div class="content-page-header">
                        <h5>@lang('Company Settings')</h5>
                    </div>
                    <form action="{{ route('settings.company.store') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($company) ? $company->id : '' }}">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Company Name')</label>
                                    <input type="text" name="name" value="{{ isset($company) ? $company->name : '' }}"
                                        class="form-control" placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Phone Number')</label>
                                    <input type="text" name="phone"
                                        value="{{ isset($company) ? $company->phone : '' }}" class="form-control"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Phone Number'){{ ' 2' }}</label>
                                    <input type="text" name="phone2"
                                        value="{{ isset($company) ? $company->phone2 : '' }}" class="form-control"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Company Email')</label>
                                    <input type="text" name="email"
                                        value="{{ isset($company) ? $company->email : '' }}" class="form-control"
                                        placeholder="Enter Company Email">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Facebook')</label>
                                    <input type="text" name="facebook"
                                        value="{{ isset($company) ? $company->facebook : '' }}" class="form-control"
                                        placeholder="Enter Facebook">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Instagram')</label>
                                    <input type="text" name="instagram"
                                        value="{{ isset($company) ? $company->instagram : '' }}" class="form-control"
                                        placeholder="Enter Instagram">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('X'){{ '(Twitter)' }}</label>
                                    <input type="text" name="twitter"
                                        value="{{ isset($company) ? $company->twitter : '' }}" class="form-control"
                                        placeholder="Enter X">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Description')</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Company Description" rows="3">{{ isset($company) ? $company->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Company Address')</label>
                                    <textarea name="address" class="form-control" placeholder="Enter Company Address" rows="3">{{ isset($company) ? $company->address : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Company Address'){{ ' 2' }}</label>
                                    <textarea name="address2" class="form-control" placeholder="Enter Company Address" rows="3">{{ isset($company) ? $company->address2 : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Country')</label>
                                    @if ($company)
                                        <input type="hidden" name="country" value="{{ $company->country_id }}"
                                            id="country">
                                        <input type="hidden" name="state" value="{{ $company->state_id }}"
                                            id="state">
                                        <input type="hidden" name="city" value="{{ $company->city_id }}"
                                            id="city">
                                    @endif
                                    <select class="form-control form-small select" name="country_id" id="country_id">
                                        <option>@lang('Select')</option>
                                        @foreach ($countries as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('State')</label>
                                    <select class="form-control form-small select" name="state_id" id="state_id">
                                        <option>@lang('Select')</option>
                                        @foreach ($states as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('City')</label>
                                    <select class="form-control form-small select" name="city_id" id="city_id">
                                        <option>@lang('Select')</option>
                                        @foreach ($cities as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="input-block mb-3">
                                    <label>@lang('Site Logo')</label>
                                    <div class="input-block service-upload logo-upload mb-0">
                                        <div class="drag-drop">
                                            <h6 class="drop-browse align-center">
                                                <span class="text-info me-1">@lang('Click To Replace')</span> @lang('or Drag and Drop')
                                            </h6>
                                            <p class="text-muted">SVG, PNG, JPG (Max 800*400px)</p>
                                            <input name="site_logo" type="file">
                                        </div>
                                        <span class="sites-logo">
                                            @php
                                                if (isset($company)) {
                                                    $logo = Storage::url('logos/' . $company->site_logo);
                                                } else {
                                                    $logo = 'assets/img/images.png';
                                                }
                                            @endphp
                                            <img src="{{ asset($logo) }}" alt="upload"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <div class="input-block mb-4">
                                    <label>@lang('Favicon')</label>
                                    <div class="input-block service-upload logo-upload mb-0">
                                        <div class="drag-drop">
                                            <h6 class="drop-browse align-center">
                                                <span class="text-info me-1">@lang('Click To Replace')</span> @lang('or Drag and Drop')
                                            </h6>
                                            <p class="text-muted">SVG, PNG, JPG (Max 35*35px)</p>
                                            <input name="favicon" type="file">
                                        </div>
                                        <span class="sites-logo">
                                            @php
                                                if (isset($company)) {
                                                    $logo2 = Storage::url('logos/' . $company->favicon);
                                                } else {
                                                    $logo2 = 'assets/img/images.png';
                                                }
                                            @endphp
                                            <img src="{{ asset($logo2) }}" alt="upload">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <div class="input-block mb-4">
                                    <label>@lang('White Logo')</label>
                                    <div class="input-block service-upload logo-upload mb-0">
                                        <div class="drag-drop">
                                            <h6 class="drop-browse align-center">
                                                <span class="text-info me-1">@lang('Click To Replace')</span> @lang('or Drag and Drop')
                                            </h6>
                                            <p class="text-muted">SVG, PNG, JPG (Max 800*400px)</p>
                                            <input name="company_icon" type="file">
                                        </div>
                                        <span class="sites-logo">
                                            @php
                                                if (isset($company)) {
                                                    $logo3 = Storage::url('logos/' . $company->company_icon);
                                                } else {
                                                    $logo3 = 'assets/img/images.png';
                                                }
                                            @endphp
                                            <img src="{{ asset($logo3) }}" alt="upload"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="btn-path text-end">
                                    <a href="javascript:void(0);"
                                        class="btn btn-cancel bg-primary-light me-3">@lang('Cancel')</a>
                                    @can('settings.company.store')
                                        <button type="submit" class="btn btn-primary">@lang('Save Changes')</button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('settings.js')
@endsection
