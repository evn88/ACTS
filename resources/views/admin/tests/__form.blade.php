    @csrf

    <admin-add-test-component></admin-add-test-component>


    <div class="row">
        <div class="form-group butt lesson">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </div>


@push('scripts')
    <script>

    </script>
@endpush
