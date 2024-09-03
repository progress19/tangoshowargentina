@extends('back.layout.default')
@section('title')
@lang($espectaculo->nombre)
@endsection
@section('styles')
<!--Switchery-->
<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet">
@endsection
@section('button_in_title_section')
<a href="" class="btn btn-round btn-custom-color waves-effect waves-light" data-toggle="modal" data-target="#modal-create-image"><i class="fa fa-plus"></i> @lang('NEW IMAGE')</a>
@endsection
@section('content')
<div class="row">
    <div class="col">
        @include('back.partials.alerts.success')
        @include('back.partials.alerts.error')
        <div class="card">
            <div class="card-header">
                @lang('SEARCH')
            </div>
            <div class="card-body">
                <form action="{{ route('back.admin.house.show.image.index', ['espectaculo_id' => $espectaculo->id]) }}">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('NAME')</label>
                                <input type="text" name="search_name" id="search_name" class="form-control" value="{{ request()->input('search_name') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>@lang('STATUS')</label>
                                <select name="search_status" id="search_status" class="form-control">
                                    <option value="" {{ request()->input('search_status') === '' ? 'selected' : '' }}></option>
                                    <option value="1" {{ request()->input('search_status') === '1' ? 'selected' : '' }}>@lang('AVAILABLE')</option>
                                    <option value="0" {{ request()->input('search_status') === '0' ? 'selected' : '' }}>@lang('NOT AVAILABLE')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-round btn-custom-color waves-effect waves-light float-right btn-preload"><i class="fa fa-search"></i> @lang('SEARCH')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                @if(request()->input())
                @lang('SEARCH RESULTS'): {{ $imagenes->total() }}
                @else
                @lang('IMAGES') ({{ $imagenes->total() }})
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('NAME')</th>
                                <th>@lang('IMAGE')</th>
                                <th>@lang('STATUS')</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-images">
                            @if($imagenes->total())
                            @foreach($imagenes as $imagen)
                            <tr id="{{ $imagen->id }}">
                                <th scope="row">{{ $imagen->id }}</th>
                                <td><a href="" class="btn-image-edit" data-imagen-id="{{$imagen->id}}" id="anchor-image-{{$imagen->id}}">{{ $imagen->denominacion }}</a></td>
                                <td>
                                    <a class="btn-show-image" data-imagen-id="{{ $imagen->id }}" href=""><img src="{{ asset('/public/img/shows/'.$imagen->nombre) }}" style="max-height: 100px;"></a>
                                </td>
                                <td>
                                    <form>
                                        <input type="hidden" name="id" value="{{ $imagen->id }}">
                                        <input type="checkbox" name="status" class="js-switch" id="js-switch-{{ $imagen->id }}" data-color="#02BA5A" data-size="small" {{ $imagen->status ? 'checked' : '' }}>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr id="no-images">
                                <td colspan="4">
                                    @lang('NO RESULTS FOUND')
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer" style="margin-bottom: 0">
                <!--<div class="text-center">-->
                {{ $imagenes->appends(request()->input())->links() }}
                <!--</div>-->
            </div>
        </div>
    </div>
</div>
<!-- Modal CREATE IMAGE -->
<div class="modal fade" id="modal-create-image" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-info animated fadeInLeftBig">
            <div class="modal-header bg-custom-color">
                <h5 class="modal-title text-white">@lang('NEW IMAGE')</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-create-image">
                <div class="modal-body">
                    @include('back.partials.alerts.error', ['elError' => 'error-create-image'])
                    {{ csrf_field() }}
                    <input type="hidden" name="imagen_espectaculo_id" value="{{ $espectaculo->id }}">
                    <div class="form-group">
                        <label>@lang('IMAGE NAME')</label>
                        <input type="text" class="form-control" name="imagen_denominacion">
                    </div>
                    <div class="form-group">
                        <label>@lang('SELECT IMAGE')</label>
                        <input class="image" type="file" name="imagen_archivo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-danger waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i> @lang('CLOSE')</button>
                    <button class="btn btn-round btn-success waves-effect waves-light" id="btn-save-image"><i class="fa fa-save"></i> @lang('SAVE')</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal SHOW IMAGE -->
<div class="modal fade" id="modal-show-image" tabindex="-1" style="text-align: center !important">
    <div class="modal-dialog" style="max-width: 100%; 
         width: auto !important; 
         display: inline-block; ">
        <div class="modal-content border-info animated fadeInLeftBig">

        </div>
    </div>
</div>
<!-- Modal EDIT IMAGE -->
<div class="modal fade" id="modal-image-edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-info animated fadeInLeftBig">
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!--Switchery Js-->
<script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}"></script>
<script>
function changeStatus(checkbox)
{
    var form = checkbox.closest('form');
    form.one('submit', function (e)
    {
        e.preventDefault();
        hideAlerts();
        var request = $.ajax({
            url: '<?= route('back.admin.house.show.image.status.save')?>',
            type: "POST",
            data: $(this).serialize()
        });
        handleRequestDone(request);
        handleRequestFailAndAlways(request);
    });
    form.trigger('submit');
}
function setSwitchs()
{
    $('.js-switch').each(function ()
    {
        new Switchery($(this)[0], $(this).data());
    });
    $('.js-switch').on('change', function ()
    {
        var checkbox = $(this);
        changeStatus(checkbox);
    });
}
function setSwitch(id)
{
    var chk = $('#js-switch-' + id);
    new Switchery(chk[0], chk.data());
    chk.on('change', function ()
    {
        var checkbox = $(this);
        changeStatus(checkbox);
    });
}

$('#modal-create-image').on('submit', '#form-create-image', function (e)
{
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    var request = $.ajax({
        contentType: false,
        processData: false,
        url: "<?= route('back.admin.house.show.image.store')?>",
        type: "POST",
        data: formData
    });
    handleRequestDone(request);
    request.done(function (data)
    {
//        console.log(data);
        $('#no-images').remove();
        $('#tbody-images').prepend(data.row);
        $('#modal-create-image').modal('hide');
        setSwitch(data.id);
    });
    handleRequestFailAndAlways(request, null, $('#error-create-image'));
});
$(document).on('click', ".btn-show-image", function (e)
{
    e.preventDefault();
    var id = $(this).data('imagen-id');
    if (id != 0)
    {
        var request = $.ajax({
            url: "{{ route('back.admin.house.show.image.show') }}",
            type: "GET",
            data: {
                id: id,
            }
        });
        request.done(function (data)
        {
            var modal = $('#modal-show-image');
            $('#modal-show-image .modal-content').html(data);
            // Display Modal
            modal.modal('show');
        });
    }
});
setSwitchs();
$(document).on('click', ".btn-image-edit", function (e)
{
    e.preventDefault();
    var id = $(this).data('imagen-id');
    if (id != 0)
    {
        var request = $.ajax({
            url: "{{ route('back.admin.house.show.image.edit') }}",
            type: "GET",
            data: {
                id: id,
            }
        });
        request.done(function (data)
        {
            var modal = $('#modal-image-edit');
            $('#modal-image-edit .modal-content').html(data);
            // Display Modal
            modal.modal('show');
        });
    }
});

$('#modal-image-edit').on('submit', '#form-image-edit', function (e)
{
    e.preventDefault();
    var request = $.ajax({
        url: "<?= route('back.admin.house.show.image.update')?>",
        type: "POST",
        data: $(this).serialize()
    });
    handleRequestDone(request);
    request.done(function (data)
    {
        $('#anchor-image-' + data.img_id).text(data.img_text);
        $('#modal-image-edit').modal('hide');
    });
    handleRequestFailAndAlways(request, $('#modal-image-edit'), $('#error-image-edit'), false);
});
</script>
@endsection