using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using SocialService.Modules.Comments.Core.Entities;

namespace SocialService.Modules.Comments.Core.DAL.Configurations
{
    public class CommentsConfiguration : IEntityTypeConfiguration<Comment>
    {
        public void Configure(EntityTypeBuilder<Comment> builder)
        {
            builder.HasKey(x => x.Id);

            builder
                .Property(x => x.PostId)
                .IsRequired();

            builder
                .Property(x => x.UserId)
                .IsRequired();

            builder
                .Property(x => x.RepleyId)
                .IsRequired(false);  

            builder
                .Property(x => x.CommentText)
                .HasMaxLength(500)  
                .IsRequired();
        }
    }
}
