<head>
<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<script>
var accounts = [];
var socket = io.connect('http://local.cakephp.com:3000');
var old_username;
var fullname = "<?php echo $data['first_name']; echo " "; echo $data['middle_name']; echo " "; echo $data['last_name']; ?>";

socket.on('connect', function(){
    socket.emit('adduser', fullname);
});

socket.on('updatechat', function (username, data) {
    // if(username == fullname){
    //     $('#conversation').append('<b>'+ username + ':</b> ' + data + '<br>');
    // }
    // else{
    //     $('#conversation').append('<p>'+ username + ':</p> ' + data + '<br>');
    // }
    console.log(accounts);
    console.log(data);
});


// socket.on('updaterooms', function (rooms, current_room) {
//     $('#rooms').empty();
//     $.each(rooms, function(key, value) {
//         if(value == current_room){
//             $('#rooms').append('<div>' + value + '</div>');
//         }
//         else {
//             $('#rooms').append('<div><a href="#" onclick="switchRoom(\''+value+'\')">' + value + '</a></div>');
//         }
//     });
// });


// socket.on('online', function (users) {
//     $('#users').empty();
//     $.each(users, function(key, value) {
//         // if(value == current_room){
//         //     // $('#rooms').append('<div>' + value + '</div>');
//         // }
//         // else {
//         //     // $('#rooms').append('<div><a href="#" onclick="switchRoom(\''+value+'\')">' + value + '</a></div>');
//         // }
//         if(value != fullname){
//             $('#users').append('<div><a href="#" onclick="chatPerson(\''+value+'\')">' + value + '</a></div>');
//         }
//         console.log(value);
//     });
// });



// function chatPerson(user){
//     socket.emit('chatPerson', user);
// }

// $(function(){
//     $('#datasend').click( function() {
//         var message = $('#data').val();
//         $('#data').val('');
//         socket.emit('sendchat', message);
//     });

//     $('#data').keypress(function(e) {
//         if(e.which == 13) {
//             $(this).blur();
//             $('#datasend').focus().click();
//         }
//     });

//     $('#roombutton').click(function(){
//         var name = $('#roomname').val();
//         $('#roomname').val('');
//         socket.emit('create', name)
//     });
// });

</script>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="list-group col-md-4">
    <?php foreach($users as $user): ?>

        <?php "<script>accounts.push(".$user['User']['first_name']." ".$user['User']['middle_name']." ".$user['User']['last_name'].");</script>"; ?>

        <a href="#" class="list-group-item list-group-item-action"><?php echo $user['User']['first_name']." ".$user['User']['middle_name']." ".$user['User']['last_name']; ?></a>
    <?php endforeach; ?>
    </div>
</div>

<!-- 
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-info">Cras sit amet nibh libero</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Vestibulum at eros</a> -->

<style type="text/css">
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>