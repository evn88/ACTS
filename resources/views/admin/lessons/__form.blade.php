    @csrf
    <div class="row row_2 lesson">
        <div class="form-group">
            <label for="name">Название урока:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $groups->name ?? '' }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <p>Текст урока:</p>
            <div class="input-group">
                <textarea class="form-control" rows="20" name="" placeholder="Напишите текст урока здесь"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group butt lesson">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

            @if(isset($groups))
                <!-- <a href="{{ url('admin/groups/'.$groups->id.'/delete') }}" class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

                {{ Form::open(['route' => ['groups.destroy', $groups->id], 'method' => 'DELETE']) }}
                <button type="submit"  class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                {{ Form::close() }}
            @endif

            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </div>