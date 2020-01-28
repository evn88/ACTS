    @csrf
    <input type="hidden" name="id" value="{{ ($plans->id) ?? $plans->id ?? '' }}">
    <div class="row row_2">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Название темы:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $plans->name ?? '' }}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <p>Иконка для темы:</p>
                <div class="custom-file">
                    <input type="file" name="img_file" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group butt">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

            @if(isset($user))
            <a href="{{ url('admin/groups/'.$user->id.'/delete') }}" class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i></a>
            @endif

            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </div>