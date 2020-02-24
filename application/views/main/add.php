<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/add" method="post">
                            <div class="form-group">
                                <label>ФиО</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Номер телефона</label>
                                <input class="form-control" type="text" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label>Адрес</label>
                                <input class="form-control" type="text" name="adress">
                            </div>
                            <div class="form-group">
                                <label>Тип устройства</label>
                                <select class="form-control" name="type">
                                    <option value="Телевизор">Телевизор</option>
                                    <option value="Телефон">Телефон</option>
                                    <option value="Ноутбук">Ноутбук</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Модель</label>
                                <input class="form-control" type="text" name="model">
                            </div>
                            <div class="form-group">
                                <label>Серийный номер</label>
                                <input class="form-control" type="text" name="sn">
                            </div>
                            <div class="form-group">
                                <label>Неисправность</label>
                                <input class="form-control" type="text" name="broken">
                            </div>
                            <div class="form-group">
                                <label>Техническое состояние</label>
                                <input class="form-control" type="text" name="tech">
                            </div>
                            <div class="form-group">
                                <label>Комплектация</label>
                                <input class="form-control" type="text" name="complectation">
                            </div>
                            <div class="form-group">
                                <label>Доп. информация</label>
                                <textarea class="form-control" rows="3" name="text"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>