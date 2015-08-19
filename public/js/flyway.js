$('.fly-todo-item').contextmenu({
  onItem: function (context, e) {
    var msg = "context= " + 0 + " menu= " + e.target.id;
    var todo = new Todo(0);
    if(e.target.id == 'id-todo-menu-finish'){
      todo.finish();
    }else if(e.target.id == 'id-todo-menu-delete'){
      todo.delete();
    }else if(e.target.id == 'id-todo-menu-modify'){
      alert("modify");
    }
  }
});

$('.fly-todo-container').mCustomScrollbar({
  scrollButtons:{enable:true},
  theme:"light-thick",
  scrollbarPosition:"outside"
});