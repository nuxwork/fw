<div class="fly-todo" style="margin:50px;">

  <?php $i = 0; ?>
  <?php foreach ($todos as $todo) { ?>
  <?php $i += 1; ?>
  <div id="id-todo-<?php echo $todo->id; ?>" class="fly-todo-item" data-toggle="context" data-target="#id-todo-menu">
    <img class="fly-todo-priority" src="./img/todo/todo-priority-1.png">
    <span class="fly-todo-name"><?php echo $todo->name; ?></span>
  </div>

    <?php if ($i < $todos->count()) { ?>
    <div class="fly-divider-horizantal"></div>
    <?php } ?>
  <?php } ?>  


  <div id="id-todo-menu">
    <ul class="dropdown-menu context-menu" role="menu">
      <li id="id-todo-menu-finish" class="context-menu-item" oncontextmenu='return false'>完成</li>
      <li id="id-todo-menu-modify" class="context-menu-item" oncontextmenu='return false'>修改</li>
      <li id="id-todo-menu-delete" class="context-menu-item" oncontextmenu='return false'>删除</li>
    </ul>
  </div>
</div>

<script type="text/javascript">
  $('.fly-todo-item').contextmenu({
    onItem: function (context, e) {
      alert($(e.target).text());
    }
  });
</script>

