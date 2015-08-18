<div class="fly-todo" style="margin:50px;">

  {% set i = 0 %}
  {% for todo in todos %}
  {% set i += 1 %}
  <div id="id-todo-{{ todo.id }}" class="fly-todo-item" data-toggle="context" data-target="#id-todo-menu">
    <img class="fly-todo-priority" src="./img/todo/todo-priority-{{ todo.priority }}.png">
    <span class="fly-todo-name">{{ todo.name }}</span>
  </div>

    {% if i < todos.count() %}
    <div class="fly-divider-horizantal"></div>
    {% endif %}
  {% endfor %}  


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

