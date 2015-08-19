function Todo(id){
  this.id = id;
}

Todo.prototype.delete = function(){
  alert("删除");
}

Todo.prototype.finish = function(){
  alert("完成");
}