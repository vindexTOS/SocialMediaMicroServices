using Microsoft.EntityFrameworkCore.ChangeTracking;
using SocialService.Modules.Comments.Core.Entities;
using System.Collections.Generic;
using System.Threading;
using System.Threading.Tasks;

namespace SocialService.Modules.Comments.Core.DAL.Repositories
{
    public interface ICommentRepository
    {
        Task<List<Comment>> GetAllAsync();
        Task<Comment?> GetByIdAsync(int id, CancellationToken token = default);  
        Task<EntityEntry<Comment>> AddAsync(Comment entity);
        Task<EntityEntry<Comment>> UpdateAsync(Comment entity);
        Task<EntityEntry<Comment>> DeleteAsync(Comment entity);  
    }
}