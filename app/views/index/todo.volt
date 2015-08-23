<div class="fly-todo-container" style="margin:50px;">
  <table class="fly-todo">
    
    {% for todo in todos %}
    <tr class="fly-todo-item" data-toggle="context" data-target="#id-todo-menu">
      <td><img class="fly-todo-priority" src="./img/todo/todo-priority-{{ todo.priority }}.png"></td>
      <td style="padding-right:10px;">{{ todo.title }}</td>
    </tr>
    {% endfor %}

  </table>
</div>

<div id="id-todo-menu">
  <ul class="dropdown-menu context-menu" role="menu" oncontextmenu='return false'>
    <li id="id-todo-menu-finish" class="context-menu-item">完成</li>
    <li id="id-todo-menu-modify" class="context-menu-item">修改</li>
    <li id="id-todo-menu-delete" class="context-menu-item">删除</li>
  </ul>
</div>
