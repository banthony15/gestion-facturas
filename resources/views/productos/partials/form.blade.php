<div class="modal-body">
    <div class="row container-fluid">
        <div class="form-group">
            <label>Nombre</label>
            {{ Form::text('nombre', null, ['class'=>'form-control', 'required'=>'required']) }}
        </div>
        <div class="form-group">
            <label>Precio</label>
            {{ Form::text('precio', null, ['class'=>'form-control', 'required'=>'required']) }}
        </div>
        <div class="form-group">
            <label>Impueto</label>
            {{ Form::number('impuesto', null, ['class'=>'form-control', 'required'=>'required']) }}
        </div>
    </div>
</div>
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button> --}}
    {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
