<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <?php if(empty($count)): ?>
            <div class="card-header">Клиенты</div>
            <?php else: ?>
            <div class="card-header">Клиенты <span class="badge badge-primary"><?php echo $count; ?></span></div>
            <?php endif; ?>
            <div class="card-body">
                <div class="row">
                    <div class="w-100">
                        <?php if (empty($list)): ?>
                            <p>Список клиентов пуст</p>
                        <?php else: ?>
                            <table class="table table-striped">
                                <thead >
                                    <tr>
                                      <th>Клиент</th>
                                      <th>Статус</th>
                                      <th>Устройтсво</th>
                                      <th>Модель</th>
                                      <th>Неисправность</th>
                                      <th>Дата приема</th>
                                    </tr>
                                </thead>
                                <?php foreach ($list as $val): ?>
                                    <tbody>
                                        <tr ondblclick="location.href='/post/<?php echo $val['id']; ?>'">
                                            <td class="name"><span class="name-wrap"><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></span> <br> <a href="tel:<?php echo $val['phone_number']; ?>"><?php echo htmlspecialchars($val['phone_number'], ENT_QUOTES); ?></a> </td>
                                            <td>
                                                <div class="btn-group">
                                                  <button type="button" class="status btn btn-sm <?php echo htmlspecialchars($val['color'], ENT_QUOTES); ?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($val['status'], ENT_QUOTES); ?>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <form method="post" action="/status/<?php echo $val['id']; ?>">
                                                        <button class="dropdown-item" name="status"  value="Диагностика">Диагностика</button>
                                                        <button class="dropdown-item" name="status"  value="В работе" >В работе</button>
                                                        <button class="dropdown-item" name="status" data-name="ready" value="Готов" >Готов</button>
                                                        <div class="dropdown-divider"></div>
                                                        <button class="dropdown-item" name="status"  value="Без ремонта" >Без ремонта</button>
                                                        <button class="dropdown-item" name="status" data-name="close"  data-toggle="modal" data-target="#mymodal" data-id="<?php echo $val['id'] ?>" value="Закрыт" >Закрыт</button>
                                                    </form>
                                                  </div>
                                                </div>
                                            </td>
                                            <td><?php echo htmlspecialchars($val['type_client'], ENT_QUOTES); ?></td>
                                            <td><?php echo htmlspecialchars($val['model'], ENT_QUOTES); ?></td>
                                            <td><?php echo htmlspecialchars($val['broken'], ENT_QUOTES); ?></td>
                                            <td><?php echo htmlspecialchars($val['date_time'], ENT_QUOTES); ?></td>
                                            <!-- <td><a href="/delete/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a></td> -->
                                        </tr>
                                    </tbody>

                                <?php endforeach; ?>
                            </table>
                      </div>
                </div>
            </div>
            <?php echo $pagination; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

                                                                            <!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Закрыть заказ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" class="close-offer">
        <div class="modal-body">
          <div class="form-group">
              <label>Произведенный ремонт</label>
              <input class="form-control" type="text" name="remont">
          </div>
          <div class="row">
              <div class="form-group col-md-6">
                  <label>Гарантия</label>
                  <input class="form-control" type="text" name="garanty">
              </div>
              <div class="form-group col-md-6">
                  <label>Сумма</label>
                  <input class="form-control" type="text" name="symma" id="symma">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
          <button type="submit" class="btn btn-primary" name="close-add">Закрыть заказ</button>
          
        </div>
      </form>
    </div>
  </div>
</div>