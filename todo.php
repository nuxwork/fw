<div class="fly-todo" style="margin:50px;">

  <?php for($i=0; $i!=6; $i++){ ?>
  <div class="fly-todo-item" data-toggle="context" data-target="#context-menu">
    <img class="fly-todo-priority" src="./img/todo/todo-priority-1.png">
    周末去爬梧桐山
  </div>
    <?php if($i < 5) { ?>
    <div class="fly-divider-horizantal"></div>
    <?php } } ?>


  <div id="context-menu">
	  <ul class="dropdown-menu context-menu" role="menu">
	  	<li class="context-menu-item" oncontextmenu='return false'>Finish</li>
	  	<li class="context-menu-item" oncontextmenu='return false'>Delete</li>
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

