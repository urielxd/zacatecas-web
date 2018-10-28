<div class="form-group">
    <label for="">Imagén</label>
    {!! Form::file('image') !!}
</div>
{!! Form::hidden('category_id', $category->id, ['class' => 'form-control', 'required']) !!}
<div class="form-group">
    <label for="">Contenido</label>
    {!! Form::hidden('body', null, ['class' => 'form-control', 'required', 'id' => 'body-txt']) !!}
    <trix-editor input="body-txt"></trix-editor>
</div>
<div class="form-group">
    <button class="btn btn-primary btn-fill">
        Guardar
    </button>
</div>