namespace SocialService.Modules.Comments.Core.Entities
{
    public class Comment
    {    
        public int Id { get; }
        public int PostId { get; set; }
        public int UserId { get; set; }
        public int? RepleyId { get; set; }  
        public string CommentText { get; set; }  
    }
}
