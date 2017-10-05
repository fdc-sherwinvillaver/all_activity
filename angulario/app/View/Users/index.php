<?php echo $this->Html->script(array('socket.io-1.2.0','jquery-1.11.1','angular.min','angular')); ?>
<script>
var myChat = angular.module('myChat',[]);

myChat.controller('ChatContoller',['$scope','$http','$compile',function($scope,$http,$compile){
  //connecting sockets
  var socket = io.connect('http://local.angulario.com:3000');
  var username = "";
  var logged_in_user = "";
   var div = "";
  var socket_user_id;
  var name;
  var room;
  var user_name;

  socket.on('connect', function(){
      username = prompt('What is your name: ?')
      if(username){
        $('#welcome').html(username);
        logged_in_user = username;
        socket.emit('adduser', username);
      }
      username = "";
  });

  socket.on('update_online', function (usernames, username,socketid) {
    $('.friend-list').empty();
      var li = "";
      $.each(usernames, function(key, value) {
        if(value == username || value == null){

        }
        else {
          li += '<li class="bounceInDown" id="'+ value +'">';
          li += '<a href="#" class="clearfix" id="'+ socketid[value] +'" data-id="'+ value +'" ng-click="selectUser($event)">';
          li += '<?php echo $this->Html->image("kirito.png",array("id" => "prof-image","class" => "img-circle pull-left")); ?>';
          li += '<div class="friend-name">';
          li += '<strong>'+ value +'</strong>';
          li += '<p class="small">Online</p>';
          li += '</div>';
          li += '</a>';
          li += '</li>';
          $('.friend-list').append($compile(li)($scope));
        }
      });

      var duplicateChk = {};
      $('li[id]').each(function(key, value){
        if (duplicateChk.hasOwnProperty(this.id)) {
           $(this).remove();
        } else {
           duplicateChk[this.id] = 'true';
        }
      });

  });

  // update list of users online
  socket.on('update_list', function (usernames,username,status,socketid) {
    $('.friend-list').empty();
    //adding list
    if(status == 'add') {
      var li = "";
      $.each(usernames, function(key, value) {
        if(value == username || value == null){
            li += '<li class="bounceInDown" id="'+ value +'">';
            li += '<a href="#" class="clearfix" id="'+ socketid[value] +'" data-id="'+ value +'" ng-click="selectUser($event)">';
            li += '<?php echo $this->Html->image("kirito.png",array("id" => "prof-image","class" => "img-circle pull-left")); ?>';
            li += '<div class="friend-name">';
            li += '<strong>'+ value +'</strong>';
            li += '<p class="small">Online</p>';
            li += '</div>';
            li += '</a>';
            li += '</li>';
            $('.friend-list').append($compile(li)($scope));
        }
        else{
          
        }
      });
    }
    //deleting list
    else {
      var selector = '#'+usernames;
      if(selector != '#null'){
        $(selector).remove();
        logged_in_user = "";
      }
    }
  });

  socket.on('message',function (name,message,new_room){
    if(message == "notify"){
      var calling = confirm(name + " wants to chat with you.!");
      if(calling == true){
        socket.emit('join_room',new_room);
        socket.emit('sendchat',name,"accepted");
        $("input").prop('disabled', false);
        $('.bounceInDown').addClass('active');
      }
      else{
        
      }
    }
    else if(message == "accepted"){
      $('.bounceInDown').addClass('active');
      $("input").prop('disabled', false);
    }
    else if(message == "left"){
      alert(name +' has left the room');
      $('.bounceInDown').removeClass('active');
      $("input").prop('disabled', true);
      socket.emit('leave_room');
      $('.chat-conversation').html('');
    }
    else{
        div += '<br><div id="other_user" class="pull-left message" style="padding-top: 7px;">';
        div += '<?php echo $this->Html->image("kirito.png",array("alt" => "","width" => "32","height" => "32")); ?>';
        div += '&nbsp;&nbsp;&nbsp;<b>'+ name +'</b><br>';
        div += '<div class="chat-message container">';
        div += '<div class="chat-message-content clearfix">';
        div += '<p></p>';
        div += '<p class="small pull-right chat text-center">'+ message +'</p>';
        div += '</div>';
        div += '</div>';
        div += '<div class="chat-time">';
        div += '<p class="chat-time small text-muted pull-right">13:35</p>';
        div += '</div>';
        div += '</div>';
        $('.chat-conversation').append(div);
        div = "";
        $scope.message = "";
        $(".chat-conversation").stop().animate({ scrollTop: $(".chat-conversation")[0].scrollHeight}, 1000);
    }
  });
  
  
  $scope.selectUser = function(obj){
    obj.preventDefault();
    $('.chat-conversation').html('');
    var target = angular.element(obj.currentTarget);
    var user_clicked = target.attr('id');
    name = target.attr('data-id');
    user_name = name;
    socket_user_id = user_clicked;
    room = logged_in_user + name;
    socket.emit('send_notification',logged_in_user,"notify",socket_user_id,room);
    socket.emit('join_room',room);
  }

  $scope.sendMessage = function(e){
    e.preventDefault();
    socket.emit('sendchat',logged_in_user,$scope.message,socket_user_id);

    div += '<br><div id="me_user" class="pull-right message" style="background-color:#00BCD4; border-radius:10px; padding-top: 7px;">';
    div += '<?php echo $this->Html->image("kirito.png",array("alt" => "","width" => "32","height" => "32")); ?>';
    div += '&nbsp;&nbsp;&nbsp;<b>'+ logged_in_user +'</b><br>';
    div += '<div class="chat-message container">';
    div += '<div class="chat-message-content clearfix">';
    div += '<p></p>';
    div += '<p class="small pull-right chat text-center">'+$scope.message+'</p>';
    div += '</div>';
    div += '</div>';
    div += '<div class="chat-time">';
    div += '<p class="chat-time small text-muted pull-right">13:35</p>';
    div += '</div>';
    div += '</div>';
    $('.chat-conversation').append(div);
    div = "";
    $scope.message = "";
    $(".chat-conversation").stop().animate({ scrollTop: $(".chat-conversation")[0].scrollHeight}, 1000);
  }

}]);

</script>


<header class="masthead" ng-controller="ChatContoller">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-7 my-auto">
        <div class="header-content mx-auto">
          <div class="screen">
            <div class="userlist-box">
              <br>
              <div class="container">
                <div class="userlist-header">
                  <div class="text-center"><p>List of Users Online</p></div>
                </div>
              </div>
              <div class="user-list col-md-12">
                <br>
                  <div class="text-center">
                    
                    <ul class="friend-list">

                    </ul>

                    <hr>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 my-auto">
        <div class="device-container">
          <div class="device-mockup iphone6_plus portrait white">
            <div class="device">
              <div class="screen">
                <div class="chat-box">
                  <br>
                  <div class="container">
                    <div class="chat-header">
                      <?php echo $this->Html->image('kirito.png',array('id' => 'prof-image','class' => 'img-circle pull-left')); ?>
                      <p class="small pull-left" id="welcome"></p>
                      <p id="welcome" class="small"><a class="pull-right" href="#">Logout</a></p>
                    </div>
                      <p class="small pull-right"><a href="#">My Account</a></p>
                  </div>
                  <div class="chatting">
                    <p id="other_user" class="small pull-left"></p>
                  </div>
                  <div class="chat-conversation col-md-12">
                    
                  </div>
                  <div class="chat-form">
                    <form action="#" method="post" ng-submit="sendMessage($event)">
                    <fieldset>
                      <input type="text" class="form-control" ng-model="message" placeholder="Type your message…" autocomplete="off" disabled>
                    </fieldset>
                  </form>
                  </div>   
                </div>
                <button type="submit"></button>      
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>