{{ Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control', 'required'=>'required']) }}
{{ Form::hidden('procesada', '0', ['class'=>'form-control', 'required'=>'required']) }}
<div class="modal-body">
    <div class="row container-fluid">
        <div class="form-group">
            <label>Producto</label>
            {{ Form::select('producto_id', $productos, null, ['class'=>'form-control', 'placeholder'=>'--seleccione--','required'=>'required']) }}
        </div>
    </div>
</div>
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button> --}}
    {{Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
