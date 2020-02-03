    @csrf
    <div class="row row_2 lesson">
        <div class="form-group">
            <label for="name">Название шаблона:</label>
            <input type="text" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $attacks->name ?? '' }}"
                required
            >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <p>Шаблон письма:</p>
                <textarea
                id="ckeditor"
                rows="20"
                name="mail_template"
                placeholder="Напишите текст шаблона здесь"
                class="form-control @error('mail_template') is-invalid @enderror"
                >{{ old('mail_template') ?? $attacks->mail_template ?? '' }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group butt lesson">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </div>
