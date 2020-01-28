    @csrf
    <div class="row row_2">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Название группы:</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') ?? $groups->name ?? '' }}" required
                >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <p>Период обучения группы:</p>
                <div class="input-group">
                    <div class="form-group">
                        <label for="inputGroup">Укажите дату начала</label>
                        <div class="input-group datetimepicker2" id="datetimepicker2">
                            <input type="text" name="date_start"
                                class="form-control datetimepicker2 @error('date_start') is-invalid @enderror"
                                value="{{ old('date_start') ?? $groups->date_start ?? '' }}"
                            >
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('date_start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputGroup">Укажите дату окончания</label>
                        <div class="input-group datetimepicker2" id="datetimepicker2">
                            <input type="text" name="date_end"
                                class="form-control datetimepicker2 @error('date_end') is-invalid @enderror"
                                value="{{ old('date_end') ?? $groups->date_end ?? '' }}"
                            >
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('date_end')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="formGroupThemeInput">Темы для изучения</label>
                @foreach($plans as $plan)
                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" name="plans[]" class="custom-control-input" id="plan-{{ $plan->id }}"
                        value="{{ $plan->id }}"
                        @if(isset($groups) && $groups->inPlan($plan->id))
                            checked
                        @endif
                    >
                    <label class="custom-control-label" for="plan-{{ $plan->id }}">{{ $plan->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group butt">
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
                <button type="submit" class="btn btn-primary float-right">Сохранить</button>
            </div>
        </div>
        <div class="col">
            <div class="form-group butt">
                @if(isset($groups))
                    <a class="btn btn-secondary" href="javascript:;"
                        data-toggle="modal"
                        data-target="#deleteConfirm"
                        data-route="{{ route('groups.destroy', $groups->id) }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                @endif
            </div>
        </div>
    </div>