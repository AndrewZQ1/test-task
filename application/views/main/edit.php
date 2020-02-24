<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/edit/<?php echo $data['id']; ?>" method="post">
                            <div class="form-group">
                                <label>ФиО</label>
                                <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Номер телефона</label>
                                <input class="form-control" type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($data['phone_number'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Адрес</label>
                                <input class="form-control" type="text" name="adress" value="<?php echo htmlspecialchars($data['addres'], ENT_QUOTES); ?>">
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
                                <input class="form-control" type="text" name="model" value="<?php echo htmlspecialchars($data['model'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Серийный номер</label>
                                <input class="form-control" type="text" name="sn" value="<?php echo htmlspecialchars($data['sn'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Неисправность</label>
                                <input class="form-control" type="text" name="broken" value="<?php echo htmlspecialchars($data['broken'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Техническое состояние</label>
                                <input class="form-control" type="text" name="tech" value="<?php echo htmlspecialchars($data['tech'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Комплектация</label>
                                <input class="form-control" type="text" name="complectation" value="<?php echo htmlspecialchars($data['comlectation'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Доп. информация</label>
                                <textarea class="form-control" rows="3" name="text"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>