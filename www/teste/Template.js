
Template.post.events({"submit form": function(e, Template){
	e.preventDefault();
	var textarea= Template.find("textArea");
	var posts = Session.get("posts")||[];
	posts.push({message:textarea.value});
	Session.set("posts",posts);
	textarea="";
}});


Template.timeline.helpers({
	posts:function(){
		return Post.find({});
	}
});


Post.publish = function(message){
	this.insert({
		message:message,
		date:new Date(),
		userId:Meteor.userId()

	});
};
Post.list=function(userId){

return this.find({userId:userId});

};


Router.map(function(){
	this.route('home',{
		path:'/',
		template:'home',
		layuotTemplate:'layout',
		var _id = Meteor.userId();
		data:function(){
			return{
				posts: Post.list(_id),
				followers:Friendship.followers(_id),
				followings:Friendship.followings(_id)
			
			}
		}
	})
});
