using Microsoft.EntityFrameworkCore.ChangeTracking;
using SocialService.Modules.Comments.Core.Entities;
 
namespace SocialService.Module.Comments.Core.DAL.Repositories;

internal class ICommentsRepository
{
    public Task<List<Comment>> GetAllAsync();
    public Task<Comment?> GetByIdAsync(int id ,CancellationToken token=default);  
    public Task<EntityEntry> AddAsync(Commententity);
    public Task<EntityEntry> UpdateAsync(Comment entity);
    public Task<EntityEntry> DeleteAsync(Comment entity);  
}