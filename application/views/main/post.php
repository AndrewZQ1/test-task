<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
           <div class="card-header d-flex">
                <div class="name-block d-flex">
                    <span class="name-title"><?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?></span>
                    <div class="btn-group mx-3">
                      <button type="button" class="status btn btn-sm <?php echo htmlspecialchars($data['color'], ENT_QUOTES); ?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($data['status'], ENT_QUOTES); ?>
                      </button>
                      <div class="dropdown-menu">
                        <form method="post" action="/status/<?php echo $data['id']; ?>">
                            <button class="dropdown-item" name="status"  value="Диагностика">Диагностика</button>
                            <button class="dropdown-item" name="status"  value="В работе" >В работе</button>
                            <button class="dropdown-item" name="status"  value="Готов" >Готов</button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" name="status"  value="Без ремонта" >Без ремонта</button>
                            <button class="dropdown-item" name="status" data-name="close"  data-toggle="modal" data-target="#mymodal"  value="Закрыт" data-id="<?php echo $data['id'] ?>" >Закрыт</button>
                        </form>
                      </div>
                    </div>
                </div>
                <div class="print">
                    
                </div>
           </div>
           <div class="post-card card-body mx-3">
               <div class="">
                   <div class="row">
                       <dt>Котактный номер:</dt>
                       <dd><?php echo htmlspecialchars($data['phone_number'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Адрес:</dt>
                       <dd><?php echo htmlspecialchars($data['addres'], ENT_QUOTES); ?></dd>
                   </div>
               </div>
                <div class="">
                   <div class="row">
                       <dt>Тип устройства:</dt>
                       <dd><?php echo htmlspecialchars($data['type_client'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Модель:</dt>
                       <dd><?php echo htmlspecialchars($data['model'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Серийный номер:</dt>
                       <dd><?php echo htmlspecialchars($data['sn'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Неисправнрость:</dt>
                       <dd><?php echo htmlspecialchars($data['broken'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Состояние:</dt>
                       <dd><?php echo htmlspecialchars($data['tech'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Комплектация:</dt>
                       <dd><?php echo htmlspecialchars($data['comlectation'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row">
                       <dt>Опсание:</dt>
                       <dd><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row filed remont">
                       <dt>Произведенный ремонт:</dt>
                       <dd><?php echo htmlspecialchars($data['remont'], ENT_QUOTES); ?></dd>
                   </div>
                   <div class="row filed">
                       <dt>Сумма ремонт:</dt>
                       <dd><?php echo htmlspecialchars($data['symma'], ENT_QUOTES); ?> BYN</dd>
                   </div>
                   <div class="row filed garanty">
                       <dt>Гарантия:</dt>
                       <dd><?php echo htmlspecialchars($data['garanty'], ENT_QUOTES); ?></dd>
                   </div>
                   <!-- <div class="pole">
                     <div class="field bg-success symma">Сумма: <?php echo htmlspecialchars($data['symma'], ENT_QUOTES); ?> BYN</div>
                     <div class="field bg-primary garanty">Гарантия: <?php echo htmlspecialchars($data['garanty'], ENT_QUOTES); ?></div>
                   </div> -->
               </div>
               <div class="button row my-3">
                   <a href="/edit/<?php echo $data['id']; ?>" class="btn btn-primary">Редактировать</a>
                   <button type="button" class="btn btn-danger mx-2" data-toggle="modal" data-target="#mymodaldel">Удалить</button>
               </div>
            </div>
            <div class="card-footer text-muted row">
                <div class="date-opren mx-3">Дата открытия: <?php echo htmlspecialchars($data['date_time'], ENT_QUOTES); ?></div>
                <div class="date-close mx-3 filed">Дата закрытия: <?php echo htmlspecialchars($data['date_close'], ENT_QUOTES); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="mymodaldel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Удалить клиента</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Вы действительно хотите удалить клиента?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Нет</button>
        <a href="/delete/<?php echo $data['id']; ?>" class="btn btn-primary">Да</a>
      </div>
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