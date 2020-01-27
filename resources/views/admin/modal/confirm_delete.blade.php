<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Удаление записи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Уверены что хотите удалить запись?</b></p>
                <p class="alert alert-info">Пользователи которые были закреплены за этой группой станут "свободными" и их нужно будет заново привязать к другой группе для обучения</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Нет</button>
                <form id="deleteForm" method="POST" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-primary">Да</button>
                </form>
            </div>
        </div>
    </div>
</div>