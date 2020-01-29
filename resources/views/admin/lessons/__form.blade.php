    @csrf
    <div class="row row_2 lesson">
        <div class="form-group">
            <label for="name">Название урока:</label>
            <input type="text" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $lessons->name ?? '' }}"
                required
            >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <p>Текст урока:</p>
            <div class="input-group">
                <textarea
                rows="20"
                name="lesson_text"
                placeholder="Напишите текст урока здесь"
                class="form-control @error('lesson_text') is-invalid @enderror"
                value="{{ old('lesson_text') ?? $lessons->lesson_text ?? '' }}"
                required></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group butt lesson">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </div>