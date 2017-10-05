<?php  
	echo $this->Html->link('Add Post',array('action' => 'add'));
?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script type="text/javascript">
var myApp = angular.module('myApp',[]);


myApp.controller('postController',['$scope','$http',function($scope,$http){

	// $scope.$on('LOAD',function(){$scope.loading=true});
	// $scope.$on('UNLOAD',function(){$scope.loading=false});

	$scope.getPostData = function() {
		// $scope.$emit('LOAD');
		$scope.posts = [];
		$http.get('posts/postLists')
		.then(function success(e){
			$scope.posts = e.data;
			// $scope.$emit('UNLOAD');
		}, function error(e){

		});
	}
	$scope.getPostData();

	$scope.addPost = function(){

		$scope.datas = {
			data : {
				Post : {
					title : $scope.title,
					body : $scope.body,
					author : $scope.author
				}
			}
		};
		if($scope.title && $scope.body && $scope.author){
			$http.post('posts/add',$scope.datas)
			.then(function success(e){
				if(e.data.message == "success"){
					$scope.getPostData();
				}
			},function error(e){
			});
		}
		$scope.title = "";
		$scope.body = "";
		$scope.author = "";
	}

	var index;
	$scope.editPost = function(item){
		index = item.Post.id;
		$scope.title = item.Post.title;
		$scope.body = item.Post.body;
		$scope.author = item.Post.author;
	}

	$scope.updatePost = function(){
		$scope.datas = {
			data : {
				Post : {
					id : index,
					title : $scope.title,
					body : $scope.body,
					author : $scope.author
				}
			}
		};
		
		$http.post('posts/update',$scope.datas)
		.then(function success(e){
			if(e.data.message == "success"){
				$scope.getPostData();
			}
		},function error(e){
		});
		$scope.first = false;
		$scope.toggle();

		$scope.title = "";
		$scope.body = "";
		$scope.author = "";
		index = "";
	}

	$scope.deletePost = function(item){
		$scope.datas = {
			data : {
				Post : {
					id : item.Post.id,
				}
			}
		};
		
		// $scope.$emit('LOAD');
		$http.post('posts/delete',$scope.datas)
		.then(function success(e){
			if(e.data.message == "success"){
				$scope.getPostData();
			}
			// $scope.$emit('UNLOAD');
		},function error(e){
		});
		index = "";
	}

	$scope.first = false;
	$scope.toggle = function(){
		if($scope.first == false){
			$scope.first = true;
		}
		else
			$scope.first = false;
	}
}]);
</script>

<div ng-app="myApp">
	<div ng-controller="postController">
		<div>
			<form id="PostIndexForm" method="post" accept-charset="utf-8" class="ng-pristine ng-valid" ng-submit="">
				<div style="display:none;">
					<input type="hidden" name="_method" value="POST" autocomplete="off">
				</div>
				<div class="input text">
					<label for="PostTitle">Title</label>
					<input name="data[Post][title]" maxlength="50" ng-model="title" type="text" id="PostTitle">
				</div>
				<div class="input text">
					<label for="PostBody">Body</label>
					<input name="data[Post][body]" maxlength="100" ng-model="body" type="text" id="PostBody">
				</div>
				<div class="input text">
					<label for="PostAuthor">Author</label>
					<input name="data[Post][author]" maxlength="50" ng-model="author" type="text" id="PostAuthor">
				</div>
				<div class="submit">
					<input type="submit" value="Save" ng-hide="first" ng-click="addPost()">
					<input type="submit" value="Update" ng-hide="!first" ng-click="updatePost(); toggle();">
				</div>
			</form>
			<?php  
				// echo $this->Form->create("Post");
				// echo $this->Form->input('title');
				// echo $this->Form->input('body');
				// echo $this->Form->input('author');
				// echo $this->Form->button('Save',array('type' => 'submit','ng-hide' => 'first', 'ng-click'=>'addPost()'));
				// echo $this->Form->button('Update',array('type' => 'submit','ng-hide' => '!first', 'ng-click'=>'updatePost(); toggle();'));
			?>
		</div>
		<div style="position: relative;"><?php echo $this->Html->image('tenor.gif', array('class' => 'hide', 'id' => 'loader')); ?></div>
		<div>
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Body</th>
						<th>Author</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<div ng-show="loading" id="load"><?php echo $this->Html->image('tenor.gif'); ?></div>
					<tr ng-repeat="post in posts">
						<td>{{ post.Post.id }}</td>
						<td>{{ post.Post.title }}</td>
						<td>{{ post.Post.body }}</td>
						<td>{{ post.Post.author }}</td>
						<td><a href="#" ng-click="editPost(post); toggle();">Edit</a> || <a href="#" ng-click="deletePost(post);">Delete</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>