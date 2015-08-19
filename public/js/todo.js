function Todo(id){
  this.id = id;
}

Todo.prototype.delete = function(){
  var aj = $.ajax( {    
    url:'http://localhost/ss-panel',  
    type:'GET',    
    success:function(data) {
      alert(data);
    },    
    error:function() {    
        alert("异常！");    
    }    
  }); 
};

Todo.prototype.finish = function(){
  alert("完成");
};